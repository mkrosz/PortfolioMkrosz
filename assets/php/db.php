<?php
// Database connection settings
$DB_HOST =$_ENV['DB_HOST'];
$DB_USER =$_ENV['DB_USER']; // seu usuário do banco de dados
$DB_PASSWORD =$_ENV['DB_PASSWORD']; // sua senha do banco de dados
$DB_NAME =$_ENV['DB_NAME']; // o nome do banco de dados
$DB_PORT =$_ENV['DB_PORT'];

// Create connection
$conn = mysqli_connect("$DB_HOST", "$DB_USER", "$DB_PASSWORD", "$DB_NAME", "$DB_PORT");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch blog posts
function getBlogPosts() {
    global $conn;
    $sql = "SELECT * FROM blog_posts";
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
?>
