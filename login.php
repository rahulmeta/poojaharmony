<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === 'Biswaa5847' && $password === 'Bis@7894') {
    $_SESSION['admin'] = true;
    header("Location: admin.php");
    exit();
  } else {
    $error = "Invalid login credentials!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login - PoojaHarmony</title>
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  
  <!-- AOS for animations -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

  <style>
    body {
      background: linear-gradient(to right, #f7c59f, #f9f9f9);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      background: #fff;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 420px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 32px rgba(0,0,0,0.2);
    }

    .login-icon {
      font-size: 2.8rem;
      color: #ffc107;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(255,193,7,0.3);
    }

    @media (max-width: 480px) {
      .login-card {
        padding: 1.5rem;
      }

      .login-icon {
        font-size: 2.2rem;
      }

      h4 {
        font-size: 1.3rem;
      }
    }
  </style>
</head>
<body>

  <div class="login-card" data-aos="zoom-in">
    <div class="text-center mb-4" data-aos="fade-down">
      <i class="fas fa-user-shield login-icon"></i>
      <h4 class="mt-2 fw-bold">Admin Login</h4>
    </div>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger" data-aos="fade-right"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" novalidate data-aos="fade-up" data-aos-delay="200">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter username" required />
      </div>
      <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required />
      </div>
      <button type="submit" class="btn btn-warning w-100 fw-semibold">Login</button>
    </form>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>
</body>
</html>
