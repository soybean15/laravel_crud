<div>
    <div class="mb-4">
        <label for="{{ $attribute }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
        <input type="{{ $type }}" id="{{ $attribute }}" name="{{ $attribute }}" value="{{ old('name',  $value ) }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">
        @error($attribute)
            <div class="text-sm text-red-500">{{ $message }}</div>
        @enderror
        <div class="text-sm text-red-500"></div>
    </div>
</div>
