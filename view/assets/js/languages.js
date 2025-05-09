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

    pagina = $('#pagina').val();
    if (pagina === 'login') {
        // Aplicar traducciones al login
        $('#title').attr('placeholder', translations.login.title);
        $('.title').text(translations.login.title);

        $('#user-name').attr('placeholder', translations.login.username);
        $('#password').attr('placeholder', translations.login.password);
        $('#companyOptionNull').text(translations.login.companyOptionNull);
        $('.select2-selection__rendered').text(translations.login.companyOptionNull);
        $('input[type="submit"].btn.solid').val(translations.login.title);

    } else if (pagina === 'dashboard') {
        // Aplicar traducciones al dashboard
        $('#title').text(translations.dashboard.title);
        $('.tasks').text(translations.dashboard.tasks);
        $('.pending').text(translations.dashboard.pending);
        $('.reminders').text(translations.dashboard.reminders);
        $('.logout').html('<i class="fas fa-sign-out-alt fs-5 me-2"></i> ' + translations.dashboard.logout);
        $('.filterState').text(translations.dashboard.filterState + ":");
        $('.addNew').text(translations.dashboard.addNew);
        $('.search').text(translations.dashboard.search + ":");
        $('.searchInput').attr('placeholder', translations.dashboard.search + '...');

        // Aplicar traducciones al modal de catálogo
        $('#catalogModalLabel .Catalog').text(translations.catalog.modalTitle);
        $('#catalogModalLabel .text-muted-dashboard').text('ID00001'); // Ejemplo de ID estático
        $('.folioSystem').text(translations.catalog.folioSystem);
        $('.folioId').text('0001'); // Ejemplo de folio estático
        $('.dataCapture').text(translations.catalog.dataCapture);
        $('.brokerNumber').text(translations.catalog.brokerNumber);
        $('#numeroBroker').attr('placeholder', translations.catalog.manualCatalogData);
        $('.supplierNumber').text(translations.catalog.supplierNumber);
        $('#numeroProveedor').attr('placeholder', translations.catalog.importedCatalogData);
        $('.productOrigin').text(translations.catalog.productOrigin);
        $('#productoOrigen').attr('placeholder', translations.catalog.specialCatalogData);
        $('.commercialName').text(translations.catalog.commercialName);
        $('#productoNombreComercial').attr('placeholder', translations.catalog.importedCatalogData);
        $('.quantity').text(translations.catalog.quantity);
        $('#cantidad').attr('placeholder', translations.catalog.enterQuantity);
        $('.price').text(translations.catalog.price);
        $('#precio').attr('placeholder', translations.catalog.enterPrice);
        $('.unitOfMeasure').text(translations.catalog.unitOfMeasure);
        $('#unidadMedida').attr('placeholder', translations.catalog.manualCatalogData);
        $('.supervisor').text(translations.catalog.supervisor);
        $('#supervisor').attr('placeholder', translations.catalog.manualCatalogData);
        $('.executive').text(translations.catalog.executive);
        $('#ejecutivo').attr('placeholder', translations.catalog.manualCatalogData);
        $('.cancel').text(translations.catalog.cancel);
        $('.create').text(translations.catalog.create);
    } else if (pagina === 'users') {
        // Aplicar traducciones a la sección de usuarios
        $('#title').text(translations.users.title);
        $('.tasks').text(translations.users.tasks);

        // Traducciones de usuarios
        $('.username').text(translations.users.username + ':');
        $('#username').attr('placeholder', translations.users.username);
        $('.password').text(translations.users.password + ':');
        $('#password').attr('placeholder', translations.users.password);
        $('.role').text(translations.users.role + ':');
        $('.createUser').text(translations.users.createUser);
    }

    // Traducciones de administrador
    $('.users').html('<i class="fas fa-users fs-5 me-2"></i>' + translations.admin.users);
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
