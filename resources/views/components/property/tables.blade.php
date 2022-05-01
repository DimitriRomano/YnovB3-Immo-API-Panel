<div class="card-glass m-12 p-4">
    <table>
        <thead>
        <tr>
            <th>{{ __('Main image') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Type') }}</th>
            <th>{{ __('Created At') }}</th>
            <th>{{ __('Updated At') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($properties as $property)
            <tr>
                <td>
                    <img src="{{ $property->main_image }}" alt="{{ $property->title }}" width="100" height="100">
                </td>
                <td>{{ $property->title }}</td>
                <td>{{ $property->price }}</td>
                <td>{{ $property->type->name }}</td>
                <td>{{ $property->created_at }}</td>
                <td>{{ $property->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.properties.update', $property->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.properties.delete', $property->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
