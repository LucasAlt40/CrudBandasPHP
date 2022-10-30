<?php
    require_once("../../db/MusicasDao.php");

    $dao = new MusicasDao();
    $lista_musicas = $dao->listarMusicas();
    $json = json_encode($lista_musicas);
    echo $json;
    

    
?>