<?php
    require("conecta.php");

    $ra_aluno = $_POST['ra_aluno'];
    $nome_aluno = $_POST['nome_aluno'];
    $sala = $_POST['sala'];
    $problemas = $_POST['problemas'];
    $descricao = $_POST['descricao'];
    
    $sql = "INSERT INTO chamados (ra_aluno, nome_aluno, sala, problema_id, descricao)
    VALUES ( '$ra_aluno', '$nome_aluno', '$sala', '$problemas', '$descricao')";

    if ($conn->query($sql) === TRUE) {
      echo "<center><h1>Solicitação de Chamado Cadastrado com Sucesso!</h1>";
      echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
      echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
?>