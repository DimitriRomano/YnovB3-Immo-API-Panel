<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panneau d\'administration') }}
        </h2>
    </x-slot>

    <div class="flex sm:flex-col lg:flex-row gap-8 px-8">
        <div class="card-glass pb-4 sm:h-1/2 sm:w-full lg:w-1/3 hover:shadow-xl transition hover:scale-105">
            <a href="{{ route('admin.users') }}" class="flex flex-col items-center">
                <img src="{{ asset('img/home/user.png') }}" class="h-full w-full duration-75">
                <span class="font-semibold text-4xl text-gray-800">{{ __('Utilisateurs') }}</span>
            </a>
        </div>
        <div class="card-glass pb-4 sm:h-1/2 sm:w-full lg:w-1/3 hover:shadow-xl transition hover:scale-105">
            <a href="{{ route('admin.properties') }}" class="flex flex-col items-center">
                <img src="{{ asset('img/home/property.png') }}" class="h-full w-full duration-75">
                <span class="font-semibold text-4xl text-gray-800">{{ __('Propriétés') }}</span>
            </a>
        </div>
        <div class="card-glass pb-4 sm:h-1/2 sm:w-full lg:w-1/3 hover:shadow-xl transition hover:scale-105">
            <a href="{{ route('admin.properties.reservations') }}" class="flex flex-col items-center">
                <img src="{{ asset('img/home/reservations.png') }}" class="h-full w-full duration-75">
                <span class="font-semibold text-4xl text-gray-800">{{ __('Réservations') }}</span>
            </a>
        </div>
</x-app-layout>
