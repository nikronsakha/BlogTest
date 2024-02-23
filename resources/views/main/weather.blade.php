@extends('main.layouts.app')
@section('content')
    @include('main.partials.header')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Узнать погоду</h1>

            <form method="post" action="{{ route('GetWeather') }}" class="space-y-5 mt-5">
                @csrf
                @method('POST')
                <input type="text" name="city" class="w-full h-12 border border-gray-800 rounded px-3"
                       placeholder="город"/>

                @error('city')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">
                    Узнать погоду
                </button>
            </form>
        </div>
    </div>
@endsection