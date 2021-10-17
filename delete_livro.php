<?php
  include 'db_connect.php';

  $id = $_GET['id'];
  $del = mysqli_query($connection, "DELETE FROM acervo WHERE id = $id");

  if ($del) {
    header("location: index_livro.php");
    exit;
  }
  else {
    echo "<BR><BR>
    <FONT color=red face=Verdana size=2>
      <CENTER>
        ERRO: Não foi possível deletar o livro desejado.
      </CENTER>
    </FONT>";
  }
?>