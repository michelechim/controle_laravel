<div x-data="{
    idmodal:null,
}">
<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th><a href="#" wire:click='orderBy'>Id</a></th>
            <th><a href="#" wire:click='orderByName'>Nome</a></th>
            <th>Descricao</th>
            <th>Valor</th>
            <th>Pagamento</th>
            @if (Auth::user())
                <th colspan="2">Acoes</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($vendas as $venda)
            <tr>
                @if (Auth::user())
                    <td><a href="{{ route('venda.single-dash', $venda->id) }}">{{ $venda->id }}</a></td>
                    <td><a href="{{ route('venda.single-dash', $venda->id) }}">{{ $venda->nome }}</a></td>
                @else
                    <td><a href="/vendas/{{ $venda->id }}">{{ $venda->id }}</a></td>
                    <td><a href="/vendas/{{ $venda->id }}">{{ $venda->nome}}</a></td>
                @endif

                <td>{{ $venda->descricao }}</td>
                <td>{{ $venda->valor }}</td>
                <td>{{ $venda->pagamento }}</td>
                @if (Auth::user())
                    <td class='actions'>
                        <x-primary-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-upd-{{ $venda->id }}'">
                            Atualizar
                        </x-primary-button>
                    </td>
                    <td class='actions'>
                        <x-danger-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-rm-{{ $venda->id }}'">
                            Remover
                        </x-danger-button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($vendas as $venda)
    <x-modals.venda-modal
        id="{{'modal-rm-'.$venda->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$venda->nome.' ('.$venda->id.')'}}</x-slot>
        <x-modals.forms.venda-remove :venda="$venda"/>
    </x-forms.venda-modal>
@endforeach
@foreach ($vendas as $venda)
    <x-modals.venda-modal
        id="{{'modal-upd-'.$venda->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$venda->nome.' ('.$venda->id.')'}}</x-slot>
        <x-modals.forms.venda-update :venda="$venda"/>
    </x-forms.venda-modal>
@endforeach
<div>
