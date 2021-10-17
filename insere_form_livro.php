<?php
  include "db_connect.php";

  $titulo = $_POST["titulo"];
  $autor = $_POST["autor"];
  $ano = $_POST["ano"];
  $idEditora = $_POST["idEditora"];
  $preco = $_POST["preco"];
  $quantidade = $_POST["quantidade"];
  $tipo = $_POST["tipo"];

  $select_livro = mysqli_query($connection, "SELECT titulo FROM acervo WHERE titulo = '$titulo'");

  $insert_livro = "INSERT INTO acervo(
    titulo,
    autor,
    ano,
    idEditora,
    preco,
    quantidade,
    tipo)
  VALUES (
    '$titulo',
    '$autor',
    $ano,
    $idEditora,
    $preco,
    $quantidade,
    $tipo)
  ";

  if (mysqli_num_rows($select_livro) > 0) {
    echo "Livro já cadastrado!";
  }
  else {
    $insert_livro_created = mysqli_query($connection, $insert_livro);

    if ($insert_livro_created) {
      header("location: index_livro.php");
      exit;
    }
  }
?>
