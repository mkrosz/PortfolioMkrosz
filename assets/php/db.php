<?php
// Configurações da conexão ao banco de dados
$servername = "sql108.infinityfree.com";  // Host correto do banco de dados
$username = "if0_37413690";               // Nome de usuário do banco de dados
$password = "eXuVc41q9QQlr5";             // Senha do banco de dados
$dbname = "if0_37413690_portfolio_db";    // Nome do banco de dados

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Função para obter o conteúdo da tabela
function getContent($tableName, $orderByDate = false)
{
    global $conn;
    // Verifica se a ordenação pela data deve ser aplicada
    if ($orderByDate) {
        $sql = "SELECT * FROM $tableName ORDER BY `date` DESC"; // Ordena pela coluna 'date'
    } else {
        $sql = "SELECT * FROM $tableName"; // Sem ordenação
    }
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    return [];
}


// Function to fetch blog posts
function getBlogPosts() {
    global $conn;
    $sql = "SELECT * FROM blog";
    $result = $conn->query($sql);
    $posts = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    return $posts;
}

// Função para buscar ferramentas
function getTools() {
    global $conn;
    $sql = "SELECT image_path, alt_text FROM tools";
    $result = $conn->query($sql);

    // Verifica se a consulta foi bem-sucedida
    if ($result === false) {
        die("Erro na consulta SQL: " . $conn->error); // Exibe mensagem de erro
    }

    // Inicializa o array de ferramentas
    $tools = [];

    // Verifica se existem resultados e os adiciona ao array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tools[] = $row;
        }
    }
    
    // Retorna as ferramentas
    return $tools;
}

function fetchDataFromDatabase($query) {
    // Supondo que você já tenha a conexão com o banco de dados configurada
    // Exemplo de como executar a query e retornar os dados
    global $conn; // Supondo que $conn seja sua conexão ao banco

    $result = mysqli_query($conn, $query);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}
?>
