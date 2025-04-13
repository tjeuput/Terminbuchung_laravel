
<div class="w-full">
        <input type="text"
               id="{{ $id }}"
               name="{{ $name }}"
               type="{{$type}}"
            {{ $attributes->merge(['class' => 'py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm !text-black
       focus:border-orange-500 focus:ring-1 focus:ring-orange-500 focus:outline-none
       disabled:opacity-50 disabled:pointer-events-none']) }}>
    </div>
    @error($name)
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror


