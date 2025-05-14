<!-- estilos DataTables y Toastr -->
<link
  rel="stylesheet"
  href="view/assets/js/datatables/datatables.css" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<div class="container-fluid p-4">
  <div class="row gy-3 gx-1">
    <!-- Crear Usuario -->
    <div class="col-md-6">
      <div class="card modern-card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title text-center mb-4">Crear Usuario</h3>
          <form id="create-user-form" class="row g-3 flex-grow-1">
            <div class="col-md-6">
              <label for="username" class="form-label username">Usuario</label>
              <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                required />
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label password">Contraseña</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required />
            </div>
            <div class="col-md-8">
              <label for="role" class="form-label">Rol</label>
              <select
                id="role"
                name="role"
                class="form-select"
                required>
                <option value="" disabled selected>Seleccione rol</option>
                <option value="1">SuperAdmin</option>
                <option value="2">Ejecutivo</option>
                <option value="3">Supervisor</option>
              </select>
            </div>
            <div class="col-md-4 d-grid">
              <button type="submit" class="btn btn-success">
                Crear
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Crear Rol -->
    <div class="col-md-6">
      <div class="card modern-card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title text-center mb-4">Crear Rol</h3>
          <form id="create-role-form" class="row g-3 flex-grow-1">
            <div class="col-md-9">
              <label for="role-name" class="form-label">Nombre del Rol</label>
              <input
                type="text"
                class="form-control"
                id="role-name"
                name="role_name"
                required />
            </div>
            <div class="col-md-3 d-grid">
              <button type="submit" class="btn btn-primary">
                Crear
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Lista Usuarios -->
    <div class="col-md-6">
      <div class="card modern-card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title text-center mb-4">Lista de Usuarios</h3>
          <table
            id="users-table"
            class="table table-striped table-bordered dt-responsive nowrap w-100 flex-grow-1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Acciones</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>

    <!-- Lista Roles -->
    <div class="col-md-6">
      <div class="card modern-card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title text-center mb-4">Lista de Roles</h3>
          <table
            id="roles-table"
            class="table table-striped table-bordered dt-responsive nowrap w-100 flex-grow-1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Acciones</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar Usuario -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario de edición de usuario -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Interacciones -->
<div class="modal fade" id="interactionModal" tabindex="-1" aria-labelledby="interactionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="interactionModalLabel">Interacciones del Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="interaction-table" class="table table-striped table-bordered dt-responsive nowrap w-100">
          <thead>
            <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>Empresa</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- scripts DataTables, SweetAlert2, Toastr -->
