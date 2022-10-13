<?php
    require_once("../../db/BandasDao.php");

    $nome = $_POST["NOME"];

    $dao = new BandasDao();
    $dao->deletarBanda($nome);

    header("Location: ../lista_bandas.php");
?>