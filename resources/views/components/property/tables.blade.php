<div {{ $attributes->merge(['class'=> "card-glass px-4 py-2 font-sans"])}}>


    <div class="flex flex-wrap">
        @foreach($datas as $property)
            <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/5 p-4">
                <div class="card-glass block shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <a href="{{ route('admin.properties.form.edit', $property->id) }}">
                        <div class="relative pb-48 overflow-hidden">
                            <img class="absolute inset-0 h-full w-full object-cover" src="{{ $property->main_image }}" alt="">
                        </div>
                        <div class="p-4">
                            <span class="badge bg-purple-300 text-purple-800">{{ $property->type->name }}</span>
                            <span class="badge bg-blue-300 text-blue-800">{{ $property->nb_rooms }} </span>
                            <span class="badge bg-pink-300 text-pink-800">{{ $property->surface }} m²</span>

                        </div>
                        <div class="border-t p-4">
                            <h2 class="mt-2 mb-2 text-2xl font-bold">{{ $property->title }}</h2>
                            <div class="mt-3 flex items-center">
                                <span class="font-bold text-xl">{{ number_format($property->price, 0, ',', ' ') }} €</span>
                            </div>
                        </div>
                    </a>
                    <div class="p-4 border-t">
                        <a href="{{ route('admin.properties.form.edit', $property->id) }}" class="btn btn-primary py-2">Modifier</a>
                        <form action="{{ route('admin.properties.delete', $property->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
