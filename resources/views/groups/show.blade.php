@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{ __('Group Details') }}</h1>

        {{-- Group Details --}}
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6">
            {{-- Group Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{ __('Group Name') }}</label>
                <p class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
                    {{ $group->name }}
                </p>
            </div>

            {{-- Finishing Date --}}
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{ __('Finishing Date') }}</label>
                <p class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
                    {{ \Carbon\Carbon::parse($group->finishing_date)->format('d/m/Y') }}
                </p>
            </div>

            {{-- Participant Limit --}}
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{ __('Participant Count') }}</label>
                <p class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
                    {{ $group->participants !== null ? $group->participants->count(): '0' }} / {{ $group->participant_limit }}
                </p>
            </div>

            {{-- Prize Pool --}}
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{ __('Prize Pool') }}</label>
                <p class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
                    {{$group->prize_pool}}
                </p>
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <label for="price" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{__('Ticket Price')}}</label>
                <p class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
                    {{$group->price}}
                </p>
            </div>

            {{-- Group Status --}}
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{ __('Status') }}</label>
                <p class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
                    {{ $group->status }}
                </p>
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{ __('Description') }}</label>
                <p class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
                    {{ $group->description }}
                </p>
            </div>

            {{-- Back Button --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md shadow-md">
                    {{__('Back')}}
                </button>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    <div>
        <h3 class="text-xl font-bold mb-4">{{ __('Filters') }}</h3>
        <ul class="space-y-2">
            <li><a href="#" class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('My Groups') }}</a></li>
            <li><a href="#" class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('Groups Needing Participants') }}</a></li>
            <li><a href="#" class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('Open Groups Finishing Soon') }}</a></li>
            <li><a href="#" class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('Most Balanced Groups') }}</a></li>
            <li><a href="#" class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('Groups with Most Users') }}</a></li>
        </ul>
    </div>
@endsection
