<?php
$data = json_decode(file_get_contents('data/content.json'), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PoojaHarmony</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Mukta&display=swap" rel="stylesheet" />
  
  <!-- AOS Animation CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/main.min.css" rel="stylesheet">


  
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      font-family: 'Mukta', sans-serif;
      background: #f9f9f9;
    }
    #calendar {
      max-width: 900px;
      margin: 40px auto;
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .fc-daygrid-day-top {
      text-align: center;
      font-size: 14px;
    }
    .greg {
      display: block;
      font-weight: bold;
    }
    .bangla {
      color: #d63384;
      font-size: 12px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#"><i class="fas fa-spa"></i> PoojaHarmony</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
         <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero" data-aos="fade-down">
    <div class="container">
      <h1 class="display-4 fw-bold"><?= $data['hero']['title'] ?></h1>
<p class="lead"><?= $data['hero']['subtitle'] ?></p>
      <!-- <h1 class="display-4 fw-bold">Celebrate Spirituality & Culture</h1>
      <p class="lead">Offering traditional pooja services with a modern touch.</p> -->
      <a href="#contact" class="btn btn-outline-dark btn-lg mt-4">
        <i class="fas fa-paper-plane me-2"></i>Contact Us Today
      </a>
    </div>
  </section>

  <!-- Image Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide my-5 container" data-bs-ride="carousel" data-bs-interval="4000" data-aos="fade-up">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 5"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 6"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 7"></button>
    </div>
    <div class="carousel-inner rounded shadow-sm" >
      <?php foreach ($data['carousel'] as $index => $img): ?>
  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
    <img src="<?= $img ?>" class="d-block w-100" alt="Slide <?= $index + 1 ?>">
  </div>
<?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>







  <!-- Services Section -->
  <section id="services" data-aos="fade-up">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Services</h2>
        <p class="text-muted">Traditional & Customized Pooja Offerings</p>
      </div>
      <div class="row text-center">
       <?php
$icons = ['fa-pray', 'fa-spa', 'fa-box-open'];
foreach ($data['services'] as $i => $service):
?>
  <div class="col-md-4 text-center">
    <div class="service-icon mb-2"><i class="fas <?= $icons[$i % count($icons)] ?>"></i></div>
    <h4><?= $service['title'] ?></h4>
    <p><?= $service['desc'] ?></p>
  </div>
<?php endforeach; ?>

        <!-- <div class="col-md-4">
                    <div class="service-icon" title="Pooja Arrangement"><i class="fas fa-pray"></i></div>
          <h4 class="fw-semibold">Pooja Arrangement</h4>
          <p>Complete setup with traditional items for auspicious ceremonies</p>
        </div>
        <div class="col-md-4">
         <div class="service-icon" title="Spiritual Guidance"><i class="fas fa-spa"></i></div>
          <h4 class="fw-semibold">Spiritual Guidance</h4>
          <p>Consultation and rituals by experienced pandits and guides.</p>
        </div>
        <div class="col-md-4">
         <div class="service-icon" title="Custom Pooja Kits"><i class="fas fa-box-open"></i></div>
          <h4 class="fw-semibold">Custom Pooja Kits</h4>
          <p>Personalized kits with essential pooja items delivered to your doorstep.</p>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Footer with Contact Form -->
  <footer id="contact" class="footer text-center">
    <div class="container">
      <h3 class="fw-bold mb-4">Get in Touch</h3>
      <form action="contact.php" method="POST" class="mx-auto" style="max-width: 500px;">
        <input type="text" name="name" class="form-control" placeholder="Your Name" required />
        <input type="email" name="email" class="form-control" placeholder="Email Address" required />
        <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
        <button type="submit" class="btn btn-warning w-100">Send Message</button>
      </form>
      <p class="mt-4">&copy; 2025 PoojaHarmony. All rights reserved.</p>
    </div>
  </footer>

  <!-- Floating Social Icons -->
  <div id="social-float">
    <a href="https://wa.me/9432328218" target="_blank" class="social-icon whatsapp" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
    <a href="mailto:biswaathchatterjee@gmail.com" class="social-icon" title="Email"><i class="fas fa-envelope"></i></a>
    <!-- <a href="https://facebook.com/poojaharmony" target="_blank" class="social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="https://instagram.com/poojaharmony" target="_blank" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a> -->
  </div>

  <!-- Background Music -->
  <audio id="bg-music" src="https://cdn.pixabay.com/download/audio/2022/03/26/audio_25a68f94d3.mp3?filename=bells-10832.mp3" autoplay loop></audio>
  <button id="music-toggle" aria-label="Toggle background music">🔔 Music On</button>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- AOS JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/main.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/daygrid/main.min.js"></script>

  <!-- Bangla Calendar Library -->
  <script src="https://cdn.jsdelivr.net/npm/bangla-calendar@7.0.0/dist/index.umd.js"></script>

 <script>
  AOS.init({
    duration: 1000,
    once: true,
  });

  const music = document.getElementById('bg-music');
  const btn = document.getElementById('music-toggle');

  btn.addEventListener('click', () => {
    if (music.paused) {
      music.play();
      btn.textContent = '🔔 Music On';
    } else {
      music.pause();
      btn.textContent = '🔕 Music Off';
    }
  });

 
  
</script>




</body>
</html>
