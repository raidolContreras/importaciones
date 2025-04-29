<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="view/assets/js/f4781c35cc.js" crossorigin="anonymous"></script>
    <!-- Select2 CSS -->
    <link href="node_modules/select2/dist/css/select2.css" rel="stylesheet" />
    <link rel="stylesheet" href="view/assets/css/style.css" />
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
                    <span id="inactivity-timer"></span>
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <button id="theme-toggle" class="theme-toggle-btn" aria-label="Toggle theme">
                        <i class="fas fa-sun img-fluid rounded-circle"></i>
                    </button>
                </li>
                <li class="nav-item" id="language">
                </li>
                <li class="nav-item d-flex align-items-center me-2">
                    <button class="btn btn-danger" onclick="closeSession()" id="logout-button" aria-label="Cerrar sesión">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <?php

    require "whitelist.php";

    ?>

    <script src="view/assets/js/jquery-3.7.1.min.js"></script>
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
        $(function() {
            $('#company-select').select2();
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
            }, 5 * 60 * 1000); // 5 minutes
        }

        document.addEventListener('mousemove', resetInactivityTimer);
        document.addEventListener('keydown', resetInactivityTimer);
        document.addEventListener('scroll', resetInactivityTimer);
        document.addEventListener('click', resetInactivityTimer);

        resetInactivityTimer(); // Initialize the timer

        function updateInactivityTimer() {
            const timerElement = document.getElementById('inactivity-timer');
            let remainingTime = 5 * 60; // 5 minutes in seconds
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
                remainingTime = 5 * 60; // Reset to 5 minutes
                startTimer();
            }

            document.addEventListener('mousemove', resetTimer);
            document.addEventListener('keydown', resetTimer);
            document.addEventListener('scroll', resetTimer);
            document.addEventListener('click', resetTimer);

            startTimer();
        }

        updateInactivityTimer();
    </script>

</body>

</html>