
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aéroclub DFS</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="images/logo-dfs-onglet.png" type="image/png">
</head>
<body>

  <header role="banner">
    <a href="accueil.php">
    <img src="images/logo_dfs_banner.png" alt="Logo ACDFS">
    </a>



<!-- Menu mobile qui glisse -->
<nav class="mobile-slide-menu" id="mobileMenu">
  <ul>
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="espace_membre.php">Espace Membre</a></li>
    <li><a href="album_photo.html">Album Photo</a></li>
    <li><a href="webcam.php">Webcam LFPP</a></li>
    <li><a href="https://openflyers.com/acdfs/index.php">OpenFlyers</a></li>
  </ul>
</nav>
   <h2 style="font-style: italic">Aéroclub Dassault Falcon Service</h2>
   <!-- Bouton burger pour mobile -->
<button class="burger" onclick="toggleMenu()">☰</button>
    <div id="datetime" class="datetime"></div>
  </header>

 
</nav>
  <div class="main-wrapper">
    <aside class="sidebar">
      <nav>
        <ul>
          <li><a href="accueil.php">Accueil</a></li>
          <li><a href="espace_membre.php">Espace Membre</a></li>
          <li><a href="album_photo.html">Album Photo</a></li>
          <li><a href="webcam.php">Webcam LFPP</a></li>
        </ul>
      </nav>
        <div id="datetime" class="datetime"></div>
    <div class="sidebar-footer">
    <a href="https://openflyers.com/acdfs/index.php" target="_blank" rel="noopener noreferrer">
      <img src="images/logo-open-flyers.png" alt="Open-Flyers" class="footer-logo">
      </a>

    </div>
    
    </aside>

    <div class="content">
      <main>
        <p>
          Bienvenue sur le site de l'Aéroclub Dassault Falcon Servcice (FR.DTO.0609) <br> <br>
          Vous y trouverez diverses informations et photos de l'Aéroclub et de ses activités.<br> <br>
          <img src="photos/banner/cessna-ailes-anciennes-banner.jpg" alt="C172 de nuit">
          
          <p style="font-size :12px ; font-style : italic ; text-align :center" > F-HKLK de nuit </p><br>
          Les documents opérationnels à l'intention des membres du club sont disponibles dans l'<a href="espace_membre.php" style="color: black; font-weight:bold">Espace Membre</a>.
 <br>


  <div class="carousel">
    <div class="slides" id="slideContainer">
      <div class="slide"><img src="photos/vertical/vertical-1.jpg" alt="1"></div>
      <div class="slide"><img src="photos/vertical/vertical-2.jpg" alt="2"></div>
      <div class="slide"><img src="photos/vertical/vertical-1.jpg" alt="3"></div>
      <div class="slide"><img src="photos/vertical/vertical-2.jpg" alt="4"></div>
      <div class="slide"><img src="photos/vertical/vertical-1.jpg" alt="5"></div>
    </div>
    <div class="buttons">
      <button onclick="prevSlide()">❮</button>
      <button onclick="nextSlide()">❯</button>
    </div>
  </div>

  <div class="dots" id="dotContainer"></div>

        </p>
       
        <br>






      </main>


      <footer>
        <p>© 2025 Aéroclub Dassault Falcon Service | FR.DTO.0609 – Tous droits réservés</p>
      </footer>
    </div>
  </div>



   <!-- Scirpt pour récupérer DATE ET HEURE -->

<script>
function capitalizeFirstLetter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

function updateDateTime() {
  const now = new Date();

  // Obtenir le jour de la semaine
  const jour = capitalizeFirstLetter(
    now.toLocaleDateString('fr-FR', { weekday: 'long' })
  );

  const date = now.toLocaleDateString('fr-FR', {
    day: 'numeric',
    month: 'long',
    year: 'numeric'
  });

  const heure = now.toLocaleTimeString('fr-FR', {
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit'
  });

  document.getElementById('datetime').textContent = `${jour} ${date} – ${heure}`;
}

updateDateTime();
setInterval(updateDateTime, 1000);
</script>




   <!-- Scirpt pour le menu déroulant -->
<script>
function toggleMenu() {
  const menu = document.getElementById("mobileMenu");
  menu.classList.toggle("open");
}
</script>


<script>
    const slides = document.querySelectorAll('.slide');
    const slideContainer = document.getElementById('slideContainer');
    const dotContainer = document.getElementById('dotContainer');
    let currentIndex = 0;

    // Créer les points (dots)
    slides.forEach((_, i) => {
      const dot = document.createElement('span');
      dot.classList.add('dot');
      dot.addEventListener('click', () => goToSlide(i));
      dotContainer.appendChild(dot);
    });

    function updateCarousel() {
      slideContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
      document.querySelectorAll('.dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === currentIndex);
      });
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      updateCarousel();
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      updateCarousel();
    }

    function goToSlide(index) {
      currentIndex = index;
      updateCarousel();
    }

    updateCarousel(); // Initialisation
  </script>

</body>
</html>



