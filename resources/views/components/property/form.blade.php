<div class="card-glass w-full p-8">
    <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data" class="flex">
        @if($property->id)
            {{ method_field('PUT') }}
        @endif
        @csrf
        <div class="flex flex-col w-full gap-8">
            <div class="flex w-full gap-8">
                <div class="card-glass w-1/2 p-4">
                    <table class="w-full">
                        <tr>
                            <td>
                                <x-label for="name" :value="__('Titre')" />
                            </td>
                            <td>
                                <x-input id="name" class="block mt-1 w-full" type="text" name="title" :value="old('title', $property->title)" required autofocus />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-label for="description" :value="__('Description')" />
                            </td>
                            <td>
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $property->description)" required autofocus />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-label for="price" :value="__('Prix')" />
                            </td>
                            <td>
                                <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $property->price)" required autofocus />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-label for="surface" :value="__('Surface')" />
                            </td>
                            <td>
                                <x-input id="surface" class="block mt-1 w-full" type="number" name="surface" :value="old('surface', $property->surface)" required autofocus />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-label for="nb_rooms" :value="__('Pièces')" />
                            </td>
                            <td>
                                <x-input id="nb_rooms" class="block mt-1 w-full" type="number" name="nb_rooms" :value="old('rooms', $property->nb_rooms)" required autofocus />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-label for="address" :value="__('Adresse')" />
                            </td>
                            <td>
                                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $property->address)" required autofocus />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-glass w-1/2 p-4">
                    <table class="w-full">
                        <tr>
                            <td>
                                <x-label for="main_image" :value="__('Photo Principale')" />
                            </td>
                            <td>
                                <x-input id="city" class="block mt-1 w-full" type="file" name="main_image" :value="old('city', $property->image)" required autofocus />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-label for="images" :value="__('Autres Photo')" />
                            </td>
                            <td>
                                <x-input id="images" class="block mt-1 w-full" type="file" name="images[]" :value="old('images', $property->images)" required autofocus multiple />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="w-full">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </form>
</div>
