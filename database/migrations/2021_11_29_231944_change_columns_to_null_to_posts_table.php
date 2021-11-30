<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsToNullToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('url')->unique()->change();
            $table->text('content')->nullable()->change();
            $table->mediumText('excerpt')->nullable()->change();
            $table->unsignedBigInteger('category_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('url')->change();
            $table->text('content')->change();
            $table->mediumText('excerpt')->change();
            $table->unsignedBigInteger('category_id')->change();

        });
    }
}
