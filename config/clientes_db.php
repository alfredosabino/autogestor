<?php

class clientes_db {
  public function __construct() {
      mysql_connect('localhost', 'root', 22111993);
      mysql_select_db('avaliacao');
  }
  public function getClientes($nome) {
    $select = mysql_query("SELECT * FROM tbl_clientes WHERE cli_nome LIKE \"%".$nome."%\"");
    while($row = mysql_fetch_array($select)) {
          $i = 0;
          $cat_name = mysql_fetch_array(mysql_query("SELECT cat_nome FROM tbl_categorias WHERE cat_id = "$row[cli_categoria]""));
          $fields[$i]["cliente_nome"] = $row["cli_nome"];
          $fields[$i]["cat_nome"] = $cat_name["cat_nome"];
          $i++;
      }
    return json_encode($json_result);
  }
}
$nome = $_POST["nome"];
$clientes = new clientes_db();
$select = $clientes->getClientes($nome);
header("Content-Type: application/json");
echo $select;
