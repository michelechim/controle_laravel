<div x-data="{
    idmodal:null,
}">
<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th><a href="#" wire:click='orderBy'>Id</a></th>
            <th><a href="#" wire:click='orderByName'>Nome</a></th>
            <th>telefone</th>
            <th>endereco</th>
            @if (Auth::user())
                <th colspan="2">Acoes</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                @if (Auth::user())
                    <td><a href="{{ route('cliente.single-dash', $cliente->id) }}">{{ $cliente->id }}</a></td>
                    <td><a href="{{ route('cliente.single-dash', $cliente->id) }}">{{ $cliente->nome }}</a></td>
                @else
                    <td><a href="/clientes/{{ $cliente->id }}">{{ $cliente->id }}</a></td>
                    <td><a href="/clientes/{{ $cliente->id }}">{{ $cliente->nome }}</a></td>
                @endif

                <td>{{ $cliente->telefone }}</td>
                <td>{{ $cliente->endereco }}</td>
                @if (Auth::user())
                    <td class='actions'>
                        <x-primary-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-upd-{{ $cliente->id }}'">
                            Atualizar
                        </x-primary-button>
                    </td>
                    <td class='actions'>
                        <x-danger-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-rm-{{ $cliente->id }}'">
                            Remover
                        </x-danger-button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($clientes as $cliente)
    <x-modals.cliente-modal
        id="{{'modal-rm-'.$cliente->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$cliente->nome.' ('.$cliente->id.')'}}</x-slot>
        <x-modals.forms.cliente-remove :cliente="$cliente"/>
    </x-forms.cliente-modal>
@endforeach
@foreach ($clientes as $cliente)
    <x-modals.cliente-modal
        id="{{'modal-upd-'.$cliente->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$cliente->nome.' ('.$cliente->id.')'}}</x-slot>
        <x-modals.forms.cliente-update :cliente="$cliente"/>
    </x-forms.cliente-modal>
@endforeach
<div>
