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
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear Broker</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card modern-card h-100">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title text-center mb-4">Crear Producto + Origen</h3>
                    <form id="create-po-form" class="modal-content">
                        <div class="modal-body">
                            <div class="row g-3">


                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Broker</span>
                                        <select class="form-select" name="broker" required>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Producto</span>
                                        <input type="text" class="form-control" name="producto" required placeholder="Ej: Producto X">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">País Origen</span>
                                        <input type="text" class="form-control" name="pais_origen" required placeholder="Ej: México">
                                    </div>
                                </div>

                                <!-- Fila 2: Nombres -->
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Nombre Comercial</span>
                                        <input type="text" class="form-control" name="nombre_comercial" placeholder="Ej: Comercial S.A.">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Nombre Científico</span>
                                        <input type="text" class="form-control" name="nombre_cientifico" placeholder="Ej: Plantae científico">
                                    </div>
                                </div>

                                <!-- Fila 3: Datos arancelarios y unidad -->
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Fracción Arancelaria</span>
                                        <input type="text" class="form-control" name="fraccion_arancelaria" placeholder="Ej: 0101.10.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Unidad Inventariable</span>
                                        <input type="text" class="form-control" name="unidad_inventariable" placeholder="Ej: Caja">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Kg por Pieza</span>
                                        <input type="number" step="0.01" class="form-control" name="kg_por_pieza" placeholder="Ej: 2.50">
                                    </div>
                                </div>

                                <!-- Fila 4: Número de producto -->
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Num Producto</span>
                                        <input type="number" class="form-control" name="num_producto" placeholder="Ej: 1001">
                                    </div>
                                </div>

                                <!-- Fila 5: Requerimientos especiales -->
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <input class="form-check-input mt-0" type="checkbox" id="req_inspeccion" name="requiere_inspeccion">
                                        </div>
                                        <label class="form-control mb-0" for="req_inspeccion">Requiere Inspección</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <input class="form-check-input mt-0" type="checkbox" id="req_fumigacion" name="requiere_fumigacion">
                                        </div>
                                        <label class="form-control mb-0" for="req_fumigacion">Requiere Fumigación</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabla de Brokers -->
        <div class="col-md-6">
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

        <!-- Tabla de Productos + Origen -->
        <div class="col-md-6">
            <div class="card modern-card h-100">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Lista de Productos + Origen</h3>
                    <div class="table-responsive">
                        <table id="products-table" class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Broker</th>
                                    <th>Producto</th>
                                    <th>País Origen</th>
                                    <th>Nombre Comercial</th>
                                    <th>Nombre Científico</th>
                                    <th>Fracción Arancelaria</th>
                                    <th>Unidad</th>
                                    <th>Acciones</th>
                                    <th>Kg/Pieza</th>
                                    <th>Num Producto</th>
                                    <th>Inspección</th>
                                    <th>Fumigación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí puedes cargar los productos desde PHP o vía AJAX -->
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
        const table = $("#brokers-table").DataTable({
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
                    // También poner los datos en el select de brokers
                    if (json.data.length === 0) {
                        $("#broker").html("<option value=''>No hay brokers disponibles</option>");
                    } else {
                        let options = "<option value=''>Seleccione un broker</option>";
                        json.data.forEach(broker => {
                            options += `<option value="${broker.broker_id}">${broker.broker_name}</option>`;
                        });
                        $("select[name='broker']").html(options);
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
        return table;
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

    $("#create-po-form").on("submit", function(e) {
        e.preventDefault();

        let formData = $(this).serializeArray();
        formData.push({
            name: "action",
            value: "createProductOrigin"
        });

        $.ajax({
            url: "controller/actions.controller.php",
            method: "POST",
            data: formData,
            success: function(response) {
                toastr.success(response.message, "¡Éxito!");
                $("#create-po-form")[0].reset();
                brokersTable.ajax.reload();
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message, "Error");
            }
        });
    });
    
    
    // Inicializar la tabla de productos
    function initProductsTable() {
        return $("#products-table").DataTable({
            ajax: {
                url: "controller/actions.controller.php",
                type: "POST",
                data: {
                    action: "getProductsOrigin"
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
                    data: "producto"
                },
                {
                    data: "pais_origen"
                },
                {
                    data: "nombre_comercial"
                },
                {
                    data: "nombre_cientifico"
                },
                {
                    data: "fraccion_arancelaria"
                },
                {
                    data: "unidad_inventariable"
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(_, __, row) {
                        return `
                                    <button class="btn btn-sm btn-danger btn-delete-product" data-id="${row.id}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                `;
                    }
                },
                {
                    data: "kg_por_pieza"
                },
                {
                    data: "num_producto"
                },
                {
                    data: "requiere_inspeccion",
                    render: v => v == 1 ? "Sí" : "No"
                },
                {
                    data: "requiere_fumigacion",
                    render: v => v == 1 ? "Sí" : "No"
                }
            ],
            responsive: true,
            ...getLanguageOption()
        });
    }

    let productsTable;
    $(function() {
        productsTable = initProductsTable();

        // Eliminar producto
        $("#products-table").on("click", ".btn-delete-product", function() {
            const id = $(this).data("id");
            Swal.fire({
                title: "¿Eliminar producto?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then(result => {
                if (result.isConfirmed) {
                    sendRequest("deleteProductOrigin", {
                            id
                        })
                        .then(msg => {
                            toastr.success(msg, "¡Éxito!");
                            productsTable.ajax.reload();
                        })
                        .catch(err => {
                            toastr.error(err, "Error");
                        });
                }
            });
        });

        // Recargar tabla de productos al crear uno nuevo
        $("#create-po-form").on("submit", function() {
            setTimeout(() => productsTable.ajax.reload(), 500);
        });
    });
</script>