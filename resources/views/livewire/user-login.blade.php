@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-6 sm:px-8">
    <div class="max-w-md w-full space-y-8 bg-white rounded-xl shadow-lg p-10">
        <!-- Company Logo -->
        <div class="text-center mb-6">
            <img src="{{ asset('images/logo.jpg') }}" alt="Company Logo" class="h-20 w-auto mx-auto">
        </div>
        
        <h2 class="text-center text-3xl font-extrabold text-dusty-purple">User Login</h2>

        <!-- Display errors if any -->
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
            @csrf
            <div class="rounded-md shadow-sm">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-dusty-purple focus:border-transparent" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-dusty-purple focus:border-transparent" required>
                </div>
            </div>
            <button type="submit" class="w-full bg-dusty-purple text-white py-2 px-4 rounded-md hover:bg-dusty-purple-dark focus:outline-none focus:ring-2 focus:ring-dusty-purple">
                Login
            </button>
        </form>

        <!-- Register Button -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-dusty-purple hover:text-dusty-purple-dark font-medium">Register here</a>
            </p>
        </div>
    </div>
</div>
@endsection
