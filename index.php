<html>
<head>
    <title>Exemplo PHP</title>
</head>
<body>
<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

echo 'Versão Atual do PHP: ' . phpversion() . '<br>';

$servername = getenv('DB_HOST') ?: 'db';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: 'Senha123';
$database = getenv('DB_NAME') ?: 'meubanco';

// Criar conexão
$link = new mysqli($servername, $username, $password, $database);

if ($link->connect_error) {
    die("Erro de conexão: " . $link->connect_error);
}

$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();

$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$host_name')";

if ($link->query($query) === TRUE) {
    echo "Novo registro criado com sucesso!";
} else {
    echo "Erro: " . $link->error;
}
?>
</body>
</html>
