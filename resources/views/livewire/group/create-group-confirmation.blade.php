
<div
    x-data="{ visible: @entangle('visible') }"
    x-show="visible"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
    class="fixed inset-0 bg-gray-700 bg-opacity-80 z-50 "
>
    <div class="w-full h-full ml-12 bg-white shadow-lg p-6 overflow-scroll">
        <div class="container mx-auto p-6">
            <h2 class="text-2xl font-bold mb-4">{{ __('Confirm Group Creation') }}</h2>
            {{-- Group Details --}}
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6">
                @if($group !== null && isset($group['name']))
                    {{-- Group Name --}}
                    <div class="mb-4">
                        <x-labeled-paragraph label="{{__('Group Name')}}" :value="$group['name']"/>
                    </div>
                    @error('group.name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    {{-- Finishing Date --}}
                    <div class="mb-4">
                        <x-labeled-paragraph label="{{__('Finishing Date')}}" :value="\Carbon\Carbon::parse($group['finishing_date'])->format('d/m/Y')"/>
                    </div>

                    @error('group.finishing_date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    {{-- Participant Limit --}}
                    <div class="mb-4">
                        <x-labeled-paragraph label="{{__('Participant Limit')}}" :value="$group['participant_limit']"/>
                    </div>

                    @error('group.participant_limit')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    {{-- Prize Pool --}}
                    <div class="mb-4">
                        <x-labeled-paragraph label="{{__('Prize Pool')}}" :value="$group['prize_pool']"/>
                    </div>

                    @error('group.prize_pool')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    {{-- Price --}}
                    <div class="mb-4">
                        <x-labeled-paragraph label="{{__('Ticket Price')}}" :value="$group['price']"/>
                    </div>

                    @error('group.price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    {{-- Group Status --}}
                    <div class="mb-4">
                        <x-labeled-paragraph label="{{__('Status')}}" :value="$group['status']"/>
                    </div>

                    @error('group.status')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                    {{-- Description --}}
                    <div class="mb-4">
                        <x-labeled-paragraph label="{{__('Description')}}" :value="$group['description']"/>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" wire:click="hide" class="button--primary mr-2">
                            {{__('Back')}}
                        </button>

                        <button type="button" wire:click="save"  class="button--primary">
                            <x-shared.loading-icon/>
                            {{__('Save')}}
                        </button>
                    </div>
                @else
                    <p>{{__('Something went wrong.')}}</p>
                    <div class="flex justify-end">
                        <button type="button" wire:click="hide" class="button--primary mr-4">
                            {{__('Back')}}
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
