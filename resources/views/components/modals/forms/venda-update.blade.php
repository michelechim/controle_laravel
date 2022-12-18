<div class="flex flex-col justify-center w-fit shadow dark:bg-gray-700 h-fit m-0 p-3 bg-white self-center rounded-md">
    <div x-data="{
        venda: @js($venda),
        update() {
            this.venda.nome = this.venda.nome
            this.venda.descricao = this.venda.descricao
            if (this.venda.nome &&
                this.venda.descricao) {
                console.log({ venda: this.venda });
                $wire.set('nome', this.venda.nome)
                $wire.set('descricao', this.venda.descricao)
                $wire.set('valor', this.venda.valor)
                $wire.set('pagamento', this.venda.pagamento)
                $wire.update(this.venda.id)
            } else {
                alert('Erro ao atualizar venda!')
            }
        },
    }" x-init="start()">
        <form @submit.prevent="update()" id="venda-update-{{ $venda->id }}">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input x-model="venda.nome" type="text" name="nome"/></td>
                </tr>
                <tr>
                    <td>Descricao:</td>
                    <td><input x-model="venda.descricao" type="text" name="descricao"/></td>
                </tr>
                <tr>
                    <td>Valor:</td>
                    <td><input x-model="venda.valor" type="text" name="valor"/></td>
                </tr>
                <tr>
                    <td>Pagamento:</td>
                    <td><input x-model="venda.pagamento" type="text" name="pagamento"/></td>
                </tr>
            </table>
        </form>
        <div class='flex justify-center gap-24 w-full'>
            <x-secondary-button @click="idmodal=null">
                Cancelar
            </x-secondary-button>
            <x-primary-button form="venda-update-{{ $venda->id }}" @click="idmodal=null">
                Atualizar
            </x-primary-button>
        </div>
    </div>
</div>
