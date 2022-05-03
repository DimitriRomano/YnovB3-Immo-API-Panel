<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            {{ __('Liste des propriétés') }}
        </h2>
    </x-slot>

    <div class="flex flex-row mx-4 gap-4">
        <x-filter class="filter"/>
        <x-property.tables :properties="$properties" class="tableforfilter"/>
    </div>
</x-app-layout>
