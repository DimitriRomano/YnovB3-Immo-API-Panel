<div {{ $attributes->merge(['class'=> "card-glass px-4 py-2 font-sans"])}}>
    <table class="text-left w-full table-fixed border-separate">
        <thead>
        <tr>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Nom') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>
                <td class="font-bold">{{ $data->email }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    <a href="{{ route('admin.properties.update', $data->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('admin.properties.delete', $data->id) }}" method="POST" class="inline">
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
