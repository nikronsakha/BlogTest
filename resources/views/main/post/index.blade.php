@extends('main.layouts.app')
@section('title' , 'Статьи')

@section('content')
    @include('main.partials.header')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @each('main.post.partials.items',$posts, 'post')
    </div>
    {{ $posts->links() }}
@endsection
