<label for="{{ $name }}" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">{{ $label }}</label>
<textarea id="{{ $name }}" name="{{ $name }}" wire:model="{{ $name }}" rows="4"
          class="w-full p-3 border rounded-md bg-gray-50 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-200"
          placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>{{ $value }}</textarea>

@error($name)
<p class="text-red-500 text-xs italic">{{ $message }}</p>
@enderror
