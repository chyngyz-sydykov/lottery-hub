@extends('layouts.app')

@section('content')
    <div>
        {{-- Toggle Thumbnail/List Mode --}}
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">{{ __('Group Listings') }}</h1>
            <div>
                <a href="{{ route('groups.create') }}"
                   class="px-4 py-2 bg-green-500 text-white rounded-md">{{ __('Create Group') }}</a>
                <button id="thumbnail-view"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md line-height-normal">{{ __('Thumbnail View') }}</button>
                <button id="list-view"
                        class="px-4 py-2 bg-gray-500 text-white rounded-md line-height-normal">{{ __('List View') }}</button>
            </div>
        </div>

        {{-- Group Listings --}}
        <div id="group-container" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($groups as $group)
                <div class="group-card bg-white dark:bg-gray-700 shadow-md rounded-md p-6">
                    <h3 class="text-lg font-bold mb-2">{{ $group->name }}</h3>
{{--                    <p><strong>{{ __('Creator') }}:</strong> {{ $group->creator->name }}</p>--}}
                    <p><strong>{{ __('Participants') }}:</strong> {{ $group->participants_count }} / {{ $group->participant_limit }}</p>
                    <p><strong>{{ __('Price Pool') }}:</strong> {{ $group->prize_pool }} {{ __('SOM') }}</p>
                    <p><strong>{{ __('Status') }}:</strong> {{ $group->status }}</p>
                    <p><strong>{{ __('Balance') }}:</strong> {{ $group->balance }} {{ __('SOM') }}</p>
                    <p class="py-2 text-right"><a href="{{ route('groups.show', $group) }}" class="mt-0.5 p-2 bg-green-200 rounded-md">{{ __('View Details') }}</a></p>
                </div>
                @empty
                    <p>{{__('No Groups')}}</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $groups->links() }}
        </div>
    </div>

    {{-- JavaScript for View Toggle --}}
    <script>
        document.getElementById('thumbnail-view').addEventListener('click', () => {
            document.getElementById('group-container').classList.replace('grid-cols-1', 'grid-cols-3');
        });

        document.getElementById('list-view').addEventListener('click', () => {
            document.getElementById('group-container').classList.replace('grid-cols-3', 'grid-cols-1');
        });
    </script>
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
