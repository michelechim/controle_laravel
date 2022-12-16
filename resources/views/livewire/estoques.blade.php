<div x-data="{ open: false }" class='flex justify-center'>
    <x-modals.forms.estoque-create />
    <div class="w-full lg:w-5/6">
        <div class="py-3 pr-5 flex justify-start">
            <x-primary-button @click="open = true">Novo Estoque</x-primary-button>
        </div>
        @if (isset($estoques) && $estoques->count() > 0)
            <x-tables.estoques-live :estoques="$estoques" class='table-odd' type='hover' />
        @else
            <p>Estoque não encontrados! </p>
        @endif
    </div>
</div>
