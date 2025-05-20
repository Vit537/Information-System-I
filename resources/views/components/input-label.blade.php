{{-- components/input-label.blade.php --}}
<div class="mb-5">
    <label for="{{ $name ?? '' }}" class="block mb-2 text-sm font-medium text-gray-900">
        {{ $label ?? '' }}
    </label>
    <input value="{{ old($name ) ?? $value ?? '' }}" type="{{ $type ?? 'text' }}" id="{{ $name ?? '' }}"
        name="{{ $name ?? '' }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        placeholder="{{ $placeholder ?? '' }}" />

    @error($name ?? '')
        <small class="text-red-500">
            {{ $message }}
        </small>
    @enderror
</div>
