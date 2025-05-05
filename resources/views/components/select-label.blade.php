{{-- components/select-label.blade.php --}}
<div>
    <label for="{{ $name ?? '' }}" class="col-md-4 col-form-label text-md-end block mb-2 text-sm font-medium text-gray-900 ">
        {{ $label ?? '' }}
    </label>
    <select id="{{ $name ?? '' }}" name="{{ $name ?? '' }}"
        class=" col-md-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
        @foreach ($data ?? [] as $item)
            <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>
</div>
