<div x-data="{ open: false }" class='flex justify-center'>
    <x-modals.forms.venda-create />
    <div class="w-full lg:w-5/6">
        <div class="py-3 pr-5 flex justify-start">
            <x-primary-button @click="open = true">Nova Venda</x-primary-button>
        </div>
        @if (isset($vendas) && $vendas->count() > 0)
            <x-tables.vendas-live :vendas="$vendas" class='table-odd' type='hover' />
        @else
            <p>Vendas não encontrados! </p>
        @endif
    </div>
</div>
