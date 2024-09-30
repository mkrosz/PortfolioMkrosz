<?php
// Configurações da conexão ao banco de dados
$servername = "SEU_NOME_DE_SERVIDOR"; // Host correto do banco de dados
$username = "SEU_NOME_DE_USUARIO"; // Nome de usuário do banco de dados
$password = "SUA_SENHA"; // Senha do banco de dados
$dbname = "SEU_NOME_DE_BANCO"; // Nome do banco de dados

// Cria Conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!<br>"; // Para depuração

// Function to fetch blog posts
function getBlogPosts() {
    global $conn;
    $sql = "SELECT * FROM blog_posts";
    $result = $conn->query($sql);
    
    // Verifica se a consulta foi bem-sucedida
    if ($result === false) {
        die("Erro na consulta SQL: " . $conn->error); // Exibe mensagem de erro
    }

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
?>
