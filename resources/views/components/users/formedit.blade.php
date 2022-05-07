<div class="card-glass w-full p-8">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="flex">
        @csrf
        @method('PUT')
        <div class="flex flex-col w-full gap-8">
            <div class="flex flex gap-8 w-full">
                <div class="flex flex-col w-1/2">
                    <div class="card-glass p-4">
                        <table class="w-full">
                            <tr>
                                <td>
                                    <x-label for="name" :value="__('Nom')" />
                                </td>
                                <td>
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-label for="email" :value="__('Email')" />
                                </td>
                                <td>
                                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $user->email)" required autofocus />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-label for="phone" :value="__('Téléphone')" />
                                </td>
                                <td>
                                    <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone', $user->phone)" required autofocus />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-glass p-4 mt-12">
                        <table class="w-full">
                            <tr>
                                <td>
                                    <x-label for="password" :value="__('Mot de passe')" />
                                </td>
                                <td>
                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex flex-col w-1/2 gap-8">
                    <div class="card-glass p-4">
                        <table class="w-full">
                            <tr>
                                <td>
                                    <x-label for="role" :value="__('Rôle')" />
                                </td>
                                <td>
                                    @foreach ($roles as $role)
                                        <div class="flex items-center justify-start">
                                            <input @if($user->role->id == $role->id) checked @endif type="radio" name="role_id" value="{{ $role->id }}" class="mr-2" />
                                            <x-label for="role_id" :value="$role->display_name"/>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-full">
                        <button type="submit" class="btn btn-primary w-full">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
