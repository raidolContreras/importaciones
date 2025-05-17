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
          <h3 class="card-title text-center mb-4 createUser"></h3>
          <form id="create-user-form" class="row g-3 flex-grow-1">
            <div class="col-md-6">
              <label for="username" class="form-label username"></label>
              <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                required />
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label password"></label>
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
              <button type="submit" class="btn btn-success createUser"></button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Crear Rol -->
    <div class="col-md-6">
      <div class="card modern-card h-100">
        <div class="card-body d-flex flex-column">
          <h3 class="card-title text-center mb-4 createRole"></h3>
          <form id="create-role-form" class="row g-3 flex-grow-1">
            <div class="col-md-9">
              <label for="role-name" class="form-label role-name"></label>
              <input
                type="text"
                class="form-control"
                id="role-name"
                name="role_name"
                required />
            </div>
            <div class="col-md-3 d-grid">
              <button type="submit" class="btn btn-primary createRole"></button>
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
  // Variables globales de tablas
  let usersTable, rolesTable;

  // 1) Función AJAX genérica
  function sendRequest(action, data = {}) {
    return $.ajax({
      url: "controller/actions.controller.php",
      method: "POST",
      data: { action, ...data },     // ← corregido de `.{data}` :contentReference[oaicite:0]{index=0}:contentReference[oaicite:1]{index=1}
      dataType: "json"
    }).then(resp => {
      if (resp.status !== "success") {
        return Promise.reject(resp.message);
      }
      return resp.data || resp.message;
    });
  }

  // 2) Inicializar tabla de Usuarios
  function initUsersTable() {
    return $("#users-table").DataTable({
      ajax: {
        url: "controller/actions.controller.php",
        type: "POST",
        data: { action: "fetchUsers" },
        dataSrc(json) {
          if (json.status !== "success") {
            toastr.error(json.message);
            return [];
          }
          return json.data;
        }
      },
      columns: [
        { data: "id_Users" },
        { data: "Username" },
        { data: "Role_Name" },
        {
          data: null,
          orderable: false,
          render(_, __, row) {
            return `
              <button class="btn btn-sm btn-view-logs text-info" data-id="${row.id_Users}">
                <i class="fas fa-list"></i>
              </button>
              <button class="btn btn-sm btn-edit-user text-primary" data-id="${row.id_Users}">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-delete-user text-danger" data-id="${row.id_Users}">
                <i class="fas fa-trash-alt"></i>
              </button>`;
          }
        }
      ],
      responsive: true,
      ...getLanguageOption()             // ← corregido de `.getLanguageOption()` :contentReference[oaicite:2]{index=2}:contentReference[oaicite:3]{index=3}
    });
  }

  // 3) Inicializar tabla de Roles
  function initRolesTable() {
    return $("#roles-table").DataTable({
      ajax: {
        url: "controller/actions.controller.php",
        type: "POST",
        data: { action: "fetchRoles" },
        dataSrc(json) {
          if (json.status !== "success") {
            toastr.error(json.message);
            return [];
          }
          return json.data;
        }
      },
      columns: [
        { data: "id_Rol" },
        { data: "Role_Name" },
        {
          data: null,
          orderable: false,
          render(_, __, row) {
            return `
              <button class="btn btn-sm btn-edit-role text-primary" data-id="${row.id_Rol}">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-delete-role text-danger" data-id="${row.id_Rol}">
                <i class="fas fa-trash-alt"></i>
              </button>`;
          }
        }
      ],
      responsive: true,
      ...getLanguageOption()             // ← corregido de `.getLanguageOption()` :contentReference[oaicite:4]{index=4}:contentReference[oaicite:5]{index=5}
    });
  }

  // 4) Bind de formularios de creación
  function bindForm(formSelector, action, table) {
    $(formSelector).on("submit", function(e) {
      e.preventDefault();
      const data = $(this).serializeArray().reduce((o, { name, value }) => {
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

  // 5) Document Ready: inicializar todo
  $(function() {
    usersTable = initUsersTable();
    rolesTable = initRolesTable();
    bindForm("#create-user-form", "createUser", usersTable);
    bindForm("#create-role-form", "createRole", rolesTable);

    // Ver logs
    $(document).on("click", ".btn-view-logs", function() {
      const userId = $(this).data("id");
      $("#interaction-table").DataTable({
        destroy: true,
        ajax: {
          url: "controller/actions.controller.php",
          type: "POST",
          data: { action: "fetchLogs", user_id: userId },
          dataSrc(json) {
            if (json.status !== "success") {
              toastr.error(json.message);
              return [];
            }
            return json.data;
          }
        },
        columns: [
          { data: null, orderable: false, render(_,__,row,meta){ return meta.row+1; } },
          { data: "id_usuario" },
          { data: "id_empresa" },
          { data: "fecha" },
          { data: "hora" },
          { data: "accion" }
        ],
        responsive: true,
        ...getLanguageOption()
      });
      $("#interactionModal").modal("show");
    });

    // Editar
    $(document).on("click", ".btn-edit-user", function() {
      const id = $(this).data("id");
      sendRequest("getUser", { id })
        .then(user => {
          // Rellenar y mostrar modal de edición...
        })
        .catch(err => Swal.fire("Error", err, "error"));
    });
    $(document).on("click", ".btn-edit-role", function() {
      const id = $(this).data("id");
      sendRequest("getRole", { id })
        .then(role => {
          // Rellenar y mostrar modal de edición...
        })
        .catch(err => Swal.fire("Error", err, "error"));
    });

    // Eliminar
    $(document).on("click", ".btn-delete-user", function() {
      const id = $(this).data("id");
      Swal.fire({
        title: "¿Eliminar usuario?",
        text: `Eliminar al usuario con ID ${id}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
      }).then(({isConfirmed})=>{
        if (!isConfirmed) return;
        sendRequest("deleteUser", { id })
          .then(msg => {
            Swal.fire("Usuario eliminado", msg, "success");
            usersTable.ajax.reload();
          })
          .catch(err => Swal.fire("Error", err, "error"));
      });
    });
    $(document).on("click", ".btn-delete-role", function() {
      const id = $(this).data("id");
      Swal.fire({
        title: "¿Eliminar rol?",
        text: `Eliminar el rol con ID ${id}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
      }).then(({isConfirmed})=>{
        if (!isConfirmed) return;
        sendRequest("deleteRole", { id })
          .then(msg => {
            Swal.fire("Rol eliminado", msg, "success");
            rolesTable.ajax.reload();
          })
          .catch(err => Swal.fire("Error", err, "error"));
      });
    });

  });

</script>
