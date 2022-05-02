<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propriétés') }}
        </h2>
    </x-slot>

    <x-property.tables :properties="$properties"/>
</x-app-layout>
