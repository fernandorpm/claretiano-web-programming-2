<link href="style.css" media="all" rel="Stylesheet" type="text/css" /> 

<?php
  include "db_connect.php";

  $id = $_GET['id'];
  $livro_to_update = mysqli_query($connection, "SELECT * FROM acervo WHERE id = $id");
  $data = mysqli_fetch_array($livro_to_update);

  if(isset($_POST['update']))
  {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST["ano"];
    $idEditora = $_POST["idEditora"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $tipo = $_POST["tipo"];
	
    $edit = mysqli_query($connection, "UPDATE acervo SET
      titulo = '$titulo',
      autor = '$autor',
      ano = $ano,
      idEditora = $idEditora,
      preco = $preco,
      quantidade = $quantidade,
      tipo = $tipo
      WHERE id = $id"  
    );
	
    if ($edit) {
        header("location:index_livro.php");
        exit;
    }
    else {
        echo "Não foi possível atualizar os dados do Livro '$titulo'.";
    }    	
  }
?>

<?php include "header.php" ?>

<div class="container w">
  <br>
  <br>
  <h3 class="title is-4">Atualizar Livro: '<?php echo $data['titulo'] ?>'</h3>

  <form method="POST">
    <div class="is-flex">
      <div>
        <label class="label" for="titulo">Título do Livro</label>
        <input class="input" required name="titulo" id="titulo" value="<?php echo $data['titulo'] ?>" type="text" size="23" minlength="5" maxlength="100">
      </div>
      <div>
        <label class="label" for="autor">Autor(a)</label>
        <input class="input" required name="autor" id="autor" value="<?php echo $data['autor'] ?>" type="text" size="23" minlength="5" maxlength="60">     
      </div>
      <div>
        <label class="label" for="ano">Ano de Publicação</label>
        <input class="input" required name="ano" id="ano" type="number" size="23" min="1000" value="<?php echo $data['ano'] ?>">      
      </div>
    </div>

    <div class="is-flex">
      <div>
        <label class="label" for="editora">Editora</label>
        <div class="select">
          <select name="idEditora" id="idEditora">
            <option disabled selected>-- Selecionar Editora --</option>
            <?php
                include "db_connect.php";
                $records = mysqli_query($connection, "SELECT * From editora");

                while($data_editora = mysqli_fetch_array($records))
                {
                  if ($data['idEditora'] == $data_editora['id']) {
                    echo "<option selected value='". $data_editora['id'] ."'>" .$data_editora['nome'] ."</option>";
                  } else {
                    echo "<option value='". $data_editora['id'] ."'>" .$data_editora['nome'] ."</option>";
                  }
                }	
            ?>  
          </select>
        </div>
      </div>
      <div>
        <label class="label" for="preco">Preço (R$)</label>
        <input class="input" required name="preco" id="preco" type="number" size="23" step=".01" min="5.00" value="<?php echo $data['preco'] ?>">
      </div>
      <div>
        <label class="label" for="quantidade">Quantidade em Estoque</label>
        <input class="input" required name="quantidade" id="quantidade" type="number" size="23" min="0" value="<?php echo $data['quantidade'] ?>">
      </div>
    </div>

    <label class="label" for="tipo">Tipo</label>
    <input class="input" required name="tipo" id="tipo" type="number" size="23" min="1" value="<?php echo $data['tipo'] ?>">
    <br>
    <br>
    <input type="submit" name="update" value="Atualizar Livro" class="button is-success">
    <a href="index_livro.php" class="button is-light">Voltar</a>
  </form>
</div>