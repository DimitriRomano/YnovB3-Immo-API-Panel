<div {{ $attributes->merge(['class'=> "card-glass px-4 py-2 font-sans my-4"])}}>
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
                <td class="font-bold">{{ $data->user->email}}</td>
                <td>{{ $data->user->name}}</td>
                <td>
                    @switch($data->status)
                        @case('pending')
                            <form action="{{ route('admin.reservations.accept', $data->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-green">Accepter</button>
                            </form>
                            <form action="{{ route('admin.reservations.decline', $data->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Refuser</button>
                            </form>
                        @break
                        @case('approved')
                            <span class="text-green-500">{{ __('Accepté') }}</span>
                        @break
                        @case('rejected')
                            <span class="text-red-500">{{ __('Refusé') }}</span>
                        @break
                    @endswitch

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
