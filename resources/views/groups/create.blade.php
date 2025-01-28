@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{__('Create a New Group')}}</h1>

        {{-- Group Creation Form --}}
        <form action="{{ route('groups.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6">
            @csrf

            {{-- Group Name --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{__('Group Name')}}</label>
                <input type="text" id="name" name="name" required
                       class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200"
                       placeholder="Enter a unique group name" value="{{ old('name') }}">

                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Finishing Date --}}
            <div class="mb-4">

                <label for="finishing_date" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{__('Finishing Date')}}</label>
                <input type="date" id="finishing_date" name="finishing_date" required

                       class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200"
                       value="{{ old('finishing_date', \Carbon\Carbon::now()->addMonth()->format('d/m/Y')) }}">
                @error('finishing_date')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Participant Limit --}}
            <div class="mb-4">
                <label for="participant_limit" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{__('Participant Limit')}}</label>
                <input type="number" id="participant_limit" name="participant_limit" required min="1" max="1000"
                       class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200"
                       placeholder="{{__('Enter the maximum number of participants')}}" value="{{ old('participant_limit') }}">
                @error('participant_limit')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Prize Pool --}}
            <div class="mb-4">
                <label for="prize_pool" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{__('Prize Pool')}}</label>
                <input type="number" id="prize_pool" name="prize_pool" required min="0"
                       class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200"
                       placeholder="{{__('Enter the prize pool amount')}}" value="{{ old('prize_pool') }}">

                @error('prize_pool')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>


            {{-- Prize Pool --}}
            <div class="mb-4">
                <label for="price" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{__('Ticket Price')}}</label>
                <input type="number" id="price" name="price" required min="0"
                       class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200"
                       placeholder="{{__('Enter the single ticket price')}}" value="{{ old('price') }}">

                @error('price')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Group Status --}}
            <div class="mb-4">
                <label for="status" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{__('Status')}}</label>
                <select id="status" name="status" required
                        class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
                    <option value="private" {{ old('status') == 'private' ? 'selected' : '' }}>{{__('Private')}}</option>
                    <option value="public" {{ old('status') == 'public' ? 'selected' : '' }}>{{__('Public')}}</option>
                    <option value="semi" {{ old('status') == 'semi' ? 'selected' : '' }}>{{__('Semi Public')}}</option>
                </select>

                @error('status')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{__('Description')}}</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200"
                          placeholder="{{__('Provide details about the group')}}">{{ old('description') }}</textarea>

                @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md shadow-md">
                    {{__('Create Group')}}
                </button>
            </div>
        </form>
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

