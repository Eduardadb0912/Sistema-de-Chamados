<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/pagina_consultar_ra.css">
    <title>Consultar RA</title>
</head>
<body>
    <center>
        <h1>CONSULTAR RA</h1>
        <form method="POST"> <input type="number" name="RA" placeholder="RA">
            <input style="width: 115px" type="submit" value="PESQUISAR">
        </form>
        <table border="4">
            <tr>
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

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["RA"])) {
                        $RA = $_POST["RA"];
                        
                        $dados_select = mysqli_query($conn, "SELECT RA_ALUNO, NOME_ALUNO, SALA, PROBLEMA, DESCRICAO, DATA_CADASTRO, RESOLVIDO 
                        FROM chamados
                        INNER JOIN problemas
                        ON chamados.problema_id = problemas.ID_problema
                        WHERE RA_ALUNO = '$RA'");

                        while ($dado = mysqli_fetch_array($dados_select)) {
                            echo '<tr>';
                            echo '<td>'.$dado[0].'</td>';
                            echo '<td>'.$dado[1].'</td>';
                            echo '<td>'.$dado[2].'</td>';
                            echo '<td>'.$dado[3].'</td>';
                            echo '<td>'.$dado[4].'</td>';
                            echo '<td>'.$dado[5].'</td>';
                            if ($dado[6] == 0) {echo '<td> PENDENTE</td>';}
                            else if ($dado[6] == 1) {echo '<td> CONCLUÍDO </td>';}
                            else {echo 'Erro';}
                            echo '</tr>';
                        }
                    } else {
                        echo "RA não foi definido.";
                    }
                }
            ?>
        </table>
        <br />
        <a href="index.html"><input type="button" value="Voltar"></a>
    </center>
</body>
</html>