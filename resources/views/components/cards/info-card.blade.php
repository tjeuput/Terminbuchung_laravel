<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
    <div class="flex space-x-3 mb-4">
        <div class="w-16 h-16 bg-gray-200 rounded-xl border-2 flex items-center justify-center text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div>
            <p class="font-medium">Vogt</p>
            <p class="text-sm text-gray-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </span>
                <span>Horb am Neckar</span>
            </p>
            <p class="text-sm text-gray-600">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                </span>
                <span>Website</span>
            </p>
        </div>
    </div>
    @if (session('terminbuchung.termininformation'))

    <hr class="my-3 border-b-gray-400">

    <div class="mb-4">
        <p class="font-medium">Ihre Termininformation</p>
            @foreach (session('terminbuchung.termininformation') as $label => $value)
            <svg class="w-4 h-4 mr-1 text-orange-400 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            {{ ucfirst($value) }} </p>
            @endforeach


    </div>
    @else

    @endif


</div>

<div class="flex space-x-3 mt-4 pt-2">
    <div class="w-24 h-16 bg-gray-200 flex items-center justify-center text-xs text-gray-500">
        <img src="{{ asset('images/logo.svg') }}"/>
        </div>
    <div>
        <p class="text-xs text-gray-500">Das Online-Termin-Management</p>
        <p class="text-xs text-gray-500">ist ein Angebot der synMedico</p>
        <p class="text-xs text-gray-500">Gruppe</p>
    </div>
</div>
