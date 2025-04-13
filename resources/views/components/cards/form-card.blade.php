<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <x-stepper :currentStep="$currentStep ?? 1" />
    <h2 class="text-lg font-medium text-gray-800 mb-4">{{ $title }}</h2>

    {{ $slot }}
</div>
