@extends('layouts.app')

@section('content')
    <livewire:group.create-group-validator />
    <livewire:group.create-group-confirmation />
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

