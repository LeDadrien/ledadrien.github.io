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
   <h2>Aéroclub Dassault Falcon Service</h2>
   <!-- Bouton burger pour mobile -->
<button class="burger" onclick="toggleMenu()">☰</button>
    <div id="datetime" class="datetime"></div>
  </header>
 
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

    <div class="content" id="content">
      <main>
        
        <img id="webcam" alt ="webcam" src="https://cam-aero.eu/raspicamaero/LFPP_AeroclubAirFranceNord">

        <br>

        <p>
          
          Image webcam du Plessis-Belleville (LFPP)
          <br>
          Source : cam-aero.eu
        </p>
        <br>
      


      </main>


      <footer>
        <p>© 2025 Aéroclub Dassault Falcon Service | FR.DTO.0609 – Tous droits réservés</p>
      </footer>
    </div>
  </div>

  
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

<script>
function refreshImage() {
    const img = document.getElementById("webcam");
    const baseUrl = "https://cam-aero.eu/raspicamaero/LFPP_AeroclubAirFranceNord";
    const timestamp = new Date().getTime(); // Pour forcer le rechargement
    img.src = baseUrl + "?t=" + timestamp;
}

function scheduleNextReload() {
    const now = new Date();
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();

    // On cherche le prochain multiple de 5 minutes +1 (donc 1, 6, 11, etc.)
    let next = Math.ceil((minutes - 1 + (seconds > 0 ? 1 : 0)) / 5) * 5 + 1;

    // S'assurer qu'on ne dépasse pas 59
    if (next >= 60) {
        next = next - 60;
        now.setHours(now.getHours() + 1);
    }

    const nextReload = new Date(
        now.getFullYear(),
        now.getMonth(),
        now.getDate(),
        now.getHours(),
        next,
        0,
        0
    );

    const delay = nextReload - now;

    setTimeout(() => {
        refreshImage();
        scheduleNextReload(); // Replanifie le suivant
    }, delay);
}

// Démarrage initial
refreshImage();
scheduleNextReload();
</script>

<script>
function toggleMenu() {
  const menu = document.getElementById("mobileMenu");
  menu.classList.toggle("open");
}
</script>

</body>
</html>
