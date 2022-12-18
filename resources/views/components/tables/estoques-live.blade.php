<div x-data="{
    idmodal:null,
}">
<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th><a href="#" wire:click='orderBy'>Id</a></th>
            <th><a href="#" wire:click='orderByName'>Descrição</a></th>
            <th>Validade</th>
            <th>Quantidade</th>
            <th>Custo</th>
            <th>Venda</th>
            @if (Auth::user())
                <th colspan="2">Ações</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($estoques as $estoque)
            <tr>
                @if (Auth::user())
                    <td><a href="{{ route('estoque.single-dash', $estoque->id) }}">{{ $estoque->id }}</a></td>
                    <td><a href="{{ route('estoque.single-dash', $estoque->id) }}">{{ $estoque->descricao }}</a></td>
                @else
                    <td><a href="/estoques/{{ $estoque->id }}">{{ $estoque->id }}</a></td>
                    <td><a href="/estoques/{{ $estoque->id }}">{{ $estoque->descricao}}</a></td>
                @endif

                <td>{{ $estoque->validade }}</td>
                <td>{{ $estoque->qtd_estoque }}</td>
                <td>{{ $estoque->custo }}</td>
                <td>{{ $estoque->venda }}</td>
                @if (Auth::user())
                    <td class='actions'>
                        <x-primary-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-upd-{{ $estoque->id }}'">
                            Atualizar
                        </x-primary-button>
                    </td>
                    <td class='actions'>
                        <x-danger-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-rm-{{ $estoque->id }}'">
                            Remover
                        </x-danger-button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($estoques as $estoque)
    <x-modals.estoque-modal
        id="{{'modal-rm-'.$estoque->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$estoque->descricao.' ('.$estoque->id.')'}}</x-slot>
        <x-modals.forms.estoque-remove :estoque="$estoque"/>
    </x-forms.estoque-modal>
@endforeach
@foreach ($estoques as $estoque)
    <x-modals.estoque-modal
        id="{{'modal-upd-'.$estoque->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$estoque->descricao.' ('.$estoque->id.')'}}</x-slot>
        <x-modals.forms.estoque-update :estoque="$estoque"/>
    </x-forms.estoque-modal>
@endforeach
<div>
