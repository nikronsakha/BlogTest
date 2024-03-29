@extends('admin.layouts.app')
@section('title' , 'Вход в админ панель')
@section('content')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Вход</h1>

            <form action="{{ route('admin.login_process') }}" method="post" class="space-y-5 mt-5">
                @csrf
                @method('POST')
                <input type="text" name="email" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email"/>

                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input type="password" name="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль"/>


                @error('password')
                <p class="text-red-500">{{ $message }} </p>
                @enderror

                <div>
                    <a href="{{ route('forgot') }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Забыли пароль?</a>
                </div>

                <div>
                    <a href="{{ route('register') }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Регистрация</a>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">
                    Войти
                </button>
            </form>
        </div>
    </div>
@endsection