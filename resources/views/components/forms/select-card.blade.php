@props(['verfuegbarenTag', 'terminSlots', 'behandler'])
<div class="flex flex-col bg-white  ">

    <div class="bg-white border-b border-gray-200 py-3 px-4">

        <h1 class="mt-1 text-black text-3xl dark:text-neutral-500">
       {{strtoupper($verfuegbarenTag)}}
        </h1>
    </div>
    <div class="flex flex-wrap gap-4 bg-white border-b border-gray-200 shadow-2xs p-4 md:p-5">
        @foreach( $terminSlots as $terminSlot)
        <div class="group min-w-[calc(25%-20px)] bg-orange-300 border border-gray-200 rounded-lg shadow p-4 hover:bg-orange-600 clickable-slot">
            <h3 class="group-hover:text-white text-sm text-black font-medium">{{$terminSlot->start_zeit}}</h3>
            <p class="group-hover:text-white text-sm text-black">{{$behandler}}</p>
        </div>
        @endforeach

    </div>

</div>

