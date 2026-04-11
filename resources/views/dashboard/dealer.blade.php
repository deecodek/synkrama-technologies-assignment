@extends('layouts.app')

@section('content')
<div class="bg-white shadow-sm rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-4">Welcome, {{ auth()->user()->first_name }}!</h1>
    <p class="text-gray-600">You are logged in as a <span class="font-semibold text-indigo-600">Dealer</span>.</p>
    @if(auth()->user()->dealerLocation)
    <div class="mt-4 p-4 bg-gray-50 rounded-md">
        <h2 class="text-lg font-semibold text-gray-900">Your Location</h2>
        <p class="text-gray-600">{{ auth()->user()->dealerLocation->city }}, {{ auth()->user()->dealerLocation->state }} - {{ auth()->user()->dealerLocation->zip_code }}</p>
        <a href="{{ route('dealers.edit', auth()->user()) }}" class="mt-2 inline-flex items-center text-sm text-indigo-600 hover:text-indigo-500">Edit Location</a>
    </div>
    @endif
</div>
@endsection
