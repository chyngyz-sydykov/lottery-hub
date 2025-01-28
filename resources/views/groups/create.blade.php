@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{__('Create a New Group')}}</h1>

        {{-- Group Creation Form --}}
        <form action="{{ route('groups.store') }}" method="POST"  onsubmit="event.preventDefault(); showConfirmation();" class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6">
            @csrf
            <div class="mb-4">
            {{-- Group Name --}}
            <x-input.text label="{{__('Group Name')}}" name="name" placeholder="{{__('Enter a unique group name')}}" value="{{ old('name') }}" required/>
            </div>
            {{-- Finishing Date --}}
            <div class="mb-4">
                <x-input.date label="{{__('Finishing Date')}}" name="finishing_date" value="{{ old('finishing_date', \Carbon\Carbon::now()->addMonth()->format('d/m/Y')) }}" required/>
            </div>

            {{-- Participant Limit --}}
            <div class="mb-4">
                <x-input.number name="participant_limit" label="{{__('Participant Limit')}}" placeholder="{{__('Enter the maximum number of participants')}}" value="{{ old('participant_limit') }}" min="1" max="1000" required/>
            </div>

            {{-- Prize Pool --}}
            <div class="mb-4">
                <x-input.number name="prize_pool" label="{{__('Prize Pool')}}" placeholder="{{__('Enter the prize pool amount')}}" value="{{ old('prize_pool') }}" min="0" required/>
            </div>


            {{-- Prize Pool --}}
            <div class="mb-4">
                <x-input.number name="price" label="{{__('Ticket Price')}}" placeholder="{{__('Enter the single ticket price')}}" value="{{ old('price') }}" min="0"/>
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
                    <x-input.textarea label="{{__('Description')}}" name="description" placeholder="{{__('Provide details about the group')}}" value="{{ old('description') }}"/>

            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-md shadow-md">
                    {{__('Create Group')}}</button>
            </div>
        </form>
    </div>
    <div
        id="confirmationPage"
        class="fixed inset-0 bg-white shadow-lg z-50 p-6 transform translate-x-full transition-transform duration-300"
    >
        <h2 class="text-2xl font-bold mb-4">Confirmation</h2>
        <p>Your group has been created successfully!</p>
        <button onclick="hideConfirmation()" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
            Close
        </button>
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

