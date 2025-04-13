@props(['id', 'name', 'placeholder' => null])
<div class="w-full">
        <select id="{{ $id }}"
                name="{{ $name }}"
            {{ $attributes->merge(['class' => 'py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm
       focus:border-orange-500 focus:ring-1 focus:ring-orange-500 focus:outline-none
       disabled:opacity-50 disabled:pointer-events-none']) }}>
            @if (isset($placeholder))
                <option value="" disabled selected>{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>

    @error($name)
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
