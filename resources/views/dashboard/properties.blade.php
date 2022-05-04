<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            @switch(request()->route()->getName())
                @case('admin.properties')
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
                        {{ __('Liste des propriétés') }}
                    </h2>
                    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
                        {{ __('Ajouter une propriété') }}
                    </a>
                    @break
                @case('admin.property.create')
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
                        {{ __('Liste des propriétés') }}
                    </h2>
                    @break
            @endswitch
        </div>

    </x-slot>

    <div class="flex flex-row mx-4 gap-4">
        @switch(request()->route()->getName())
            @case('admin.properties')
            {{--        <x-filter class="filter"/>--}}
            <x-property.tables :datas="$properties" class="tableforfilter"/>
            @break
            @case('admin.property.create')
            <x-property.form :item="$property"/>
            @break
        @endswitch
    </div>
</x-app-layout>
