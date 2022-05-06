<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            {{ __('Liste des utilisateurs') }}
        </h2>
    </x-slot>

    <div class="flex flex-row mx-4 gap-4">
        @switch(request()->route()->getName())
            @case('admin.users')
                <x-users.tables :datas="$users" class="tableforfilter"/>
                @break
            @case('admin.users.edit')
                <x-users.formedit :user="$user" :roles="$roles" class="tableforfilter"/>
                @break
        @endswitch
    </div>
</x-app-layout>
