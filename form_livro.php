<div class="container w">
  <h2 class="title is-4">Cadastrar novo Livro</h2>
  <form action="insere_form_livro.php" method="POST">

    <div class="is-flex">
      <div>
        <label class="label" for="titulo">Título do Livro</label>
        <input class="input" required name="titulo" id="titulo" type="text" size="23" minlength="5" maxlength="100">
      </div>
      <div>
        <label class="label" for="autor">Autor(a)</label>
        <input class="input" required name="autor" id="autor" type="text" size="23" minlength="5" maxlength="60">      
      </div>
      <div>
        <label class="label" for="ano">Ano de Publicação</label>
        <input class="input" required name="ano" id="ano" type="number" size="23" min="1000" value="2021">        
      </div>
    </div>

    <br>

    <div class="is-flex">
      <div>
        <label class="label" for="idEditora">Editora</label>
        <div class="select">
          <select name="idEditora" id="idEditora">
            <option disabled selected>-- Selecionar Editora --</option>
            <?php
                include "db_connect.php";
                $records = mysqli_query($connection, "SELECT * From editora");

                while($data = mysqli_fetch_array($records))
                {
                    echo "<option value='". $data['id'] ."'>" .$data['nome'] ."</option>";
                }	
            ?>  
          </select>
        </div>
      </div>
      <div>
        <label class="label" for="preco">Preço (R$)</label>
        <input class="input" required name="preco" id="preco" type="number" size="23" step=".01" min="5.00" value="19.99">
      </div>
      <div>
        <label class="label" for="quantidade">Quantidade em Estoque</label>
        <input class="input" required name="quantidade" id="quantidade" type="number" size="23" min="0" value="100">
      </div>
    </div>

    <br>

    <label class="label" for="tipo">Tipo</label>
    <input class="input" required name="tipo" id="tipo" type="number" size="23" min="1" value="1">
    <br>
    <br>
    <input type="submit" value="Cadastrar Livro" class="button is-success">
  </form>
</div>