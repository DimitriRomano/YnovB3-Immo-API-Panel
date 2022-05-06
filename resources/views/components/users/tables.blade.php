<div {{ $attributes->merge(['class'=> "card-glass px-4 py-2 font-sans"])}}>
    <table class="text-left w-full table-fixed border-separate">
        <thead>
        <tr>
            <th>{{ __('Photo') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Nom') }}</th>
            <th>{{ __('Téléphone') }}</th>
            <th>{{ __('Rôle') }}</th>
            <th>{{ __('Créé le') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>
                    <img src="{{ $data->image }}" alt="{{ $data->name }}" class="w-12 h-12 rounded-full">
                <td class="font-bold">{{ $data->email }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->phone }}</td>
                <td>{{ $data->role->display_name }}</td>
                <td>{{ $data->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.users.update', $data->id) }}" class="btn btn-primary py-2">Modifier</a>
                    <form action="{{ route('admin.users.delete', $data->id) }}" method="POST" class="inline">
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
