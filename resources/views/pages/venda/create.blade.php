<x-dash-layout>
    <h1>Inserir nova venda</h1>
    <form id=create action="/venda" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" /></td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td><input type="text" name="descricao"/></td>
            </tr>
            <tr>
                <td>Valor:</td>
                <td><input type="text" name="valor" /></td>
            </tr>
            <tr>
                <td>Pagamento</td>
                <td><input type="text" name="pagamento" /></td>
            </tr>
        </table>
    </form>
    <input type="submit" value="Criar" form='create'/>
    <a href="/dashboard"><button>Cancelar</button></a>
</x-dash-layout>
