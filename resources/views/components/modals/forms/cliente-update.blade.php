<div class="flex flex-col justify-center w-fit shadow dark:bg-gray-700 h-fit m-0 p-3 bg-white self-center rounded-md">
    <div x-data="{
        cliente: @js($cliente),
        update() {
            this.cliente.telefone = this.cliente.telefone
            this.cliente.endereco = this.cliente.endereco
            if (this.cliente.telefone &&
                this.cliente.endereco) {
                console.log({ cliente: this.cliente });
                $wire.set('nome', this.cliente.nome)
                $wire.set('telefone', this.cliente.telefone)
                $wire.set('endereco', this.cliente.endereco)
                $wire.update(this.cliente.id)
            } else {
                alert('Erro ao atualizar cliente!')
            }
        },
    }" x-init="start()">
        <form @submit.prevent="update()" id="cliente-update-{{ $cliente->id }}">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input x-model="cliente.nome" type="text" name="nome" /></td>
                </tr>
                <tr>
                    <td>Telefone:</td>
                    <td><input x-model="cliente.telefone" type="text" name="telefone"/></td>
                </tr>
                <tr>
                    <td>Endereco:</td>
                    <td><input x-model="cliente.endereco" type="text" name="endereco" /></td>
                </tr>
            </table>
        </form>
        <div class='flex justify-center gap-24 w-full'>
            <x-secondary-button @click="idmodal=null">
                Cancelar
            </x-secondary-button>
            <x-primary-button form="cliente-update-{{ $cliente->id }}" @click="idmodal=null">
                Atualizar
            </x-primary-button>
        </div>
    </div>
</div>
