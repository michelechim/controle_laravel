<div x-cloak>
    <div x-show="open"
        x-bind:class="!open ? 'hidden' :
            'overflow-y-auto overflow-x-hidden flex justify-center fixed top-0 right-0 left-0 z-50 h-modal md:h-full bg-gray-900/25'">
            <div class="flex rounded-md p-5 flex-col justify-center w-fit min-w-min mt-10 bg-white"
            @click.away="open = false">
            <h1 class='text-center text-2xl font-bold pb-4 mb-4 border-b-2 border-gray-300'>Novo Estoque</h1>
            <form id=create @submit.prevent="$wire.save()" method="POST">
                @csrf
                <table>
                    <tr>
                        <td>Descricao:</td>
                        <td><input wire:model='descricao' type="text" name="descricao" /></td>
                    </tr>
                    <tr>
                        <td>Validade:</td>
                        <td><input wire:model='validade' type="text" name="validade" /></td>
                    </tr>
                    <tr>
                        <td>Quantidade:</td>
                        <td><input wire:model='qtd_estoque' type="text"  name="qtd_estoque" /></td>
                    </tr>
                    <tr>
                        <td>Custo:</td>
                        <td><input wire:model='custo' type="text"  name="custo" /></td>
                    </tr>
                    <tr>
                        <td>Venda:</td>
                        <td><input wire:model='venda' type="text"  name="venda" /></td>
                    </tr>
                </table>
            </form>
            <div class='flex mt-4 justify-center gap-24 w-full'>
                <x-secondary-button @click="open=false" class='w-30'>Cancelar</x-secondary-button>
                <x-primary-button @click="open=false" class='w-30' form='create'>Criar</x-primary-button>
            </div>
        </div>
    </div>
</div>
