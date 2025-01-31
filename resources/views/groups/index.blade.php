@extends('layouts.app')

@section('content')
    <div>
        {{-- Toggle Thumbnail/List Mode --}}
        <div class="flex justify-between p-4">
            <h1 class="text-2xl font-bold">{{ __('Group Listings') }}</h1>
        </div>
        <div class="flex justify-between p-4">
            <div class="flex w-full justify-between">
                <div class="w-1/2 pr-2">
                    <select id="sort-groups" class="w-fit px-4 py-2 bg-gray-200 rounded-md">
                        <option value="finishing_soon" @selected($sort == 'finishing_soon')>{{ __('Finishing Soon') }}</option>
                        <option value="biggest_prize_pool" @selected($sort == 'biggest_prize_pool')>{{ __('Biggest Prize Pool') }}</option>
                        <option value="biggest_participants" @selected($sort == 'biggest_participants')>{{ __('Biggest Participants') }}</option>
                        <option value="open" @selected($sort == 'open')>{{ __('Open') }}</option>
                        <option value="asc_price" @selected($sort == 'asc_price')>{{ __('Price Ascending') }}</option>
                        <option value="desc_price" @selected($sort == 'desc_price')>{{ __('Price Descending') }}</option>
                    </select>
                </div>
                <div class="w-1/2 pl-2 flex justify-end">
                    <a href="{{ route('groups.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md mr-2">{{ __('Create Group') }}</a>
                    <button id="thumbnail-view" class="px-4 py-2 bg-blue-500 text-white rounded-md mr-2">{{ __('Thumbnail View') }}</button>
                    <button id="list-view" class="px-4 py-2 bg-gray-500 text-white rounded-md">{{ __('List View') }}</button>
                </div>
            </div>
        </div>

        {{-- Group Listings --}}
        <div id="group-container" class="grid grid-cols-1 md:grid-cols-3 gap-6  p-4">
            @forelse ($groups as $group)
                <div class="group-card bg-white dark:bg-gray-700 shadow-md rounded-md p-6">
                    <h3 class="text-lg font-bold mb-2">{{ $group->name }}</h3>
                    {{--                    <p><strong>{{ __('Creator') }}:</strong> {{ $group->creator->name }}</p>--}}
                    <p><strong>{{ __('Participants') }}:</strong> {{ $group->participant_limit }}
                    <p><strong>{{ __('Finish Date') }}:</strong> {{ \Carbon\Carbon::parse($group->finishing_date)->format('d/m/Y')}}</p>
                    <p><strong>{{ __('Prize Pool') }}:</strong> {{ $group->prize_pool }} {{ __('SOM') }}</p>
                    <p><strong>{{ __('Price') }}:</strong> {{ $group->price }} {{ __('SOM') }}</p>
                    <p><strong>{{ __('Status') }}:</strong> {{ $group->status }}</p>
                    <p class="py-2 text-right">
                        <a href="{{ route('groups.show', $group) }}" class="mt-0.5 p-2 bg-green-200 rounded-md">{{ __('View Details') }}</a>
                    </p>
                </div>
            @empty
                <p>{{__('No Groups')}}</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-6 p-4">
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

        document.getElementById('sort-groups').addEventListener('change', (event) => {
            const selectedValue = event.target.value;
            const url = new URL(window.location.href);
            url.searchParams.set('sort', selectedValue);
            window.location.href = url.toString();
        });
    </script>
@endsection

@section('sidebar')
    <div>
        <h3 class="text-xl font-bold mb-4">{{ __('Filters') }}</h3>
        <ul class="space-y-2">
            <li><a href="#" class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('My Groups') }}</a>
            </li>
            <li><a href="#"
                   class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('Groups Needing Participants') }}</a>
            </li>
            <li><a href="#"
                   class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('Open Groups Finishing Soon') }}</a>
            </li>
            <li><a href="#"
                   class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('Most Balanced Groups') }}</a>
            </li>
            <li><a href="#"
                   class="block py-2 px-4 bg-gray-300 dark:bg-gray-700 rounded-md">{{ __('Groups with Most Users') }}</a>
            </li>
        </ul>
    </div>
@endsection
