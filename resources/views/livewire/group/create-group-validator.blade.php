<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">{{__('Create a New Group')}}</h1>

    {{-- Group Creation Form --}}
    <form wire:submit="validateInputs" class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6">
        @csrf
        <div class="mb-4">
            {{-- Group Name --}}
            <x-input.text label="{{__('Group Name')}}" name="groupForm.name" placeholder="{{__('Enter a unique group name')}}" value="{{ old('groupForm.name') }}" required/>
        </div>
        {{-- Finishing Date --}}
        <div class="mb-4">
            <x-input.date label="{{__('Finishing Date')}}" name="groupForm.finishing_date" value="{{ old('groupForm.finishing_date', \Carbon\Carbon::now()->addMonth()->format('d/m/Y')) }}" required/>
        </div>

        {{-- Participant Limit --}}
        <div class="mb-4">
            <x-input.number label="{{__('Participant Limit')}}" name="groupForm.participant_limit" placeholder="{{__('Enter the maximum number of participants')}}" value="{{ old('groupForm.participant_limit') }}" min="1" max="1000" required/>
        </div>

        {{-- Prize Pool --}}
        <div class="mb-4">
            <x-input.number label="{{__('Prize Pool')}}" name="groupForm.prize_pool" placeholder="{{__('Enter the prize pool amount')}}" value="{{ old('groupForm.prize_pool') }}" min="0" required/>
        </div>


        {{-- Prize Pool --}}
        <div class="mb-4">
            <x-input.number label="{{__('Ticket Price')}}" name="groupForm.price"  placeholder="{{__('Enter the single ticket price')}}" value="{{ old('groupForm.price') }}" min="0"/>
        </div>

        {{-- Group Status --}}
        <div class="mb-4">
            <x-input.select label="{{ __('Status') }}" name="groupForm.status"  defaultValue="public" value="{{ old('groupForm.status') }}" :options="[
                'private' => __('Private'),
                'public' => __('Public'),
                'semi' => __('Semi Public')]"/>
        </div>

        {{-- Description --}}
        <div class="mb-4">
            <x-input.textarea label="{{__('Description')}}" name="groupForm.description" placeholder="{{__('Provide details about the group')}}" value="{{ old('description') }}"/>
        </div>

        {{-- Actions --}}
        <div class="flex justify-end">
            <button type="button" onclick="window.history.back()" class="button--primary mr-2">
                {{__('Back')}}
            </button>

            <button type="submit" class="button--primary">
                <x-shared.loading-icon/>
                {{__('Create Group')}}
            </button>
        </div>
    </form>
</div>
