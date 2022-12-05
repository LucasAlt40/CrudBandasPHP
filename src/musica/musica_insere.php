<?php
require_once("../../db/MusicasDao.php");


$nome = $_POST["nome_musica"];
$ano = $_POST["ano_lancamento"];
$album = $_POST["album"];
$banda = $_POST["banda"];
$arquivo = null;

if (isset($_FILES['capa'])) {
    $extensao = strtolower(substr($_FILES['capa']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "../uploads/";

    move_uploaded_file($_FILES['capa']['tmp_name'], $diretorio . $novo_nome);
    $arquivo = $novo_nome;
}

if (array_key_exists("lancamento", $_POST)) {
    $lancamento = 1;
} else {
    $lancamento = 0;
}

$dao = new MusicasDao();
$dao->inserirMusica($nome, $ano, $album, $banda, $lancamento, $arquivo);

header("Location: ../admin/lista_musicas.php");
?>