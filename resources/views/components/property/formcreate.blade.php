<div class="card-glass w-full p-8">
    <form action="{{ route('admin.properties.create') }}" method="POST" enctype="multipart/form-data" class="flex">
        @csrf
        <div class="flex flex-col w-full gap-8">
            <div class="flex w-full gap-8">
                <div class="flex flex-col gap-8 w-1/2 p-4">
                    <div class="card-glass p-4">
                        <table class="w-full">
                            <tr>
                                <td>
                                    <x-label for="name" :value="__('Titre')" />
                                </td>
                                <td>
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-label for="description" :value="__('Description')" />
                                </td>
                                <td>
                                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-glass p-4">
                        <table class="w-full">
                            <tr>
                                <td>
                                    <x-label for="price" :value="__('Prix (€)')" />
                                </td>
                                <td>
                                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-label for="surface" :value="__('Surface (m²)')" />
                                </td>
                                <td>
                                    <x-input id="surface" class="block mt-1 w-full" type="number" name="surface" :value="old('surface')" required autofocus />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-label for="nb_rooms" :value="__('Pièces')" />
                                </td>
                                <td>
                                    <x-input id="nb_rooms" class="block mt-1 w-full" type="text" name="nb_rooms" :value="old('rooms')" required autofocus />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-glass p-4">
                        <table class="w-full">
                            <tr>
                                <td>
                                    <x-label for="address" :value="__('Adresse')" />
                                </td>
                                <td>
                                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-label for="latitude" :value="__('Latitude')" />
                                </td>
                                <td>
                                    <x-input id="latitude" class="block mt-1 w-full" type="text" name="latitude" :value="old('latitude')" autofocus />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-label for="longitude" :value="__('Longitude')" />
                                </td>
                                <td>
                                    <x-input id="longitude" class="block mt-1 w-full" type="text" name="longitude" :value="old('longitude')" autofocus />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="flex flex-col gap-8 w-1/2 p-4">
                    <div class="card-glass p-4">
                        <table class="w-full space-table-lg">
                            <tr>
                                <td>
                                    <x-label for="main_image" :value="__('Photo Principale')" />
                                </td>
                                <td>
                                    <x-input id="main_image" type="file" name="main_image" :value="old('main_images')" autofocus />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-label for="images" :value="__('Autres Photo')" />
                                </td>
                                <td>
                                    <x-input id="images" type="file" name="images[]" :value="old('images')" autofocus multiple />
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-glass p-4">
                        <table class="w-full space-table-lg">
                            <tr>
                                <td>
                                    <x-label for="type" :value="__('Type de propriété')" />
                                </td>
                                <td>
                                    @foreach($types as $type)
                                        <div class="flex items-center justify-start">
                                            <input class="mr-2 rounded-md" type="radio" name="type_id" value="{{ $type->id }}">
                                            <x-label for="type" id="type" :value="$type->name" class="capitalize"/>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-glass p-4">
                        <table class="w-full space-table-lg">
                            <tr>
                                <td>
                                    <x-label for="features" :value="__('Caractéristiques')" />
                                </td>
                                <td class="flex flex-wrap gap-2">
                                    @foreach ($features as $feature)
                                        <div class="flex items-center justify-start">
                                            <input class="mr-2 rounded-md" type="checkbox" name="features[]" value="{{ $feature->id }}">
                                            <x-label for="features" :value="$feature->name" class="capitalize"/>
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
