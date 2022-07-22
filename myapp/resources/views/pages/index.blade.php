@extends('layouts.main_layout')

@section('title', 'MyBlog')

@section('subtitle', 'Man must explore, and this is exploration at its greatest')

@section('content')

<div class="col-md-10 col-lg-8 col-xl-7">
    <!-- Post preview-->

    @foreach ($posts as $post)
        <div class="post-preview">
            <a href="post.html">
                <h2 class="post-title">{{ $post['title'] }}</h2>
                <h3 class="post-subtitle">{{ $post['description'] }}</h3>
            </a>
            <a href="{{ route('getPostByCategory', ['slug' => $post->category['slug']]) }}">{{ $post->category['title'] }}</a>
            <p>on September 24, 2022</p>
            <p class="post-meta">
                <a class="btn btn-warning" href="{{ route('getPost', [ $post->category['slug'], $post->slug ]) }}">Read more</a>

            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
    @endforeach

    {{ $posts->links('vendor.pagination.bootstrap-4') }}




    <!-- Pager-->
    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
</div>

@endsection
