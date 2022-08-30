<?php
        include_once("conectar.php");

        $id = $_GET["idregistros"];

        $deletar = $pdo->prepare("DELETE FROM registros WHERE idregistros=$id");
        $deletar->execute();

        if($deletar):
            header("Location: index.html");
        endif;
?>