<!DOCTYPE html>
<html lang="en">
<head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Bootstrap Site</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .navbar-brand {
      font-weight: 700;
      letter-spacing: 1px;
    }
    .hero-section {
      background: linear-gradient(135deg, #6e8efb, #a777e3);
      color: white;
      padding: 5rem 0;
      margin-bottom: 3rem;
    }
    .btn-gradient {
      background: linear-gradient(to right, #6e8efb, #a777e3);
      border: none;
      color: white;
      transition: all 0.3s;
    }
    .btn-gradient:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      color: white;
    }
    .footer {
      background-color: #212529;
      color: white;
      padding: 3rem 0;
      margin-top: 3rem;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
          <i class="fas fa-rocket me-2"></i>
          MySite
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">
                <i class="fas fa-home me-1"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/article">
                <i class="fas fa-newspaper me-1"></i> Articles
              </a>
            </li>
            @can('create')
            <li class="nav-item">
              <a class="nav-link" href="/article/create">
                <i class="fas fa-plus-circle me-1"></i> Create Article
              </a>
            </li>
            @endcan
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-cog me-1"></i> Settings
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i>Help</a></li>
              </ul>
            </li>
          </ul>
          <div class="d-flex">
            @guest
            <a class="btn btn-outline-light me-2" href="/auth/login">
              <i class="fas fa-sign-in-alt me-1"></i> Sign In
            </a>
            <a class="btn btn-gradient" href="/auth/signup">
              <i class="fas fa-user-plus me-1"></i> Sign Up
            </a>
            @endguest
            @auth
            <a class="btn btn-outline-danger" href="/auth/logout">
              <i class="fas fa-sign-out-alt me-1"></i> Log Out
            </a>
            @endauth
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="flex-grow-1">
    <div id="app"></div>
    
    <!-- Optional Hero Section -->
    @hasSection('hero')
      <section class="hero-section text-center">
        <div class="container">
          @yield('hero')
        </div>
      </section>
    @endif
    
    <div class="container my-5">
      @yield('content')
    </div>
  </main>


  <!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>