<script src="view/assets/js/datatables/datatables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  $(function() {
    // 1) Función AJAX genérica
    function sendRequest(action, data = {}) {
      return $.ajax({
        url: "controller/actions.controller.php",
        method: "POST",
        data: {
          action,
          ...data
        },
        dataType: "json"
      }).then(resp => {
        if (resp.status !== "success") {
          return Promise.reject(resp.message);
        }
        return resp.data || resp.message;
      });
    }

    // 2) Inicializar DataTable
    function initTable(selector, action, cols) {
      return $(selector).DataTable({
        ajax: {
          url: "controller/actions.controller.php",
          type: "POST",
          data: {
            action
          },
          dataSrc(json) {
            if (json.status !== "success") {
              toastr.error(json.message);
              return [];
            }
            return json.data;
          }
        },
        columns: cols,
        responsive: true
      });
    }

    const usersTable = initTable("#users-table", "fetchUsers", [{
        data: "id_Users"
      },
      {
        data: "Username"
      },
      {
        data: "Role_Name"
      },
      {
        data: null,
        orderable: false,
        render(_, __, row) {
          return `
            <button class="btn btn-sm btn-action text-info" data-action="viewLogs" data-id="${row.id_Users}" style="border:none;background:none">
              <i class="fas fa-list"></i>
            </button>
            <button class="btn btn-sm btn-action text-primary" data-action="editUser" data-id="${row.id_Users}" style="border:none;background:none">
              <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-action text-danger" data-action="deleteUser" data-id="${row.id_Users}" style="border:none;background:none">
              <i class="fas fa-trash-alt"></i>
            </button>`;
        }
      }
    ]);

    const rolesTable = initTable("#roles-table", "fetchRoles", [{
        data: "id_Rol"
      },
      {
        data: "Role_Name"
      },
      {
        data: null,
        orderable: false,
        render(_, __, row) {
          return `
            <button class="btn btn-sm btn-action text-primary" data-action="editRole" data-id="${row.id_Rol}" style="border:none;background:none">
              <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm btn-action text-danger" data-action="deleteRole" data-id="${row.id_Rol}" style="border:none;background:none">
              <i class="fas fa-trash-alt"></i>
            </button>`;
        }
      }
    ]);

    // 3) Bind formularios de creación
    function bindForm(formSelector, action, table) {
      $(formSelector).on("submit", function(e) {
        e.preventDefault();
        const data = $(this).serializeArray().reduce((o, {
          name,
          value
        }) => {
          o[name] = value;
          return o;
        }, {});
        sendRequest(action, data)
          .then(msg => {
            Swal.fire("¡Éxito!", msg, "success");
            this.reset();
            table.ajax.reload();
          })
          .catch(err => Swal.fire("Error", err, "error"));
      });
    }
    bindForm("#create-user-form", "createUser", usersTable);
    bindForm("#create-role-form", "createRole", rolesTable);

    // 4) Ver Interacciones (logs)
    $(document).on("click", ".btn-action[data-action='viewLogs']", function() {
      const userId = $(this).data("id");
      $("#interaction-table").DataTable({
        destroy: true,
        ajax: {
          url: "controller/actions.controller.php",
          type: "POST",
          data: {
            action: "fetchLogs",
            user_id: userId
          },
          dataSrc(json) {
            if (json.status !== "success") {
              toastr.error(json.message);
              return [];
            }
            return json.data;
          }
        },
        columns: [{
            data: "log_id"
          },
          {
            data: "id_usuario"
          },
          {
            data: "id_empresa"
          },
          {
            data: "fecha"
          },
          {
            data: "hora"
          },
          {
            data: "accion"
          }
        ],
        responsive: true
      });
      $("#interactionModal").modal("show");
    });

    // 5) Eliminar Usuario / Rol con confirm distinto
    $(document).on("click",
      ".btn-action[data-action='deleteUser'], .btn-action[data-action='deleteRole']",
      function() {
        const action = $(this).data("action");
        const id = $(this).data("id");
        const table = action === "deleteUser" ? usersTable : rolesTable;
        const title = action === "deleteUser" ? "¿Eliminar usuario?" : "¿Eliminar rol?";
        const text = action === "deleteUser" ?
          `¿Estás seguro de eliminar al usuario con ID ${id}? Esta operación es irreversible.` :
          `¿Estás seguro de eliminar el rol con ID ${id}? Esta operación es irreversible.`;

        Swal.fire({
          title,
          text,
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Sí, eliminar",
          cancelButtonText: "Cancelar"
        }).then(({
          isConfirmed
        }) => {
          if (!isConfirmed) return;
          sendRequest(action, {
              id
            })
            .then(msg => {
              Swal.fire(
                action === "deleteUser" ? "Usuario eliminado" : "Rol eliminado",
                msg, "success"
              );
              table.ajax.reload();
            })
            .catch(err => Swal.fire("Error", err, "error"));
        });
      }
    );

    // 6) Editar Usuario
    $(document).on("click", ".btn-action[data-action='editUser']", function() {
      const id = $(this).data("id");
      sendRequest("getUser", {
          id
        })
        .then(user => {
          // Aquí muestras tu modal de edición o rellenas el formulario
          // p.ej.: $("#username").val(user.Username);
          // … luego vuelves a mandar updateUser en el submit
        })
        .catch(err => Swal.fire("Error", err, "error"));
    });

    // 7) Editar Rol
    $(document).on("click", ".btn-action[data-action='editRole']", function() {
      const id = $(this).data("id");
      sendRequest("getRole", {
          id
        })
        .then(role => {
          // Rellenas formulario de edición de rol
        })
        .catch(err => Swal.fire("Error", err, "error"));
    });

  });
</script>