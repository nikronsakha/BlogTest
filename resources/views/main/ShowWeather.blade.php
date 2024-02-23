@extends('main.layouts.app')
@section('content')
    @include('main.partials.header')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <p>
                ПОГОДА В {{ $weatherData['name'] }} равна {{ $weatherData['main']['temp'] }}
            </p>
        </div>
    </div>
@endsection