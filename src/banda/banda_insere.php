<?php
    require_once("../../db/BandasDao.php");

    $nome = $_POST["nome"];
    $integrantes = $_POST["integrantes"];

    $dao = new BandasDao();
    $dao->inserirBanda($nome, $integrantes);

    header("Location: ../admin/lista_bandas.php");
?>