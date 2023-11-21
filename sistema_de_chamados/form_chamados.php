<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/pagina_form_chamados.css">
    <title>Cadastro de Chamados</title>
</head>
<body>
    <center>
        <h1>CADASTRO DE CHAMADO</h1>
        <form method="POST" action="cadastrar_chamados.php">
            <table>
                <tr>
                    <td><b>RA: <input type="number" name="ra_aluno"></td>
                    <td><b>NOME: <input type="text" name="nome_aluno"></td>
                    <td><b>SALA: <input type="number" name="sala"></td>
                </tr>  
                <tr> 
                    <?php
                        require("conecta.php");

                        $dados_select = mysqli_query($conn, "SELECT ID_PROBLEMA, PROBLEMA FROM PROBLEMAS");

                        echo "<td><b>PROBLEMA: <select name='problemas'>";
                        while($dado = mysqli_fetch_array($dados_select)) {
                            echo '<option value='.$dado[0].'>'.$dado[1].'</option>';
                        }
                        echo "</select></td>";
                    ?>
                    <td><b>DESCRIÇÃO:<input type="text" name="descricao"></td>
                    <td><input type="submit" class="Cadastrar" value="CADASTRAR"></td>
                </tr>
            </table>
            <input type="reset" class="Limpar" value="LIMPAR">
        </form>
    </center>
</body>
</html>