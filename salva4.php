<?php
// conexao
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

echo "Recebido: <br>";
echo $_GET['nome'];
echo "<br>";
echo $_GET['idioma'];
echo "<br>";
echo $_GET['pags'];
echo "<br>";
echo $_GET['edit'];
echo "<br>";
echo $_GET['date'];
echo "<br>";
echo $_GET['isbn'];
echo "<br>";

$codigoSQL = "INSERT INTO `livros` (`id`, `nome`, `idioma`, `paginas`, `editora`, `data`, `isbn`) VALUES (NULL, :nm, :idioma, :pags, :edit, :date, :isbn)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'idioma' => $_GET['idioma'], 'pags' => $_GET['pags'], 'edit' => $_GET['edit'], 'date' => $_GET['date'], 'isbn' => $_GET['isbn']));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;
?>