<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="view/assets/js/f4781c35cc.js" crossorigin="anonymous"></script>
    <!-- Select2 CSS -->
    <link href="node_modules/select2/dist/css/select2.css" rel="stylesheet" />
    <link rel="icon" href="view/assets/image/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/assets/css/style.css" />
    <title id="title"></title>

    <!-- jquery -->
    <script src="view/assets/js/jquery-3.7.1.min.js"></script>
</head>
<!--Nav Start-->
<nav class="nav navbar navbar-expand-xl navbar-light iq-navbar bg-white shadow-sm py-2">
    <div class="container-fluid navbar-inner me-2">
        <a class="navbar-brand d-flex align-items-center" href="./">
            <img src="view/assets/image/logo.png" alt="Logo" class="me-2 logo" style="height: 40px;">
            <span class="fw-bold fs-5 title-page">Sistema de importaciones</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item d-flex align-items-center me-3">
                    <span class="user-info d-flex align-items-center">
                        <i class="fas fa-user-circle me-2 fs-5"></i>
                        <span class="text-truncate fw-semibold">
                            <?php
                            $dataUser = UserController::ctrGetDataUser();
                            echo htmlspecialchars($dataUser["Username"]) . ' - ' . htmlspecialchars($dataUser['Role_Name']);
                            ?>
                        </span>
                    </span>
                </li>
                <li class="nav-item d-flex align-items-center me-3">
                    <select id="company-select" class="form-select form-select-sm">
                        <?php
                        $empresas = CompaniesController::obtenerEmpresas();
                        foreach ($empresas as $empresa) {
                            $selected = ($_SESSION['company_id'] == $empresa['company_id']) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($empresa['company_id']) . '" ' . $selected . '>' . htmlspecialchars($empresa['business_name']) . '</option>';
                        }
                        ?>
                    </select>
                </li>
                <li class="nav-item d-flex align-items-center me-3">
                    <span id="inactivity-timer" class="text-muted small"></span>
                </li>
                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link p-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-cog fs-5"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-center shadow-sm" aria-labelledby="userDropdown">
                        <li class="d-flex justify-content-around py-2">
                            <button id="theme-toggle" class="dropdown-item p-2" aria-label="Toggle theme">
                                <i class="fas fa-sun fs-5"></i>
                            </button>
                            <a class="dropdown-item p-2" href="#" id="language" aria-label="Change language">
                                <i class="fas fa-language fs-5"></i>
                            </a>
                        </li>
                        <?php if ($_SESSION["role"] == 1): ?>
                            <li>
                                <a class="dropdown-item p-2 users" href="users" aria-label="Usuarios"></a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <button class="dropdown-item text-danger p-2 logout" onclick="closeSession()" id="logout-button" aria-label="Cerrar sesión">
                                Cerrar sesión
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .navbar-nav {
        flex-direction: row;
    }

    .navbar-collapse {
        display: flex;
    }

    @media (max-width: 768px) {
        .navbar-brand {
            flex-direction: column;
            align-items: flex-start;
        }

        .user-info {
            flex-direction: column;
            align-items: flex-start;
        }

        #company-select {
            width: 100%;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .dropdown-menu {
            width: 100%;
        }
    }
</style>

<body>
    <?php

    require "whitelist.php";

    ?>
    <script src="node_modules/select2/dist/js/select2.js"></script>
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

        document.addEventListener("DOMContentLoaded", () => {
            const c = document.querySelector('.container, .container-fluid');

            if (!c) {
                console.error('No se encontró el contenedor.');
                return;
            }

            function setRandomVars(prefix) {
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

        function closeSession() {
            $.ajax({
                url: 'controller/logout.php',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = './';
                    } else {
                        alert('Error al cerrar sesión. Inténtalo de nuevo.');
                    }
                },
                error: function() {
                    alert('Error en la solicitud. Inténtalo de nuevo.');
                }
            });
        }

        let inactivityTimeout;

        function resetInactivityTimer() {
            clearTimeout(inactivityTimeout);
            inactivityTimeout = setTimeout(() => {
                closeSession();
            }, 60 * 60 * 1000); // 5 minutes
        }

        document.addEventListener('mousemove', resetInactivityTimer);
        document.addEventListener('keydown', resetInactivityTimer);
        document.addEventListener('scroll', resetInactivityTimer);
        document.addEventListener('click', resetInactivityTimer);

        resetInactivityTimer(); // Initialize the timer

        function updateInactivityTimer() {
            const timerElement = document.getElementById('inactivity-timer');
            let remainingTime = 60 * 60; // 60 minutes
            let interval;

            function startTimer() {
                clearInterval(interval);
                interval = setInterval(() => {
                    if (remainingTime > 0) {
                        remainingTime--;
                        const minutes = Math.floor(remainingTime / 60);
                        const seconds = remainingTime % 60;
                        timerElement.textContent = `${getTranslation('header.inactivity')}: ${minutes}:${seconds.toString().padStart(2, '0')}`;
                    } else {
                        timerElement.textContent = 'Sesión cerrada por inactividad';
                        clearInterval(interval);
                    }
                }, 1000);
            }

            function resetTimer() {
                remainingTime = 60 * 60; // Reset to 5 minutes
                startTimer();
            }

            document.addEventListener('mousemove', resetTimer);
            document.addEventListener('keydown', resetTimer);
            document.addEventListener('scroll', resetTimer);
            document.addEventListener('click', resetTimer);

            startTimer();
        }

        updateInactivityTimer();

        $('#company-select').on('change', function() {
            const selectedCompanyId = $(this).val();
            $.ajax({
                url: 'controller/actions.controller.php',
                type: 'POST',
                data: {
                    action: 'changeCompany',
                    company_id: selectedCompanyId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        location.reload(); // Reload the page to apply changes
                    } else {
                        alert('Error al cambiar la empresa. Inténtalo de nuevo.');
                    }
                },
                error: function() {
                    alert('Error en la solicitud. Inténtalo de nuevo.');
                }
            });
        });
    </script>

</body>

</html>