<!-- estilos DataTables y Toastr -->
<link rel="stylesheet" href="view/assets/js/datatables/datatables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<div class="container-fluid p-4">
    <div class="row gy-3 gx-1">
        <!-- Crear Broker -->
        <div class="col-md-6">
            <div class="card modern-card h-100">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title text-center mb-4">Crear Broker</h3>
                    <form id="create-broker-form" class="row g-3 flex-grow-1">
                        <div class="col-md-6">

                            <div class="input-group">
                                <span class="input-group-text ">Nombre</span>
                                <input type="text" class="form-control" id="broker-name" name="broker_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="input-group">
                                <span class="input-group-text ">Teléfono</span>
                                <input type="text" class="form-control" id="broker-phone" name="broker_phone" maxlength="20" autocomplete="off" required placeholder="Ej: 555-123-4567 o +52 55-123-4567">
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="input-group">
                                <span class="input-group-text ">Correo</span>
                                <input type="email" class="form-control" id="broker-email" name="broker_email" autocomplete="off" required placeholder="ejemplo@correo.com" list="common-emails">
                                <datalist id="common-emails">
                                    <option value="@gmail.com">
                                    <option value="@hotmail.com">
                                    <option value="@yahoo.com">
                                    <option value="@outlook.com">
                                    <option value="@icloud.com">
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-4 d-grid ms-auto">
                            <button type="submit" class="btn btn-primary">Crear Broker</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tabla de Brokers -->
        <div class="col-md-12">
            <div class="card modern-card h-100">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Lista de Brokers</h3>
                    <div class="table-responsive">
                        <table id="brokers-table" class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí puedes cargar los brokers desde PHP o vía AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal Editar Broker -->
<div class="modal fade" id="editBrokerModal" tabindex="-1" aria-labelledby="editBrokerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="edit-broker-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBrokerModalLabel">Editar Broker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit-broker-id" name="broker_id">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text ">Nombre</span>
                        <input type="text" class="form-control" id="edit-broker-name" name="broker_name" required>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text ">Teléfono</span>
                        <input type="text" class="form-control" id="edit-broker-phone" name="broker_phone" maxlength="20" autocomplete="off" required>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text ">Correo</span>
                        <input type="text" class="form-control" id="edit-broker-email" name="broker_email" autocomplete="off" required placeholder="ejemplo@correo.com" list="common-emails">
                    </div>
                    <datalist id="common-emails">
                        <option value="@gmail.com">
                        <option value="@hotmail.com">
                        <option value="@yahoo.com">
                        <option value="@outlook.com">
                        <option value="@icloud.com">
                    </datalist>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

