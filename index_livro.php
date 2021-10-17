<link href="style.css" media="all" rel="Stylesheet" type="text/css" />

<?php include "header.php" ?>

<div class="container w">
  <form>
    <br>
    <div class = "is-flex is-justify-content-space-between">
      <h2 class="title is-4">Todos os Livros</h2>
      <div>
        <input type="text" name="pesquisar-por" placeholder="Nome do Livro..." class="input is-small">
        <input type="submit" name="pesquisar" value="Pesquisar" class="is-light button is-small">
      </div>
    </div>

    <table class="table w">
      <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano</th>
        <th>Editora</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Tipo</th>
        <th></th>
        <th></th>
      </tr>
        <?php
          include "db_connect.php";

          $search_var = '';
          if (isset($_GET['pesquisar-por'])) {
            $search_var = $_GET['pesquisar-por'];
          }

          $index_acervo = mysqli_query($connection, "SELECT 
            acervo.id,
            acervo.titulo,
            acervo.autor,
            acervo.ano,
            editora.nome AS editora,
            acervo.preco,
            acervo.quantidade,
            acervo.tipo
          FROM `acervo`
          INNER JOIN `editora` ON acervo.idEditora = editora.id
          WHERE acervo.titulo LIKE '%$search_var%'");

          while($data = mysqli_fetch_array($index_acervo)) {
            echo "<tr>";
            echo "<td>". $data['titulo'] ."</td>";
            echo "<td>". $data['autor'] ."</td>";
            echo "<td>". $data['ano'] ."</td>";
            echo "<td>". $data['editora'] ."</td>";
            echo "<td> R$ ". $data['preco'] ."</td>";
            echo "<td>". $data['quantidade'] ." un. </td>";
            echo "<td>". $data['tipo'] ."</td>";
            echo "<td><a class='button is-info is-small' href='update_livro.php?id=". $data['id'] ."'>Atualizar</a></td>";
            echo "<td><a class='button is-danger is-small' href='delete_livro.php?id=". $data['id'] ."'>Deletar</a></td>";
            echo "</tr>";
          }	
        ?>
    </table>
  </form>
  <hr>
  <?php include "form_livro.php"?>
</div>