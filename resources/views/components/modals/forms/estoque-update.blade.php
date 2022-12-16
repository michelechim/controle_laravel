<div class="flex flex-col justify-center w-fit shadow dark:bg-gray-700 h-fit m-0 p-3 bg-white self-center rounded-md">
    <div x-data="{
        estoque: @js($estoque),
        update() {
            this.estoque.descricao = this.estoque.descricao
            this.estoque.validade = this.estoque.validade
            if (this.estoque.descricao &&
                this.estoque.validade) {
                console.log({ estoque: this.estoque });
                $wire.set('descricao', this.estoque.descricao)
                $wire.set('validade', this.estoque.validade)
                $wire.set('qtd_estoque', this.estoque.qtd_estoque)
                $wire.set('custo', this.estoque.custo)
                $wire.set('venda', this.estoque.venda)
                $wire.update(this.estoque.id)
            } else {
                alert('Erro ao atualizar estoque!')
            }
        },
    }" x-init="start()">
        <form @submit.prevent="update()" id="estoque-update-{{ $estoque->id }}">
            <table>
                <tr>
                    <td>Descricao:</td>
                    <td><input x-model="estoque.descricao" type="text" name="descricao"/></td>
                </tr>
                <tr>
                    <td>Validade:</td>
                    <td><input x-model="estoque.validade" type="text" name="validade"/></td>
                </tr>
                <tr>
                    <td>Quantidade:</td>
                    <td><input x-model="estoque.qtd_estoque" type="text" name="qtd_estoque"/></td>
                </tr>
                <tr>
                    <td>Custo:</td>
                    <td><input x-model="estoque.custo" type="text" name="custo"/></td>
                </tr>
                <tr>
                    <td>Venda:</td>
                    <td><input x-model="estoque.venda" type="text" name="venda"/></td>
                </tr>
            </table>
        </form>
        <div class='flex justify-center gap-24 w-full'>
            <x-secondary-button @click="idmodal=null">
                Cancelar
            </x-secondary-button>
            <x-primary-button form="estoque-update-{{ $estoque->id }}" @click="idmodal=null">
                Atualizar
            </x-primary-button>
        </div>
    </div>
</div>
