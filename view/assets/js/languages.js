var translations = {}; // Inicialización global
const idiomaGuardado = localStorage.getItem('idioma');

// Función principal para inicializar
(async function iniciarIdioma() {
    let idioma = idiomaGuardado;

    if (!idioma) {
        idioma = navigator.language.startsWith('es') ? 'es' : 'en';
    }

    await cargarTraducciones(idioma);
    aplicarTraducciones(); // Aplicamos las traducciones después de cargarlas
})();

// Función para cargar las traducciones
async function cargarTraducciones(idioma) {
    if (!idioma) idioma = 'en'; // Default si viene vacío

    var ruta = 'view/assets/languages/' + idioma + '.json';

    if (idioma === 'en') {
        $('#language').html(`
            <button class="nav-link" onclick="changeLanguage('es')">
                <img src="view/assets/image/flag001.png" class="img-fluid rounded-circle languaje-selected" alt="user" style="height: 30px; min-width: 30px; width: 30px;">
            </button>
        `);
    } else {
        $('#language').html(`
            <button class="nav-link" onclick="changeLanguage('en')">
                <img src="view/assets/image/flag002.png" class="img-fluid rounded-circle languaje-selected" alt="user" style="height: 30px; min-width: 30px; width: 30px;">
            </button>
        `);
    }

    try {
        const response = await fetch(ruta);
        if (!response.ok) throw new Error('No se pudo cargar el archivo de idioma.');

        translations = await response.json();
    } catch (error) {
        console.error('Error cargando las traducciones:', error);
    }
}

// Función para aplicar las traducciones
function aplicarTraducciones() {
    if (!translations || !translations.login) return;

    $('#title').text(translations.login.title);
    $('.title').text(translations.login.title);
    $('#email').attr('placeholder', translations.login.email);
    $('#password').attr('placeholder', translations.login.password);
    $('#companyOptionNull').text(translations.login.companyOptionNull);
    $('.select2-selection__rendered').text(translations.login.companyOptionNull);
    $('input[type="submit"].btn.solid').val(translations.login.title);
}

// Función para cambiar el idioma dinámicamente
function changeLanguage(language) {
    localStorage.setItem('idioma', language);
    cargarTraducciones(language).then(() => {
        aplicarTraducciones();
    });
}

function getTranslation(path) {
    const keys = path.split('.');
    let result = translations;

    for (let key of keys) {
        if (result && result.hasOwnProperty(key)) {
            result = result[key];
        } else {
            return path; // Si no existe, devuelves el path como fallback
        }
    }
    return result;
}
