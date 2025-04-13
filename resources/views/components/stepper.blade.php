<div class="bg-white rounded-lg p-4 mb-6">
    <ul class="relative flex flex-row gap-x-2">
        @for ($i = 1; $i <= 4; $i++)
            <li class="flex flex-1 shrink basis-0 items-center gap-x-2 group {{ $currentStep == $i ? 'active' : '' }} {{ $currentStep > $i ? 'success' : '' }}">
                <span class="group inline-flex min-h-7 min-w-7 items-center align-middle text-xs">
                    <span class="size-7 flex justify-center items-center shrink-0 rounded-full
                        {{ $currentStep == $i ? 'bg-orange-600 text-white' : 'bg-gray-100 text-gray-800' }}
                        {{ $currentStep > $i ? 'bg-orange-500 text-white' : '' }}">
                        @if ($currentStep > $i)
                            <svg class="size-3 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        @else
                            {{ $i }}
                        @endif
                    </span>
                    <span class="ms-2 text-sm font-medium {{ $currentStep >= $i ? 'text-orange-600' : 'text-gray-800' }}">
                        @switch($i)
                            @case(1)
                                Versicherung & Terminart
                                @break
                            @case(2)
                                Behandler & Datum
                                @break
                            @case(3)
                                Zeitfenster
                                @break
                            @case(4)
                                Persönliche Daten
                                @break
                        @endswitch
                    </span>
                </span>
                @if ($i < 4)
                    <div class="h-px w-full flex-1 bg-gray-200 group-last:hidden {{ $currentStep > $i ? 'bg-orange-500' : '' }}"></div>
                @endif
            </li>
        @endfor
    </ul>
</div>
