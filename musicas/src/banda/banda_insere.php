<?php
    require_once("../../db/BandasDao.php");

    $nome = $_POST["NOME"];
    $integrantes = $_POST["INTEGRANTES"];

    $dao = new BandasDao();
    $dao->inserirBanda($nome, $integrantes);

    header("Location: ../lista_bandas.php");
?>