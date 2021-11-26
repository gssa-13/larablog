@extends('layouts.admin')

@section('title')
    {{__('tag.home')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('tag.admin')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.home')}}</li>
@stop

@section('content')
    <div class="container-fluid"></div>
@stop
