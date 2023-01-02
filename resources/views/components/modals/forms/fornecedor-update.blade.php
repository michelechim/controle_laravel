<div class="flex flex-col justify-center w-fit shadow dark:bg-gray-700 h-fit m-0 p-3 bg-white self-center rounded-md">
    <div x-data="{
        fornecedor: @js($fornecedor),
        update() {
            this.fornecedor.telefone = this.fornecedor.telefone
            this.fornecedor.endereco = this.fornecedor.endereco
            if (this.fornecedor.telefone &&
                this.fornecedor.endereco) {
                console.log({ fornecedor: this.fornecedor });
                $wire.set('nome', this.fornecedor.nome)
                $wire.set('endereco', this.fornecedor.endereco)
                $wire.set('cnpj', this.fornecedor.cnpj)
                $wire.set('telefone', this.fornecedor.telefone)
                $wire.set('estado_id', this.fornecedor.estado_id)

                $wire.update(this.fornecedor.id)
            } else {
                alert('Erro ao atualizar fornecedor!')
            }
        },
    }" x-init="start()">
        <form @submit.prevent="update()" id="fornecedor-update-{{ $fornecedor->id }}">
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
        <div class='flex justify-center gap-24 w-full'>
            <x-secondary-button @click="idmodal=null">
                Cancelar
            </x-secondary-button>
            <x-primary-button form="fornecedor-update-{{ $fornecedor->id }}" @click="idmodal=null">
                Atualizar
            </x-primary-button>
        </div>
    </div>
</div>
