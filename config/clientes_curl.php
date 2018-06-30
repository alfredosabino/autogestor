<?=
$ch = curl_init('./clientes_db.php');
$nome = $_POST['cliente_nome'];

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
$post = array('cliente_nome' => $nome);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

$resultado = curl_exec($ch);

curl_close($ch);

?>
