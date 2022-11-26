<?php
    require_once("../../db/BandasDao.php");

    $nome = $_POST["nome"];

    $dao = new BandasDao();
    $dao->deletarBanda($nome);

    header("Location: ../admin/lista_bandas.php");
?>