<?php
include './assets/php/db.php'; // Inclui o arquivo de conexão com o banco de dados

// Define o charset da conexão para evitar problemas com caracteres especiais
mysqli_set_charset($conn, "utf8");

// Definindo o cookie com a URL do mapa
$map_url = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d117091.82339552487!2d-47.5111602955855!3d-23.492205541542553!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5f54bcad87989%3A0x4a9099fb9d10cb8e!2sSorocaba%2C%20State%20of%20S%C3%A3o%20Paulo!5e0!3m2!1sen!2sbr!4v1722484916202!5m2!1sen!2sbr";
setcookie("sorocaba_map", "$map_url", [
  'expires' => time() + (10 * 365 * 24 * 60 * 60), // Dura 10 anos
  'path' => '/',
  'domain' => 'seusite.com', // Substitua pelo seu domínio
  'secure' => true, // Somente se seu site estiver usando HTTPS
  'httponly' => true, // Apenas acessível via HTTP, não via JavaScript
  'samesite' => 'None', // Necessário para cookies de terceiros
]);





// Chama a função que busca as ferramentas e preenche a variável $tools
$tools = getTools();
// Função para obter o conteúdo da tabela
function getContent($tableName)
{
  global $conn;
  $sql = "SELECT * FROM $tableName";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  return [];
}

// Consulta para buscar todos os posts
$sql = "SELECT id, category, date, title, description, image_url FROM blog_posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio de Mike</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/Icones/icone-logo.png" type="image/x-icon" />

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css" />

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
</head>