<!-- scripts DataTables, SweetAlert2, Toastr -->
<script src="view/assets/js/datatables/datatables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // Variable global de la tabla
    let brokersTable;

    // 1) Función genérica para peticiones AJAX
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

    // 2) Inicializar la tabla de Brokers
    function initBrokersTable() {
        return $("#brokers-table").DataTable({
            ajax: {
                url: "controller/actions.controller.php",
                type: "POST",
                data: {
                    action: "getBrokers"
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
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: "broker_name"
                },
                {
                    data: "broker_phone"
                },
                {
                    data: "broker_email"
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render(_, __, row) {
                        let btns = `
              <button class="btn btn-sm btn-edit-broker text-primary" data-id="${row.broker_id}">
                <i class="fas fa-edit"></i>
              </button>
            `;
                        if (parseInt(row.broker_isActive) === 1) {
                            btns += `
                <button class="btn btn-sm btn-disable-broker text-danger" data-id="${row.broker_id}">
                  <i class="fas fa-trash-alt"></i>
                </button>
              `;
                        } else {
                            btns += `
                <button class="btn btn-sm btn-enable-broker text-success" data-id="${row.broker_id}">
                  <i class="fas fa-check-circle"></i>
                </button>
              `;
                        }
                        return btns;
                    }
                }
            ],
            responsive: true,
            // Aplicamos la configuración de idioma actual
            ...getLanguageOption()
        });
    }

    // 3) Bind del formulario de creación
    function bindBrokerForm() {
        $("#create-broker-form").on("submit", function(e) {
            e.preventDefault();
            const data = $(this).serializeArray().reduce((o, {
                name,
                value
            }) => {
                o[name] = value;
                return o;
            }, {});
            sendRequest("createBroker", data)
                .then(msg => {
                    toastr.success(msg, "¡Éxito!");
                    this.reset();
                    brokersTable.ajax.reload();
                })
                .catch(err => {
                    toastr.error(err, "Error");
                });
        });
    }

    // 4) Formatee de teléfono en el input
    function bindPhoneFormatter() {
        const inputs = [
            document.getElementById("broker-phone"),
            document.getElementById("edit-broker-phone")
        ];
        inputs.forEach(input => {
            if (!input) return;
            input.addEventListener("input", function() {
                let v = this.value.replace(/\D/g, "");
                // Si tiene más de 10 dígitos, se asume que incluye código de país y zona
                if (v.length > 10) {
                    // Máximo 14 dígitos: 2 para país, 2 para zona, 10 para número
                    v = v.slice(0, 14);
                    // Formato: +CC-ZZ-XXX-XXX-XXXX
                    if (v.length > 12) {
                        this.value = `+${v.slice(0,2)} ${v.slice(2,4)}-${v.slice(4,7)}-${v.slice(7,10)}-${v.slice(10,14)}`;
                    } else if (v.length > 10) {
                        this.value = `+${v.slice(0,1)} ${v.slice(1,4)}-${v.slice(4,7)}-${v.slice(7,11)}`;
                    } else {
                        this.value = `+${v.slice(0,2)} ${v.slice(2,4)}-${v.slice(4,7)}-${v.slice(7)}`;
                    }
                } else {
                    // Formato clásico: XXX-XXX-XXXX
                    v = v.slice(0, 10);
                    if (v.length > 6) {
                        this.value = v.replace(/(\d{3})(\d{3})(\d{1,4})/, "$1-$2-$3");
                    } else if (v.length > 3) {
                        this.value = v.replace(/(\d{3})(\d{1,3})/, "$1-$2");
                    } else {
                        this.value = v;
                    }
                }
            });
        });
    }

    // 5) Document Ready: inicializar todo
    $(function() {
        brokersTable = initBrokersTable();
        bindBrokerForm();
        bindPhoneFormatter();

        // Bind de eventos para editar y eliminar brokers
        bindEditBrokerEvent();
        bindDeleteBrokerEvent();
    });

    // 6) Cambio de idioma dinámico
    function changeLanguage(language) {
        localStorage.setItem("idioma", language);
        cargarTraducciones(language).then(() => {
            aplicarTraducciones();

            const pagina = $("#pagina").val();
            if (pagina === "brokers") {
                // Destruir e inicializar de nuevo la tabla con el nuevo idioma
                if ($.fn.DataTable.isDataTable("#brokers-table")) {
                    brokersTable.destroy();
                }
                brokersTable = initBrokersTable();
            }
            // ... aquí podrías gestionar otras páginas si las hay
        });
    }

    // 7) Bind de eventos para editar y eliminar brokers
    function bindEditBrokerEvent() {
        $("#brokers-table").on("click", ".btn-edit-broker", function() {
            const brokerId = $(this).data("id");
            sendRequest("getBrokerById", {
                    broker_id: brokerId
                })
                .then(broker => {
                    $("#edit-broker-id").val(broker.broker_id);
                    $("#edit-broker-name").val(broker.broker_name);
                    $("#edit-broker-phone").val(broker.broker_phone);
                    $("#edit-broker-email").val(broker.broker_email);
                    $("#editBrokerModal").modal("show");

                    // Bind del formulario de edición
                    $("#edit-broker-form").on("submit", function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: "controller/actions.controller.php",
                            method: "POST",
                            data: $(this).serialize() + "&action=editBroker",
                            success: function(response) {
                                toastr.success(response.message, "¡Éxito!");
                                $("#editBrokerModal").modal("hide");
                                brokersTable.ajax.reload();
                            },
                            error: function(xhr) {
                                toastr.error(xhr.responseJSON.message, "Error");
                            }
                        });
                    });
                })
                .catch(err => {
                    toastr.error(err, "Error");
                });
        });
    }

    function bindDeleteBrokerEvent() {
        $("#brokers-table").on("click", ".btn-disable-broker, .btn-enable-broker", function() {
            const brokerId = $(this).data("id");
            const action = $(this).hasClass("btn-disable-broker") ? "disableBroker" : "enableBroker";
            const actionText = action === "disableBroker" ? "desactivar" : "activar";
            Swal.fire({
                title: `¿Estás seguro de ${actionText} este broker?`,
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: `Sí, ${actionText}lo`,
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    sendRequest(action, {
                            broker_id: brokerId
                        })
                        .then(msg => {
                            toastr.success(msg, "¡Éxito!");
                            brokersTable.ajax.reload();
                        })
                        .catch(err => {
                            toastr.error(err, "Error");
                        });
                }
            });
        });
    }
</script>