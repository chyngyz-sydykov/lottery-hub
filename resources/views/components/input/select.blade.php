<label for="{{ $name }}" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{ $label }}</label>
<select id="{{ $name }}" name="{{ $name }}" wire:model="{{ $name }}" {{ $required ? 'required' : '' }}
class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200">
    @if ( isset($emptyOption) )
        <option
            value="$emptyOption['key']" {{ $value == $emptyOption['key'] ? 'selected' : '' }}>{{ __($emptyOption['optionLabel']) }}</option>
    @endif
    @foreach($options as $key => $optionLabel)
        <option value="{{$key}}" {{ $value == $key ? 'selected' : '' }}>{{$optionLabel}}</option>
    @endforeach
</select>

@error($name)
<p class="text-red-500 text-xs italic">{{ $message }}</p>
@enderror
