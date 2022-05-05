<div {{ $attributes->merge(['class'=> "card-glass px-4 py-2 font-sans"])}}>


    <div class="flex flex-wrap">
        @foreach($datas as $property)
            <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/6 p-4">
                <div class="card-glass block shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <a href="">
                        <div class="relative pb-48 overflow-hidden">
                            <img class="absolute inset-0 h-full w-full object-cover" src="{{ $property->main_image }}" alt="">
                        </div>
                        <div class="p-4 flex justify-between">
                            <span class="badge bg-pink-300 text-pink-800">{{ $property->reservations()->count() }} demandes</span>
                        </div>
                        <div class="border-t p-4">
                            <h2 class="my-2 text-2xl font-bold">{{ $property->title }}</h2>
                            <span class="font-bold text-xl">{{ number_format($property->price, 0, ',', ' ') }} €</span>
                        </div>
                    </a>
                    <div class="p-4 border-t">
                        <a href="{{ route('admin.property.reservations', $property->id) }}" class="btn btn-primary">Voir les demandes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
