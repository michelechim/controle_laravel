<x-main-layout>
    <h2 class='text-4xl'>Clientes</h2>
    @if (isset($clientes) && $clientes->count() > 0)
        <x-tables.clientes :clientes="$clientes" class='table-odd' type='hover'/>
        @auth
            <div style="display:flex; flex-direction: row; justify-content:flex-end">
                <a href="/cliente"><button>Criar Novo Cliente</button></a>
            </div>
        @endauth
    @else
        <p>Clientes não encontrados! </p>
    @endif
</x-main-layout>
