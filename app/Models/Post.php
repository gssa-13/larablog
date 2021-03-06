<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'excerpt', 'published_at', 'category_id', 'user_id'
    ];

    protected  $dates = ['published_at'];

    protected $appends = ['published_date'];

    public function  getPublishedDateAttribute()
    {
        return optional($this->published_at)->diffForHumans();
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public static function boot()
    {
        parent::boot();

        // para cada eliminacion del modelo
        // son eliminadas las relaciones de tags
        static::deleting(function($post) {
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }


    // Cada vez que se efectue en el model el evento create
    // sera generada una url unica
    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = Auth::id();

        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    public function generateUrl()
    {
        $url = Str::slug($this->title);

        if ( $this->whereUrl($url)->exists() ) {
            $url = "$url-$this->id";
        }

        $this->url = $url;

        $this->save();
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at
            ? Carbon::parse($published_at)
            : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
            ? $category
            : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->with(['category', 'tags', 'user', 'photos'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function scopeAllowedPosts($query)
    {
        if ( Auth::user()->can('view', $this) ) {
            return $query;
        } else {
            return $query->where('user_id' , Auth::id());
        }
    }

    public function scopeByYearAndMonth($query)
    {
        return $query->selectRaw('year(published_at)  year')
            ->selectRaw('month(published_at)  month')
            ->selectRaw('monthname(published_at)  monthname')
            ->selectRaw('count(*) posts')
            ->groupBy('year', 'month', 'monthname')
            ->orderBy('year', 'desc');
    }

    // Verifica si una publicacion es de acceso publico
    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }

}
