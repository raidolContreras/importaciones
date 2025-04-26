$(document).ready(function () {
  const $form = $(".sign-in-form");
  $form.attr("action", "login");

  $form.on("submit", function (event) {
    event.preventDefault();

    const email = $("#email").val();
    const password = $("#password").val();
    const company = $("#company-select").val();

    if (!email || !password || !company) {
      alert("Por favor, completa todos los campos.");
      return;
    }

    const formData = {
      email: email,
      password: password,
      company: company,
    };

    $.ajax({
      url: "login",
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify(formData),
      success: function (data) {
        if (data.success) {
          alert("¡Inicio de sesión exitoso!");
          // Redirigir o realizar otras acciones
        } else {
          alert("Error de inicio de sesión: " + data.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
        alert("Ocurrió un error. Por favor, inténtalo de nuevo.");
      },
    });
  });
});
