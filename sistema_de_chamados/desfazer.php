<?php
    require("conecta.php");

    if(isset($_POST['enviar'])) {
        foreach($_POST['enviar'] as $id => $value) {
            $sql = "UPDATE chamados SET resolvido = 0, data_resolvido = NULL
            WHERE id_chamado = '$id'
           ";
            $conn->query($sql);
        }
    }

    header("Location: visualiza_resolvidos.php");
    exit(); 