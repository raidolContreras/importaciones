<!-- estilos DataTables y Toastr -->
<link rel="stylesheet" href="view/assets/js/datatables/datatables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<div class="container-fluid p-4">
    <div class="row gy-3 gx-1">
        <!-- Crear Proveedor -->
        <div class="col-md-6">
            <div class="card modern-card h-100">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title text-center mb-4">Crear Proveedor</h3>
                    <form id="create-provider-form" class="row g-3 flex-grow-1">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">Nombre</span>
                                <input type="text" class="form-control" id="provider-name" name="provider_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">Teléfono</span>
                                <input type="text" class="form-control" id="provider-phone" name="provider_phone" maxlength="20" autocomplete="off" required placeholder="Ej: 555-123-4567 o +52 55-123-4567">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-text">Correo</span>
                                <input type="email" class="form-control" id="provider-email" name="provider_email" autocomplete="off" required placeholder="ejemplo@correo.com" list="common-emails">
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
                            <button type="submit" class="btn btn-success">Crear Proveedor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tabla de Proveedores -->
        <div class="col-md-12">
            <div class="card modern-card h-100">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Lista de Proveedores</h3>
                    <div class="table-responsive">
                        <table id="providers-table" class="table table-striped table-bordered w-100">
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
                                <!-- Aquí puedes cargar los proveedores desde PHP o vía AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Proveedor -->
<div class="modal fade" id="editProviderModal" tabindex="-1" aria-labelledby="editProviderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="edit-provider-form" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProviderModalLabel">Editar Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit-provider-id" name="provider_id">
                <div class="mb-3">
                    <label for="edit-provider-name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="edit-provider-name" name="provider_name" required>
                </div>
                <div class="mb-3">
                    <label for="edit-provider-phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="edit-provider-phone" name="provider_phone" maxlength="20" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="edit-provider-email" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="edit-provider-email" name="provider_email" autocomplete="off" required placeholder="ejemplo@correo.com" list="common-emails">
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
    let providersTable;

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

    function initProvidersTable() {
        return $("#providers-table").DataTable({
            ajax: {
                url: "controller/actions.controller.php",
                type: "POST",
                data: {
                    action: "getProviders"
                },
                dataSrc(json) {
                    if (json.status !== "success") {
                        toastr.error(json.message);
                        return [];
                    }
                    return json.data;
                }
            },
            columns: [
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: "provider_name" },
                { data: "provider_phone" },
                { data: "provider_email" },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render(_, __, row) {
                        let btns = `
                            <button class="btn btn-sm btn-edit-provider text-primary" data-id="${row.provider_id}">
                                <i class="fas fa-edit"></i>
                            </button>
                        `;
                        if (parseInt(row.provider_isActive) === 1) {
                            btns += `
                                <button class="btn btn-sm btn-disable-provider text-danger" data-id="${row.provider_id}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            `;
                        } else {
                            btns += `
                                <button class="btn btn-sm btn-enable-provider text-success" data-id="${row.provider_id}">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                            `;
                        }
                        return btns;
                    }
                }
            ],
            responsive: true,
            ...((typeof getLanguageOption === "function") ? getLanguageOption() : {})
        });
    }

    function bindProviderForm() {
        $("#create-provider-form").on("submit", function(e) {
            e.preventDefault();
            const data = $(this).serializeArray().reduce((o, { name, value }) => {
                o[name] = value;
                return o;
            }, {});
            sendRequest("createProvider", data)
                .then(msg => {
                    toastr.success(msg, "¡Éxito!");
                    this.reset();
                    providersTable.ajax.reload();
                })
                .catch(err => {
                    toastr.error(err, "Error");
                });
        });
    }

    function bindPhoneFormatter() {
        const inputs = [
            document.getElementById("provider-phone"),
            document.getElementById("edit-provider-phone")
        ];
        inputs.forEach(input => {
            if (!input) return;
            input.addEventListener("input", function() {
                let v = this.value.replace(/\D/g, "");
                if (v.length > 10) {
                    v = v.slice(0, 14);
                    if (v.length > 12) {
                        this.value = `+${v.slice(0,2)} ${v.slice(2,4)}-${v.slice(4,7)}-${v.slice(7,10)}-${v.slice(10,14)}`;
                    } else if (v.length > 10) {
                        this.value = `+${v.slice(0,1)} ${v.slice(1,4)}-${v.slice(4,7)}-${v.slice(7,11)}`;
                    } else {
                        this.value = `+${v.slice(0,2)} ${v.slice(2,4)}-${v.slice(4,7)}-${v.slice(7)}`;
                    }
                } else {
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

    $(function() {
        providersTable = initProvidersTable();
        bindProviderForm();
        bindPhoneFormatter();
        bindEditProviderEvent();
        bindDeleteProviderEvent();
    });

    function bindEditProviderEvent() {
        $("#providers-table").on("click", ".btn-edit-provider", function() {
            const providerId = $(this).data("id");
            sendRequest("getProviderById", { provider_id: providerId })
                .then(provider => {
                    $("#edit-provider-id").val(provider.provider_id);
                    $("#edit-provider-name").val(provider.provider_name);
                    $("#edit-provider-phone").val(provider.provider_phone);
                    $("#edit-provider-email").val(provider.provider_email);
                    $("#editProviderModal").modal("show");

                    $("#edit-provider-form").off("submit").on("submit", function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: "controller/actions.controller.php",
                            method: "POST",
                            data: $(this).serialize() + "&action=editProvider",
                            success: function(response) {
                                toastr.success(response.message, "¡Éxito!");
                                $("#editProviderModal").modal("hide");
                                providersTable.ajax.reload();
                            },
                            error: function(xhr) {
                                toastr.error(xhr.responseJSON ? xhr.responseJSON.message : "Error", "Error");
                            }
                        });
                    });
                })
                .catch(err => {
                    toastr.error(err, "Error");
                });
        });
    }

    function bindDeleteProviderEvent() {
        $("#providers-table").on("click", ".btn-disable-provider, .btn-enable-provider", function() {
            const providerId = $(this).data("id");
            const action = $(this).hasClass("btn-disable-provider") ? "disableProvider" : "enableProvider";
            const actionText = action === "disableProvider" ? "desactivar" : "activar";
            Swal.fire({
                title: `¿Estás seguro de ${actionText} este proveedor?`,
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: `Sí, ${actionText}lo`,
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    sendRequest(action, { provider_id: providerId })
                        .then(msg => {
                            toastr.success(msg, "¡Éxito!");
                            providersTable.ajax.reload();
                        })
                        .catch(err => {
                            toastr.error(err, "Error");
                        });
                }
            });
        });
    }
</script>