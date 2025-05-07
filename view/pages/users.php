<link
  rel="stylesheet"
  href="view/assets/js/datatables/datatables.css"
/>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
/>

<div class="container-fluid p-4">
  <div class="row gy-3 gx-1">
    <!-- Formulario de creación de Usuario -->
    <div class="col-md-6">
      <div class="card modern-card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title text-center mb-4">Crear Usuario</h3>
          <form id="create-user-form" class="row g-3 flex-grow-1">
            <div class="col-md-6">
              <label for="username" class="form-label">Usuario</label>
              <input
                type="text"
                class="form-control username"
                id="username"
                name="username"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Contraseña</label>
              <input
                type="password"
                class="form-control password"
                id="password"
                name="password"
                required
              />
            </div>
            <div class="col-md-8">
              <label for="role" class="form-label">Rol</label>
              <select
                id="role"
                name="role"
                class="form-select"
                required
              >
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

    <!-- Formulario de creación de Rol -->
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
                required
              />
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

    <!-- Tabla de Usuarios -->
    <div class="col-md-6">
      <div class="card modern-card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title text-center mb-4">Lista de Usuarios</h3>
          <table
            id="users-table"
            class="table table-striped table-bordered dt-responsive nowrap w-100 flex-grow-1"
          >
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

    <!-- Tabla de Roles -->
    <div class="col-md-6">
      <div class="card modern-card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title text-center mb-4">Lista de Roles</h3>
          <table
            id="roles-table"
            class="table table-striped table-bordered dt-responsive nowrap w-100 flex-grow-1"
          >
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

<script
  src="view/assets/js/datatables/datatables.js"
></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  $(function () {
    // Función genérica de AJAX
    function sendRequest(action, data = {}) {
      return $.ajax({
        url: "controller/actions.controller.php",
        method: "POST",
        data: { action, ...data },
        dataType: "json"
      }).then(resp => {
        if (resp.status !== "success") {
          return Promise.reject(resp.message);
        }
        return resp.data || resp.message;
      });
    }

    // Inicializa DataTable y retorna instancia
    function initTable(selector, action, cols) {
      return $(selector).DataTable({
        ajax: {
          url: "controller/actions.controller.php",
          type: "POST",
          data: { action },
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

    const usersTable = initTable("#users-table", "fetchUsers", [
      { data: "id_Users" },
      { data: "Username" },
      { data: "Role_Name" },
      {
        data: null,
        orderable: false,
        render(_, __, row) {
          return `
                    <button class="btn btn-sm btn-action text-primary" data-action="editUser" data-id="${row.id_Users}" style="border: none; background: none;">
                        <i class="fas fa-edit"></i>
                    </button>
          <button class="btn btn-sm btn-action text-danger" data-action="deleteUser" data-id="${row.id_Users}" style="border: none; background: none;">
                    <i class="fas fa-trash-alt"></i>
                  </button>`;
        }
      }
    ]);

    const rolesTable = initTable("#roles-table", "fetchRoles", [
      { data: "id_Rol" },
      { data: "Role_Name" },
      {
        data: null,
        orderable: false,
        render(_, __, row) {
          return `<button class="btn btn-sm btn-action text-primary" data-action="editRole" data-id="${row.id_Rol}" style="border: none; background: none;">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-action text-danger" data-action="deleteRole" data-id="${row.id_Rol}" style="border: none; background: none;">
                    <i class="fas fa-trash-alt"></i>
                  </button>`;
        }
      }
    ]);

    // Manejador genérico de formularios
    function bindForm(formSelector, action, table) {
      $(formSelector).on("submit", function (e) {
        e.preventDefault();
        const data = $(this).serializeArray().reduce((obj, { name, value }) => {
          obj[name] = value;
          return obj;
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

    // Manejador único de botones de acción (deleteUser / deleteRole)
    $(document).on("click", ".btn-action", function () {
      const action = $(this).data("action");
      const id = $(this).data("id");
      const table = action === "deleteUser" ? usersTable : rolesTable;

      Swal.fire({
        title: "¿Estás seguro?",
        text: "Esta operación es irreversible.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
      }).then(({ isConfirmed }) => {
        if (!isConfirmed) return;
        sendRequest(action, { id })
          .then(msg => {
            Swal.fire("Eliminado", msg, "success");
            table.ajax.reload();
          })
          .catch(err => Swal.fire("Error", err, "error"));
      });
    });
  });
</script>
