@extends('layouts.front.master')

@section('title', 'Page Not Found | Glam')

    @section('searchbar')
        @include('includes.all.smallsearch')
    @endsection

    @section('content')
        <div class="row align-content-center">
            <div class="404-message text-center my-5 py-5 fw-bold">
                <p class="h1"> 404 | Not Found </p>
                <p class="h3">
                    The content is moved on and you'll can find throuth
                    <a href="{{route('stores.index')}}"> store list </a>
                    and
                    <a href="{{route('categories.index')}}">category list</a>
                </p>
            </div>
        </div>
    @endsection