<div {{ $attributes->merge(['class'=> "card-glass px-4 py-2 font-sans my-4"])}}>
    <table class="text-left w-full table-fixed border-separate">
        <thead>
        <tr>
            <th>{{__('Photo')}}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Nom') }}</th>
            <th>{{ __('Téléphone') }}</th>
            <th>{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>
                    <img src="{{ $data->user->image }}" class="w-12 h-12 rounded-full" alt="">
                </td>
                <td>{{ $data->user->email}}</td>
                <td>{{ $data->user->name}}</td>
                <td>{{ $data->user->phone}}</td>
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
                            <span class="badge bg-green-300 text-green-800">{{ __('Accepté') }}</span>
                        @break
                        @case('rejected')
                            <span class="badge bg-red-300 text-red-800">{{ __('Refusé') }}</span>
                        @break
                    @endswitch

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
