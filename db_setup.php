<?php
  include "db_connect.php";

  $create_table_editora = "CREATE TABLE editora (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(60),
    PRIMARY KEY (id)
  )";

  $populate_table_editora = "INSERT INTO editora (nome)
    VALUES
      ('Abril'),
      ('Panini'),
      ('Shonen Jump'), 
      ('Saraiva'),
      ('Companhia de Letras')
  ";

  $create_table_acervo = "CREATE TABLE acervo (
    id INT NOT NULL AUTO_INCREMENT,
    idEditora INT,
    titulo VARCHAR(100),
    autor VARCHAR(60),
    ano INT,
    preco DOUBLE,
    quantidade INT,
    tipo INT,
    PRIMARY KEY (id),
    FOREIGN KEY (idEditora) REFERENCES editora(id)
  )";

  $table_editora_created = mysqli_query($connection, $create_table_editora);
  $table_acervo_created = mysqli_query($connection, $create_table_acervo);
  $table_editora_populated = mysqli_query($connection, $populate_table_editora);

  if ($table_acervo_created AND $table_editora_created AND $table_editora_populated) {
    echo "<BR><BR>
      <FONT color=blue face=Verdana size=2>
        <CENTER>
          Tabelas criadas com sucesso!
        </CENTER>
      </FONT>";
  }
  else {
    echo "<BR><BR>
    <FONT color=red face=Verdana size=2>
      <CENTER>
        ERRO: As tabelas não foram criadas!
      </CENTER>
    </FONT>";
  }
?>