<?php
  include "config.php";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  if(mysqli_connect_errno()) {
      die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
      );
  }
  $query  = "SELECT * FROM portfolio_IdanShavit";
  $result = mysqli_query($connection, $query);
  if(!$result) {
      die("DB query failed.");
  }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/png" href="./images/favicon.png" />
  <title>Idan Shavit</title>
  <meta name="description" content="Add small description of yourslef.">
  <meta name="keywords" content="Idan Shavit, HTML, CSS, JS, PHP, C/C++, C#" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header class="header" role="banner" id="top">
    <div class="row">
      <nav class="nav" role="navigation">
        <ul class="nav__items">
          <li class="nav__item"><a href="#work" class="nav__link">Work</a></li>
          <li class="nav__item">
            <a href="#about" class="nav__link">About</a>
          </li>
          <li class="nav__item">
            <a href="#contact" class="nav__link">Contact</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="header__text-box row">
      <div class="header__text">
        <h1 class="heading-primary">
          <span>Idan Shavit</span>
        </h1>
        <p>A software engineer student in Shenkar.</p>
        <a href="#contact" class="btn btn--pink">Get in touch</a>
      </div>
    </div>
  </header>

  <main role="main">

    <!-- ***** Work ***** -->

    <section class="work" id="work">
      <div class="row">
        <h2>My Work</h2>
        <div class="work__boxes">
          <?php
            while($row = mysqli_fetch_assoc($result)) {
              echo "<div class='work__box'>";
              echo  "<div class='work__text'>";
              echo      "<h3 class='title'>" . $row["name"] . "</h3>";
              echo      "<div class='more_details'>";
              echo        "<p>" . $row["description"] . "</p>";
              echo        "<div class='work__links'>";
              echo        "<a href='" . $row["project_url"] . "' target='_blank' class='link__text'>";
              echo        "Visit Site <span>&rarr;</span>";
              echo        "</a>";
              echo        "<a href='" . $row["github_url"] . "' title='View Source Code' target='_blank'>";
              echo        "<img src='./images/github.svg' class='work__code' alt='GitHub'>";
              echo        "</a>";
              echo      "</div>";
              echo    "</div>";
              echo  "</div>";
              echo  "<div class='work__image-box'>";
              echo    "<img src='." . $row["image"] . "' class='work__image' alt='Project_image' />";
              echo  "</div>";
              echo "</div>";
            }
          ?>
        </div>
      </div>
    </section>

    <!-- ***** About ***** -->

    <section class="about" id="about">
      <div class="row">
        <h2>About Me</h2>
        <div class="about__content">
          <div class="about__text">
            <p>
              Welcome to my portfolio! I'm Idan Shavit, a software engineering student at Shenkar College in Ramat Gan. 
              With a deep passion for coding, I find endless inspiration in the art of software development. 
              Driven by a relentless desire to explore new technologies and embrace innovative solutions, 
              I am committed to pushing the boundaries of what can be achieved through code. 
              Through my projects and experiences, I strive to make a meaningful impact by solving real-world problems. 
              Join me on this exciting journey as we shape the future through the power of programming.
            </p>
            <a href="#" class="btn">My Resume</a>
          </div>

          <div class="about__photo-container">
            <img class="about__photo" src="./images/Idan-Shavit.png" alt="" />
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- ***** Contact ***** -->

  <section class="contact" id="contact">
    <div class="row">
      <h2>Get in Touch</h2>
      <div class="contact__info">
        <p>
          I'm always excited to connect with fellow professionals, collaborate on interesting projects, 
          or discuss potential opportunities. If you have any questions, suggestions, or simply want to say hello, 
          feel free to reach out to me using the contact information provided below. 
          I'm open to networking and exploring new possibilities, so don't hesitate to get in touch. 
          Let's connect and make something great together!
        </p>
        <a href="mailto:you@example.com" class="btn">idanshavit5@gamail.com</a>
      </div>
    </div>
  </section>

  <!-- ***** Footer ***** -->

  <footer role="contentinfo" class="footer">
    <div class="row">
      <ul class="footer__social-links">
        <li class="footer__social-link-item">
          <a href="https://github.com/ShavitIdan/" title="Link to Github Profile">
            <img src="./images/github.svg" class="footer__social-image" alt="Github">
          </a>
        </li>
        <li class="footer__social-link-item">
          <a href=https://www.linkedin.com/in/idan-shavit-601861240/">
            <img src="./images/linkedin.svg" title="Link to Linkedin Profile" class="footer__social-image" alt="Linkedin">
          </a>
        </li>
      </ul>
      <p>
        &copy; Idan Shavit 2023
      </p>
      <a href="https://www.shenkar.ac.il/he/departments/engineering-software-department">תואר ראשון בהנדסת תוכנה בשנקר</a>
    </div>
  </footer>
  <a href="#top" class="back-to-top" title="Back to Top">
    <img src="./images/arrow-up.svg" alt="Back to Top" class="back-to-top__image"/>
  </a>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
<?php
    mysqli_free_result($result);
    mysqli_close($connection);
?>