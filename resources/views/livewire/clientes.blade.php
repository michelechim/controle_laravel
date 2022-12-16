<div x-data="{ open: false }" class='flex justify-center'>
    <x-modals.forms.cliente-create />
    <div class="w-full lg:w-5/6">
        <div class="py-3 pr-5 flex justify-start">
            <x-primary-button @click="open = true">Novo Cliente</x-primary-button>
        </div>
        @if (isset($clientes) && $clientes->count() > 0)
            <x-tables.clientes-live :clientes="$clientes" class='table-odd' type='hover' />
        @else
            <p>Clientes não encontrados! </p>
        @endif
    </div>
</div>
