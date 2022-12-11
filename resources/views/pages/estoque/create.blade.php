<x-main-layout>
    <h1>Inserir novo estoque</h1>
    <form id=create action="/estoque" method="POST">
        @csrf
        <table>
            <tr>
                <td>Descricao:</td>
                <td><input type="text" name="descricao" /></td>
            </tr>
            <tr>
                <td>Validade:</td>
                <td><input type="text" name="validade"/></td>
            </tr>
            <tr>
                <td>Quantidade:</td>
                <td><input type="text" name="qtd_estoque" /></td>
            </tr>
            <tr>
                <td>Custo</td>
                <td><input type="text" name="custo" /></td>
            </tr>
            <tr>
                <td>Venda</td>
                <td><input type="text" name="venda" /></td>
            </tr>
        </table>
    </form>
    <input type="submit" value="Criar" form=create/>
    <a href="/estoques"><button>Cancelar</button></a>
</x-main-layout>
