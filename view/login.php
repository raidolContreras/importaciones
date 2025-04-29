<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="view/assets/js/f4781c35cc.js" crossorigin="anonymous"></script>
  <!-- Select2 CSS -->
  <link href="node_modules/select2/dist/css/select2.css" rel="stylesheet" />
  <link rel="stylesheet" href="view/assets/css/login.css" />
  <link rel="icon" href="view/assets/image/favicon.ico" type="image/x-icon" />
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title id="title"></title>
</head>
<!--Nav Start-->
<nav class="nav navbar navbar-expand-xl navbar-light iq-navbar">
  <div class="container-fluid navbar-inner">
    <div class="collapse navbar-collapse col-md-2" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item d-flex align-items-center me-2">
          <button id="theme-toggle" class="theme-toggle-btn" aria-label="Toggle theme">
            <i class="fas fa-sun img-fluid rounded-circle"></i>
          </button>
        </li>
        <li class="nav-item" id="language">
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form">
          <h2 class="title"></h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" id="user-name" placeholder="Nombre de usuario" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" placeholder="Contraseña" />
          </div>
          <div class="input-field">
            <i class="fas fa-building"></i>
            <select id="company-select">
              <option value="" disabled selected>Seleccionar empresa</option>
              <?php
                require_once "controller/companies.controller.php";
                $empresas = CompaniesController::obtenerEmpresas();
                foreach ($empresas as $empresa) {
                    echo '<option value="' . htmlspecialchars($empresa['company_id']) . '">' . htmlspecialchars($empresa['business_name']) . '</option>';
                }
              ?>
            </select>
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>
      </div>
    </div>
    <script src="view/assets/js/jquery-3.7.1.min.js"></script>
    <script src="node_modules/select2/dist/js/select2.js"></script>
    <script src="view/assets/js/login.js"></script>
    <script src="view/assets/js/languages.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Theme toggle
      $(function() {
        const btn = document.getElementById('theme-toggle');
        const body = document.body;
        const stored = localStorage.getItem('theme');

        // Aplicar preferencia guardada o la del sistema
        if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          body.classList.add('dark-mode');
          btn.innerHTML = '<i class="fas fa-moon"></i>';
        }

        btn.addEventListener('click', () => {
          const isDark = body.classList.toggle('dark-mode');
          btn.innerHTML = isDark ? '<i class="fas fa-moon"></i>' : '<i class="fas fa-sun"></i>';
          localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
      });
      $(function() {
        $('#company-select').select2();
      });

      document.addEventListener("DOMContentLoaded", () => {
        const c = document.querySelector('.container');

        function setRandomVars(prefix) {
          // Genera start (0–80 vw/vh) y desplazamiento (-50 a +50 vw/vh)
          const sx = Math.random() * 80;
          const sy = Math.random() * 80;
          const dx = (Math.random() - 0.5) * 100;
          const dy = (Math.random() - 0.5) * 100;
          c.style.setProperty(`--${prefix}-start-x`, sx + 'vw');
          c.style.setProperty(`--${prefix}-start-y`, sy + 'vh');
          c.style.setProperty(`--${prefix}-delta-x`, dx + 'vw');
          c.style.setProperty(`--${prefix}-delta-y`, dy + 'vh');
        }

        setRandomVars('before');
        setRandomVars('after');
      });
    </script>

</body>

</html>