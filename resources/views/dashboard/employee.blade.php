@extends('layouts.app')

@section('content')
<div class="bg-white shadow-sm rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-4">Welcome, {{ auth()->user()->first_name }}!</h1>
    <p class="text-gray-600">You are logged in as an <span class="font-semibold text-indigo-600">Employee</span>.</p>
    <div class="mt-6">
        <a href="{{ route('dealers.index') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">View All Dealers</a>
    </div>
</div>
@endsection
