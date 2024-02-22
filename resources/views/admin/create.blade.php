@extends('admin.layouts/app')
@section('title' , 'Статья')

@section('content')
    @include('admin.partials.sidebar')
    @include('admin.partials.header')
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-8">
            <h3 class="text-gray-700 text-3xl font-medium">Создать статью</h3>

            <div class="mt-8">

            </div>

            <div class="mt-8">
                <form enctype="multipart/form-data" method="post" action="{{ route('admin.posts.store' ,) }}" class="space-y-5 mt-5">
                    @csrf
                    @method('POST')

                    <input type="text" name="title" value="{{ old('title') }}" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Название" />

                    @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input type="text" name="preview" value="{{ old('preview') }}" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Описание" />

                    @error('preview')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input type="text" name="description" value="{{ old('description') }}" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Текст" />

                    @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input type="file" name="thumbnail" class="w-full h-12" placeholder="Обложка" />


                    @error('thumbnail')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
                </form>
            </div>
        </div>
    </main>
@endsection
