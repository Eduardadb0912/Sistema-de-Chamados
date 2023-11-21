<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/pagina_vizualiza_chamados.css">
    <title>Registro de Chamados</title>
</head>
<body>
    <center>
        <h1>REGISTRO DE CHAMADOS</h1>

        <table border="4">
            <tr class="infos">
                <td><b>RA</td>
                <td><b>NOME</td>
                <td><b>SALA</td>
                <td><b>PROBLEMA</td>
                <td><b>DESCRIÇÃO</td>
                <td><b>SOLICITAÇÃO</td>
                <td><b>STATUS</td>
                
            </tr>
            <?php
                require("conecta.php");

                $dados_select = mysqli_query($conn, "SELECT ID_CHAMADO, RA_ALUNO, NOME_ALUNO, SALA, PROBLEMA, DESCRICAO, DATA_CADASTRO, DATA_RESOLVIDO 
                FROM chamados
                INNER JOIN problemas
                ON chamados.problema_id = problemas.ID_problema
                WHERE RESOLVIDO = 0");
                echo "<form action='problema_resolvido.php' method='post'>";
                while($dado = mysqli_fetch_array($dados_select)) {
                        echo '<tr>';
                        echo '<td>'.$dado[1].'</td>';
                        echo '<td>'.$dado[2].'</td>';
                        echo '<td>'.$dado[3].'</td>';
                        echo '<td>'.$dado[4].'</td>';
                        echo '<td>'.$dado[5].'</td>';
                        echo '<td>'.$dado[6].'</td>';
                        if ($dado[7] == NULL) {echo '<td> pendente </td>';}
                            else {echo '<td>'.$dado[7].'</td>';}
                        echo "<td><input type='submit' name='enviar[".$dado[0]."]' value='Resolver'> "."</td>";
                        echo '</tr>';
                }
                echo "</form>";
            ?>
        </table>
        <br />
        <a href="index.html"><input type="button" value="Voltar"></a>
    </center>
</body>
</html>