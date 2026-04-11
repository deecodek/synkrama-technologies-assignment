@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="bg-white shadow-sm rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-900">Edit Dealer Location</h1>
            <p class="text-sm text-gray-600 mt-1">Dealer: {{ $dealer->user->first_name }} {{ $dealer->user->last_name }}</p>
        </div>

        <div class="px-6 py-4">
            <form method="POST" action="{{ route('dealers.update', $dealer) }}">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                        <div class="mt-2">
                            <input id="city" name="city" type="text" required value="{{ old('city', $dealer->city) }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State</label>
                        <div class="mt-2">
                            <input id="state" name="state" type="text" required value="{{ old('state', $dealer->state) }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="zip_code" class="block text-sm font-medium leading-6 text-gray-900">Zip Code</label>
                        <div class="mt-2">
                            <input id="zip_code" name="zip_code" type="text" required value="{{ old('zip_code', $dealer->zip_code) }}" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Location</button>
                        <a href="{{ route('dealers.index') }}" class="flex w-full justify-center rounded-md bg-gray-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
