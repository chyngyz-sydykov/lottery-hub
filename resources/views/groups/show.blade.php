@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{ __('Group Details') }}</h1>

        {{-- Group Details --}}
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6">
            {{-- Group Name --}}
            <div class="mb-4">
                <x-labeled-paragraph label="{{__('Group Name')}}" :value="$group->name"/>
            </div>

            {{-- Finishing Date --}}
            <div class="mb-4">
                <x-labeled-paragraph label="{{__('Finishing Date')}}" :value="\Carbon\Carbon::parse($group->finishing_date)->format('d/m/Y')"/>
            </div>

            {{-- Participant Limit --}}
            <div class="mb-4">
                <x-labeled-paragraph label="{{__('Participant Limit')}}" :value="'0 / '.$group->participant_limit"/>
            </div>

            {{-- Prize Pool --}}
            <div class="mb-4">
                <x-labeled-paragraph label="{{__('Prize Pool')}}" :value="$group->prize_pool"/>
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <x-labeled-paragraph label="{{__('Ticket Price')}}" :value="$group->price"/>
            </div>

            {{-- Group Status --}}
            <div class="mb-4">
                <x-labeled-paragraph label="{{__('Status')}}" :value="$group->status"/>
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <x-labeled-paragraph label="{{__('Description')}}" :value="$group->description"/>
            </div>

            {{-- Back Button --}}
            <div class="flex justify-end">
                <a href="{{ url()->previous() }}" class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md shadow-md">
                    {{__('Back')}}
                </a>
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
