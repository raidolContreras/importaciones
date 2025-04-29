$(function () {
  // 1. Espera a que el DOM esté completamente cargado antes de ejecutar el código
  const $form = $(".sign-in-form");
  
  // 2. Asigna la URL de destino del formulario (attribute action)
  $form.attr("action", "login");

  // 3. Captura el evento de envío (submit) del formulario
  $form.on("submit", function (event) {
    // 3.1. Evita que el formulario se envíe de la forma tradicional (recarga de página)
    event.preventDefault();

    // 4. Obtiene los valores ingresados por el usuario en los campos
    const username = $("#user-name").val();
    const password = $("#password").val();
    const company = $("#company-select").val();

    // 5. Valida que los tres campos no estén vacíos
    if (!username || !password || !company) {
      alert("Por favor, completa todos los campos.");
      return; // Sale de la función si falta algún dato
    }

    // 6. Construye el objeto con los datos del formulario que se enviarán al servidor
    const formData = {
      action: "login",
      Username: username,
      Password: password,
      company_id: company,
    };

    // 7. Realiza la petición AJAX al endpoint "login"
    $.ajax({
      url: "controller/actions.controller.php",                      // Ruta a la que se envía la petición
      method: "POST",                    // Método HTTP
      data: formData,                   // Datos que se envían al servidor
      dataType: "json",                 // Tipo de datos que se espera recibir del servidor
      success: function (data) {         // Se ejecuta si la petición es exitosa
        if (data.status === "success") {
          // Si el login es exitoso, redirige a la página de inicio
          window.location.href = "./";
        } else {
          // Si el login falla (credenciales inválidas), muestra el mensaje del servidor
          alert("Error de inicio de sesión: " + data.message);
        }
      },
      error: function (xhr, status, error) {
        // Se ejecuta si hay un error de comunicación o interno del servidor
        console.error("Error en la petición AJAX:", error);
        alert("Ocurrió un error. Por favor, inténtalo de nuevo.");
      },
    });
  });
});
