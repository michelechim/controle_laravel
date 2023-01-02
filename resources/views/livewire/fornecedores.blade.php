<div x-data="{ open: false }" class='flex justify-center'>
    <x-modals.forms.fornecedor-create />
    <div class="w-full lg:w-5/6">
        <div class="py-3 pr-5 flex justify-start">
            <x-primary-button @click="open = true">Novo fornecedor</x-primary-button>
        </div>
        @if (isset($fornecedores) && $fornecedores->count() > 0)
            <x-tables.fornecedores-live :fornecedores="$fornecedores" class='table-odd' type='hover' />
        @else
            <p>Fornecedores não encontrados! </p>
        @endif
    </div>
</div>
