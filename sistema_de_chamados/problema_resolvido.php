<?php
    require("conecta.php");

    if(isset($_POST['enviar']))  {
        foreach($_POST['enviar'] as $id => $value) {
            $sql = "UPDATE chamados SET resolvido = 1, data_resolvido = current_timestamp()
                    WHERE id_chamado = '$id'";
            $conn->query($sql);
        }
    }

    header("Location: visualiza_chamados.php");
    exit(); 