<body>
  <!--
    - #MAIN
  -->

  <main>
    <!--
      - #SIDEBAR
    -->

    <aside class="sidebar" data-sidebar>
      <div class="sidebar-info">
        <figure class="avatar-box">
          <img src="./assets/images/foto-de-perfil.png" alt="Mike Franguelli" width="80" />
        </figure>

        <div class="info-content">
          <h1 class="name" title="Mike Franguelli">Mike Franguelli</h1>

          <p class="title">Programming student</p>
        </div>

        <button class="info_more-btn" data-sidebar-btn>
          <span>Show Contacts</span>

          <ion-icon name="chevron-down"></ion-icon>
        </button>
      </div>

      <div class="sidebar-info_more">
        <div class="separator"></div>

        <ul class="contacts-list">
          <li class="contact-item">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Email</p>

              <a href="mailto:mikrosoft2006@gmail.com" class="contact-link">mikrosoft2006@gmail.com</a>
            </div>
          </li>

          <li class="contact-item">
            <div class="icon-box">
              <ion-icon name="phone-portrait-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Phone</p>

              <a href="tel:+5515991646255" class="contact-link">+55 (15) 99164-6255</a>
            </div>
          </li>

          <li class="contact-item">
            <div class="icon-box">
              <ion-icon name="calendar-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Birthday</p>

              <time datetime="2006-04-12">April 2006</time>
            </div>
          </li>

          <li class="contact-item">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <div class="contact-info">
              <p class="contact-title">Location</p>

              <address>Sorocaba, São Paulo, BR</address>
            </div>
          </li>
        </ul>

        <div class="separator"></div>

        <ul class="social-list">
          <li class="social-item">
            <a href="https://www.linkedin.com/in/mike-franguelli-137513248/" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

          <li class="social-item">
            <a href="https://github.com/mkrosz" class="social-link">
              <ion-icon name="logo-github"></ion-icon>
            </a>
          </li>

          <li class="social-item">
            <a href="https://www.instagram.com/mike.rosz/" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <!--
      - #main-content
    -->

    <div class="main-content">

      <!--
        - #NAVBAR
      -->

      <nav class="navbar">
        <ul class="navbar-list">
          <li class="navbar-item">
            <button class="navbar-link active" data-nav-link>About</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Resume</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Portfolio</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Blog</button>
          </li>

          <li class="navbar-item">
            <button class="navbar-link" data-nav-link>Contact</button>
          </li>
        </ul>
      </nav>

      <!--
        - #ABOUT
      -->
      <article class="about active" data-page="about">
        <header>
          <h2 class="h2 article-title">About me</h2>
        </header>

        <section class="about-text">
          <?php
          $aboutContent = getContent('about');
          if (!empty($aboutContent)) {
            foreach ($aboutContent as $content) {
              echo "<p>" . htmlspecialchars($content['content']) . "</p>";
            }
          } else {
            echo "<p>Informações sobre mim não encontradas.</p>";
          }
          ?>
        </section>
        <!--
          - service
        -->
        <section class="service">
          <h3 class="h3 service-title">What I'm Doing</h3>

          <ul class="service-list">
            <?php
            $doing = getContent('doing'); // Obtém os dados da tabela "doing"
            foreach ($doing as $item) {
              echo "<li class='service-item'>";
              echo "<div class='service-icon-box'>";
              // Certifique-se de que o caminho da imagem seja correto
              echo "<img src='" . $item['icon'] . "' alt='" . htmlspecialchars($item['title']) . " icon' width='40' />";
              echo "</div>";
              echo "<div class='service-content-box'>";
              echo "<h4 class='h4 service-item-title'>" . htmlspecialchars($item['title']) . "</h4>";
              echo "<p class='service-item-text'>" . htmlspecialchars($item['description']) . "</p>";
              echo "</div>";
              echo "</li>";
            }
            ?>
          </ul>
        </section>

        <!--
          - tools
          -->
        <section class="tools">
          <h3 class="h3 tools-title">Tools I use</h3>

          <ul class="tools-list has-scrollbar">
            <?php
            // Verifique se há ferramentas no array
            if (count($tools) > 0) {
              foreach ($tools as $tool) {
                echo '<li class="tools-item">
                    <a href="#">
                      <img src="' . $tool['image_path'] . '" alt="' . $tool['alt_text'] . '" />
                    </a>
                  </li>';
              }
            } else {
              echo "<li>Nenhuma ferramenta encontrada</li>";
            }
            ?>
          </ul>
        </section>

        <!-- 
        This makes the nav bar work
        -->
        <div class="overlay" data-overlay></div>

        <button class="modal-close-btn" data-modal-close-btn></button>
      </article>

      <!--
        - #RESUME
      -->
      <article class="resume" data-page="resume">
        <header>
          <h2 class="h2 article-title">Resume</h2>
        </header>

        <section class="timeline">
          <div class="title-wrapper">
            <div class="icon-box">
              <ion-icon name="book-outline"></ion-icon>
            </div>
            <h3 class="h3">Education</h3>
          </div>

          <ol class="timeline-list">
            <?php
            $education = getContent('education');
            foreach ($education as $edu) {
              echo "<li class='timeline-item'>";
              echo "<h4 class='h4 timeline-item-title'>" . $edu["title"] . "</h4>";
              echo "<span>" . $edu["period"] . "</span>";
              echo "<p class='timeline-text'>" . $edu["description"] . "</p>";
              echo "</li>";
            }
            ?>
          </ol>
        </section>

        <section class="timeline">
          <div class="title-wrapper">
            <div class="icon-box">
              <ion-icon name="book-outline"></ion-icon>
            </div>
            <h3 class="h3">Experience</h3>
          </div>

          <ol class="timeline-list">
            <?php
            $experience = getContent('experience');
            foreach ($experience as $exp) {
              echo "<li class='timeline-item'>";
              echo "<h4 class='h4 timeline-item-title'>" . $exp["title"] . "</h4>";
              echo "<span>" . $exp["period"] . "</span>";
              echo "<p class='timeline-text'>" . $exp["description"] . "</p>";
              echo "</li>";
            }
            ?>
          </ol>
        </section>

        <section class="skill">
          <h3 class="h3 skills-title">My skills</h3>

          <ul class="skills-list content-card">
            <?php
            $skills = getContent('skill');
            foreach ($skills as $skill) {
              echo "<li class='skills-item'>";
              echo "<div class='title-wrapper'>";
              echo "<h5 class='h5'>" . $skill['name'] . "</h5>";
              echo "<data value='" . $skill['percentage'] . "'>" . $skill['percentage'] . "%</data>";
              echo "</div>";
              echo "<div class='skill-progress-bg'><div class='skill-progress-fill' style='width: " . $skill['percentage'] . "%'></div></div>";
              echo "</li>";
            }
            ?>
          </ul>
        </section>

        <br />

        <section class="timeline">
          <h3 class="h3">Certificates</h3>

          <ul class="tools-list certificates has-scrollbar">
            <?php
            $certificates = getContent('certificate');
            foreach ($certificates as $certificate) {
              echo "<li class='project-item active' data-filter-item data-category='web development'>";
              echo "<a href='#' onclick='upscale(this); return false;'>"; // Chama a função upscale
              echo "<figure class='project-img'>";
              echo "<div class='project-item-icon-box'>";
              echo "<ion-icon name='eye-outline'></ion-icon>";
              echo "</div>";
              echo "<img src='" . htmlspecialchars($certificate['image']) . "' alt='" . htmlspecialchars($certificate['title']) . "' loading='lazy' />";
              echo "</figure>";
              echo "<h3 class='project-title'>" . htmlspecialchars($certificate['title']) . "</h3>";
              echo "</a>";
              echo "</li>";
            }
            ?>
          </ul>

          <div id="upscale" class="upscale" style="display: none;"> <!-- Iniciar oculto -->
            <span class="close" onclick="closeUpscale()">&times;</span>
            <img class="upscale-content" id="imgupscale" />
            <div id="caption-upscale"></div>
          </div>
        </section>
      </article>
      <!--
        - #PORTFOLIO
      -->
      <article class="portfolio" data-page="portfolio">
        <header>
          <h2 class="h2 article-title">Portfolio</h2>
        </header>

        <section class="projects">
          <ul class="filter-list">
            <li class="filter-item">
              <button class="active" data-filter-btn data-category="all">All</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn data-category="web design">Web design</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn data-category="applications">Applications</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn data-category="web development">Web development</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn data-category="animations">Animations</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn data-category="presentations">Presentations</button>
            </li>
            <li class="filter-item">
              <button data-filter-btn data-category="tcc">TCC</button>
            </li>
          </ul>


          <div class="filter-select-box">
            <button class="filter-select" data-select>
              <div class="select-value" data-selecct-value>
                Select category
              </div>

              <div class="select-icon">
                <ion-icon name="chevron-down"></ion-icon>
              </div>
            </button>

            <ul class="select-list">
              <li class="select-item">
                <button data-select-item>All</button>
              </li>

              <li class="select-item">
                <button data-select-item>Web design</button>
              </li>

              <li class="select-item">
                <button data-select-item>Applications</button>
              </li>

              <li class="select-item">
                <button data-select-item>Web development</button>
              </li>

              <li class="select-item">
                <button data-select-item>Animations</button>
              </li>

              <li class="select-item">
                <button data-select-item>Presentations</button>
              </li>

              <li class="select-item">
                <button data-select-item>TCC</button>
              </li>
            </ul>
          </div>

          <ul class="project-list">
            <?php
            $projects = getContent('portfolio');
            foreach ($projects as $project) {
              // Supondo que você tenha uma coluna 'github_link' no seu banco de dados
              $githubFileLink = htmlspecialchars($project["github_link"]);

              echo "<li class='project-item' data-filter-item data-category='" . htmlspecialchars($project["category"]) . "'>";
              echo "<a href='" . $githubFileLink . "' download>"; // Link dinâmico para o arquivo no GitHub
              echo "<figure class='project-img'>";
              echo "<div class='project-item-icon-box'>";
              echo "<ion-icon name='cloud-download-outline'></ion-icon>";
              echo "</div>";
              echo "<img src='" . htmlspecialchars($project["image"]) . "' alt='" . htmlspecialchars($project["title"]) . "' loading='lazy' />";
              echo "</figure>";
              echo "<h3 class='project-title'>" . htmlspecialchars($project["title"]) . "</h3>";
              echo "<p class='project-category'>" . htmlspecialchars($project["category"]) . "</p>";
              echo "</a>";
              echo "</li>";
            }
            ?>
          </ul>

        </section>
      </article>

      <!--
        - #Blog
      -->

      <article class="blog" data-page="blog">
        <header>
          <h2 class="h2 article-title">Blog</h2>
        </header>
        <section class="blog-posts" id="blog-posts">
          <ul class="blog-posts-list">
            <?php
            if ($result->num_rows > 0) {
              // Exibe cada post
              while ($row = $result->fetch_assoc()) {
                echo '
      <li class="blog-post-item" onclick="showContent(\'content' . $row["id"] . '\')">
        <a href="#">
          <figure class="blog-banner-box">
            <img src="' . htmlspecialchars($row["image_url"]) . '" alt="" loading="lazy" />
          </figure>

          <div class="blog-content">
            <div class="blog-meta">
              <p class="blog-category">' . htmlspecialchars($row["category"]) . '</p>
              <span class="dot"></span>
              <time datetime="' . date("Y-m-d", strtotime($row["date"])) . '">' . date("F j, Y", strtotime($row["date"])) . '</time>
            </div>

            <h3 class="h3 blog-item-title">' . htmlspecialchars($row["title"]) . '</h3>
            <p class="blog-text">' . htmlspecialchars($row["description"]) . '</p>
          </div>
        </a>
      </li>';
              }
            } else {
              echo "Nenhum post encontrado.";
            }
            ?>
          </ul>
        </section>

        <!-- Conteúdo das matérias -->
        <section id="content" class="hidden-position">
          <button id="backButton" onclick="showPosts()">
            <img class="btn-return-pg-inicio" src="./assets/images/Icones/voltar-seta.png" alt="btn voltar" />
          </button>

          <?php
          // Faz outra consulta para o conteúdo completo
          $sqlContent = "SELECT id, title, content, image_url, additional_images FROM blog_posts";
          $resultContent = $conn->query($sqlContent);

          if ($resultContent->num_rows > 0) {
            while ($rowContent = $resultContent->fetch_assoc()) {
              // Exibe o conteúdo principal
              echo '
      <div id="content' . $rowContent["id"] . '" class="content-item">
        <img src="' . htmlspecialchars($rowContent["image_url"]) . '" alt="Imagem do conteúdo ' . $rowContent["id"] . '" class="content-image" />
        <h2>' . htmlspecialchars($rowContent["title"]) . '</h2>
        <p>' . htmlspecialchars($rowContent["content"]) . '</p>
      </div>';

              // Exibe as imagens adicionais se existirem
              if (!empty($rowContent["additional_images"])) {
                $additionalImages = explode(',', $rowContent["additional_images"]); // Assume que as imagens estão separadas por vírgula
                if (count($additionalImages) > 0) {
                  echo '<div class="imagem-container">';
                  foreach ($additionalImages as $image) {
                    echo '<img src="' . htmlspecialchars(trim($image)) . '" alt="Imagem adicional" class="imagem-p-tech" />';
                  }
                  echo '</div>';
                } else {
                  echo '<p>Nenhuma imagem adicional encontrada.</p>';
                }
              } else {
                echo '<p>Nenhuma imagem adicional armazenada.</p>';
              }
              // Fecha a conexão
                $conn->close();
            }
          }
          ?>
        </section>

      </article>
      
      <!--
        - #CONTACT
      -->

      <article class="contact" data-page="contact">
        <header>
          <h2 class="h2 article-title">Contact</h2>
        </header>

        <section class="mapbox" data-mapbox>
          <figure>
            <iframe src="<?php echo isset($_COOKIE['sorocaba_map']) ? $_COOKIE['sorocaba_map'] : ''; ?>" width="400"
              height="300" loading="lazy">
            </iframe>
          </figure>
        </section>

        <section class="contact-form">
          <h3 class="h3 form-title">Contact Form</h3>

          <form action="https://formspree.io/f/manwojop" method="POST" class="form" data-form>
            <div class="input-wrapper">
              <input type="text" name="fullname" class="form-input" placeholder="Full name" required data-form-input
                autocomplete="name" />
              <input type="email" name="email" class="form-input" placeholder="Email address" required data-form-input
                autocomplete="email" />
            </div>

            <textarea name="message" class="form-input" placeholder="Your Message" required data-form-input
              autocomplete="off"></textarea>

            <button class="form-btn" type="submit" disabled data-form-btn>
              <ion-icon name="paper-plane"></ion-icon>
              <span>Send Message</span>
            </button>
          </form>
        </section>
      </article>
    </div>
  </main>

  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
