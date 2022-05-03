<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            @switch(request()->route()->getName())
                @case('admin.properties.reservations')
                {{ __('Choix de l\'annonce') }}
                @break
                @case('admin.property.reservations')
                {{ __('Réservation de '. $property->title) }}
                @break
            @endswitch
        </h2>
    </x-slot>

    <div class="flex flex-row mx-4 gap-4">
        @switch(request()->route()->getName())
            @case('admin.properties.reservations')
            <x-reservations.tables :datas="$properties" class="tableforfilter"/>
            @break
            @case('admin.property.reservations')
            <x-property.card :property="$property" class="filter"/>
            <x-reservations.res-property :datas="$reservations" class="tableforfilter"/>
            @break
        @endswitch
    </div>
</x-app-layout>
