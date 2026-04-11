@extends('layouts.app')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <h1 class="text-2xl font-bold text-gray-900">Dealer List</h1>
    </div>

    <div class="px-6 py-4">
        <form method="GET" action="{{ route('dealers.index') }}" class="mb-6">
            <div class="flex gap-4">
                <div class="flex-1">
                    <input type="text" name="zip_code" value="{{ request('zip_code') }}" placeholder="Search by Zip Code" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Search</button>
                @if(request('zip_code'))
                <a href="{{ route('dealers.index') }}" class="inline-flex items-center rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500">Clear</a>
                @endif
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                        <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">City</th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">State</th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Zip Code</th>
                        <th class="relative py-3.5 pl-3 pr-4 sm:pr-0">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($dealers as $dealer)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">{{ $dealer->first_name }} {{ $dealer->last_name }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $dealer->email }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $dealer->dealerLocation->city ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $dealer->dealerLocation->state ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $dealer->dealerLocation->zip_code ?? 'N/A' }}</td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                            @if($dealer->dealerLocation)
                            <a href="{{ route('dealers.edit', $dealer->dealerLocation) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                            <form action="{{ route('dealers.destroy', $dealer->dealerLocation) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @else
                            <a href="{{ route('dealers.create') }}" class="text-indigo-600 hover:text-indigo-900">Add Location</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-3 py-4 text-sm text-center text-gray-500">No dealers found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $dealers->links() }}
        </div>
    </div>
</div>
@endsection
