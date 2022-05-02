<div class="card-glass mx-4 px-4 py-2 font-sans">
    <table class="text-left w-full table-fixed border-separate">
        <thead>
        <tr>
            <th>{{ __('Image Principale') }}</th>
            <th>{{ __('Titre') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Type') }}</th>
            <th>{{ __('Crée le') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($properties as $property)
            <tr>
                <td>
                    <img src="{{ $property->main_image }}" alt="{{ $property->title }}" class="img-table">
                </td>
                <td class="font-bold">{{ $property->title }}</td>
                <td>{{ number_format($property->price, 0, ',', ' ') }} €</td>
                <td>{{ $property->type->name }}</td>
                <td>{{ $property->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.properties.update', $property->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('admin.properties.delete', $property->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
