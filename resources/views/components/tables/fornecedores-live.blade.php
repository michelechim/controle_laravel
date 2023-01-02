<div x-data="{
    idmodal:null,
}">
<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th><a href="#" wire:click='orderBy'>Id</a></th>
            <th><a href="#" wire:click='orderByName'>Nome</a></th>
            <th>Endereço</th>
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Id - estado</th>
            @if (Auth::user())
                <th colspan="2">Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($fornecedores as $fornecedor)
            <tr>
                @if (Auth::user())
                    <td><a href="{{ route('fornecedor.single-dash', $fornecedor->id) }}">{{ $fornecedor->id }}</a></td>
                    <td><a href="{{ route('fornecedor.single-dash', $fornecedor->id) }}">{{ $fornecedor->nome }}</a></td>
                @else
                    <td><a href="/fornecedores/{{ $fornecedor->id }}">{{ $fornecedor->id }}</a></td>
                    <td><a href="/fornecedores/{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a></td>
                @endif

                <td>{{ $fornecedor->endereco }}</td>
                <td>{{ $fornecedor->cnpj}}</td>
                <td>{{ $fornecedor->telefone }}</td>
                <td>{{ $fornecedor->email }}</td>
                <td>{{ $fornecedor->estado_id }}</td>
                @if (Auth::user())
                    <td class='actions'>
                        <x-primary-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-upd-{{ $fornecedor->id }}'">
                            Atualizar
                        </x-primary-button>
                    </td>
                    <td class='actions'>
                        <x-danger-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-rm-{{ $fornecedor->id }}'">
                            Remover
                        </x-danger-button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($fornecedores as $fornecedor)
    <x-modals.fornecedor-modal
        id="{{'modal-rm-'.$fornecedor->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$fornecedor->nome.' ('.$fornecedor->id.')'}}</x-slot>
        <x-modals.forms.fornecedor-remove :fornecedor="$fornecedor"/>
    </x-forms.fornecedor-modal>
@endforeach
@foreach ($fornecedores as $fornecedor)
    <x-modals.fornecedor-modal
        id="{{'modal-upd-'.$fornecedor->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$fornecedor->nome.' ('.$fornecedor->id.')'}}</x-slot>
        <x-modals.forms.fornecedor-update :fornecedor="$fornecedor"/>
    </x-forms.fornecedor-modal>
@endforeach
<div>
