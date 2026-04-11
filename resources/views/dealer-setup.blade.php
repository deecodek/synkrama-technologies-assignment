@extends('layouts.app')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Complete Your Dealer Setup</h2>
        <p class="mt-2 text-center text-sm text-gray-600">Please provide your location details to continue.</p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
        <form class="space-y-6" action="{{ route('dealer.setup-location.store') }}" method="POST">
            @csrf
            <div>
                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                <div class="mt-2">
                    <input id="city" name="city" type="text" required value="{{ old('city') }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State</label>
                <div class="mt-2">
                    <input id="state" name="state" type="text" required value="{{ old('state') }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="zip_code" class="block text-sm font-medium leading-6 text-gray-900">Zip Code</label>
                <div class="mt-2">
                    <input id="zip_code" name="zip_code" type="text" required value="{{ old('zip_code') }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Complete Setup</button>
            </div>
        </form>
    </div>
</div>
@endsection
