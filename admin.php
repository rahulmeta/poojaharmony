<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}

$dataFile = 'data/content.json';
$data = json_decode(file_get_contents($dataFile), true);

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Hero Text
  $data['hero']['title'] = $_POST['hero_title'];
  $data['hero']['subtitle'] = $_POST['hero_subtitle'];

  // Carousel Uploads
  if (!isset($data['carousel']) || !is_array($data['carousel'])) {
      $data['carousel'] = [];
  }

  if (!empty($_FILES['carousel_images']['name'][0])) {
      foreach ($_FILES['carousel_images']['name'] as $index => $name) {
          $tmpName = $_FILES['carousel_images']['tmp_name'][$index];
          $error = $_FILES['carousel_images']['error'][$index];
          $fileName = time() . "_$index" . '_' . basename($name);
          $targetPath = 'uploads/' . $fileName;

          if ($error === UPLOAD_ERR_OK && move_uploaded_file($tmpName, $targetPath)) {
              $data['carousel'][] = $targetPath;
          }
      }
  }

  // Services
  $data['services'] = [];
  for ($i = 0; $i < count($_POST['service_title']); $i++) {
    $data['services'][] = [
      'title' => $_POST['service_title'][$i],
      'desc' => $_POST['service_desc'][$i]
    ];
  }

  file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Panel - PoojaHarmony</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  
  <!-- AOS Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

<style>
  body {
    background: linear-gradient(to right, #f7c59f, #f9f9f9);
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px 20px;
    min-height: 100vh;
  }

  .admin-card {
    background: #fff;
    padding: 2.5rem;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    width: 100%;
    max-width: 900px;
    transition: all 0.3s ease;
  }

  .admin-header {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    gap: 10px;
  }

  .admin-header h3 {
    font-weight: bold;
    font-size: 1.5rem;
  }

  .form-control:focus {
    box-shadow: 0 0 0 0.2rem rgba(255,193,7,0.3);
  }

  .card.service-card {
    background: #f8f9fa;
    border: 1px solid #eee;
    transition: box-shadow 0.3s ease;
  }

  .card.service-card:hover {
    box-shadow: 0 5px 12px rgba(0,0,0,0.08);
  }

  @media (max-width: 768px) {
    .admin-card {
      padding: 2rem 1.5rem;
    }

    .admin-header h3 {
      font-size: 1.3rem;
    }

    .btn {
      font-size: 0.9rem;
    }
  }

  @media (max-width: 480px) {
    .admin-header {
      flex-direction: column;
      align-items: flex-start;
    }

    .admin-header a.btn {
      align-self: flex-end;
    }
  }
</style>

</head>
<body>

  <div class="admin-card" data-aos="fade-up">
    <div class="admin-header">
      <h3><i class="fas fa-cogs me-2"></i>Admin Panel</h3>
      <a href="logout.php" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
    </div>

    <form method="POST" enctype="multipart/form-data">
      <h5 class="mb-3"><i class="fas fa-heading me-2"></i>Hero Section</h5>
      <input type="text" name="hero_title" class="form-control mb-2" value="<?= htmlspecialchars($data['hero']['title']) ?>" required>
      <input type="text" name="hero_subtitle" class="form-control mb-4" value="<?= htmlspecialchars($data['hero']['subtitle']) ?>" required>

      <h5 class="mb-3"><i class="fas fa-images me-2"></i>Upload Carousel Images</h5>
      <input type="file" name="carousel_images[]" class="form-control mb-4" multiple required>

      <h5 class="mb-3"><i class="fas fa-concierge-bell me-2"></i>Services</h5>
      <?php foreach ($data['services'] as $i => $service): ?>
        <div class="card service-card mb-3 p-3">
          <input type="text" name="service_title[]" class="form-control mb-2" value="<?= htmlspecialchars($service['title']) ?>" required>
          <textarea name="service_desc[]" class="form-control" rows="2" required><?= htmlspecialchars($service['desc']) ?></textarea>
        </div>
      <?php endforeach; ?>

      <button type="submit" class="btn btn-warning w-100 fw-semibold mt-3">
        <i class="fas fa-save me-1"></i>Save & Go Home
      </button>
    </form>
  </div>

  <!-- JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({ duration: 1000, once: true });
  </script>
</body>
</html>
