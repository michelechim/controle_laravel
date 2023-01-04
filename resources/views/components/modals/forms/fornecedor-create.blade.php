<div x-cloak>
    <div x-show="open"
        x-bind:class="!open ? 'hidden' :
            'overflow-y-auto overflow-x-hidden flex justify-center fixed top-0 right-0 left-0 z-50 h-modal md:h-full bg-gray-900/25'">
            <div class="flex rounded-md p-5 flex-col justify-center w-fit min-w-min mt-10 bg-white"
            @click.away="open = false">
            <h1 class='text-center text-2xl font-bold pb-4 mb-4 border-b-2 border-gray-300'>Novo Fornecedor</h1>
            <form id=create @submit.prevent="$wire.save()" method="POST">
                @csrf
                <table>
                    <tr>
                        <td>Nome:</td>
                        <td><input wire:model='nome' type="text" name="nome" /></td>
                    </tr>
                    <tr>
                        <td>Endereco:</td>
                        <td><input wire:model='endereco' type="text"  name="endereco" /></td>
                    </tr>
                    <tr>
                        <td>CNPJ:</td>
                        <td><input wire:model='cnpj' type="text"  name="cnpj" /></td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td><input wire:model='telefone' type="text" name="telefone" /></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input wire:model='email' type="text"  name="email" /></td>
                    </tr>
                    <tr>
                        <td>Id - estado:</td>
                        <td><input wire:model='estado_id' type="text"  name="estado_id" /></td>
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
