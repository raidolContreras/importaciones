<style>
    @media (min-width: 992px) {
        .card.full-height {
            height: calc(100vh - 3rem);
            /* Ajusta según el padding/margen superior */
        }
    }
</style>

<div class="container-fluid py-4 min-vh-100 d-flex flex-column">
    <div class="row g-4 flex-grow-1">

        <!-- CARD TAREAS -->
        <div class="col-12 col-md-6 col-lg-4 d-flex">
            <div class="card full-height shadow border-0 rounded-4 flex-fill d-flex flex-column">
                <div class="card-header d-flex flex-column justify-content-center align-items-center bg-success text-white p-4" style="height: 200px;">
                    <i class="fas fa-tasks fa-4x mb-3"></i>
                    <h4 class="card-title mb-0">Tareas</h4>
                </div>
                <div class="card-body d-flex flex-column p-0 overflow-hidden">
                    <div class="flex-grow-1 overflow-auto">
                        <div class="list-group list-group-flush">
                            <button class="mt-1 mx-2 btn btn-success text-start">Tareas 01</button>
                            <button class="mt-1 mx-2 btn btn-success text-start">Tareas 02</button>
                            <button class="mt-1 mx-2 btn btn-success text-start">Tareas 03</button>
                            <button class="mt-1 mx-2 btn btn-success text-start">Tareas 04</button>
                            <button class="mt-1 mx-2 btn btn-success text-start">Tareas 05</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD PENDIENTES -->
        <div class="col-12 col-md-6 col-lg-4 d-flex">
            <div class="card full-height shadow border-0 rounded-4 flex-fill d-flex flex-column">
                <div class="card-header d-flex flex-column justify-content-center align-items-center bg-warning text-dark p-4" style="height: 200px;">
                    <i class="fas fa-clock fa-4x mb-3"></i>
                    <h4 class="card-title mb-0">Pendientes</h4>
                </div>
                <div class="card-body d-flex flex-column p-0 overflow-hidden">
                    <div class="flex-grow-1 overflow-auto">
                        <div class="list-group list-group-flush">
                            <button class="mt-1 mx-2 btn btn-warning text-start">Pendientes 01</button>
                            <button class="mt-1 mx-2 btn btn-warning text-start">Pendientes 02</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD RECORDATORIOS -->
        <div class="col-12 col-md-6 col-lg-4 d-flex">
            <div class="card full-height shadow border-0 rounded-4 flex-fill d-flex flex-column">
                <div class="card-header d-flex flex-column justify-content-center align-items-center bg-primary text-white p-4" style="height: 200px;">
                    <i class="fas fa-bell fa-4x mb-3"></i>
                    <h4 class="card-title mb-0">Recordatorios</h4>
                </div>
                <div class="card-body d-flex flex-column p-0 overflow-hidden">
                    <div class="flex-grow-1 overflow-auto">

                        <div class="list-group list-group-flush">
                            <div class="d-flex justify-content-center align-items-center my-3">
                                <hr class="flex-grow-1 me-3">
                                <span class="text-muted">Almacenadora</span>
                                <hr class="flex-grow-1 ms-3">
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <button class="mt-1 mx-2 btn btn-info text-start">Recordatorio 01</button>
                            <button class="mt-1 mx-2 btn btn-info text-start">Recordatorio 02</button>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="d-flex justify-content-center align-items-center my-3">
                                <hr class="flex-grow-1 me-3">
                                <span class="text-muted">Agruza</span>
                                <hr class="flex-grow-1 ms-3">
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            <button class="mt-1 mx-2 btn btn-info text-start">Recordatorio 01</button>
                            <button class="mt-1 mx-2 btn btn-info text-start">Recordatorio 02</button>
                            <button class="mt-1 mx-2 btn btn-info text-start">Recordatorio 03</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Floating Button -->
<button type="button" class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle shadow" data-bs-toggle="modal" data-bs-target="#catalogModal" style="width: 60px; height: 60px;">
    <i class="fas fa-plus"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="catalogModalLabel">Catálogo ID00001</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button type="button" class="btn btn-outline-light flex-shrink-0" style="background-color: transparent; color: white; border: 2px solid #FF5722; transition: none;">Folio Sistema: Número Secuencial</button>
                    <div class="d-flex justify-content-center w-100">
                        <h5 class="mb-0">Captura de Datos</h5>
                    </div>
                </div>
                <form>
                    <!--Fila-->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="NumeroBroker" class="form-label">Número de Broker:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="NumeroBroker" class="form-control" placeholder="Dato desde catálogo manual en DB">
                        </div>
                    </div>

                    <!--Fila-->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="NumerodeProveedor" class="form-label">Número de Proveedor:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="NumerodeProveedor" class="form-control" placeholder="Dato desde catálogo importado en DB">
                        </div>
                    </div>

                    <!--Fila-->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="Producto+Origen" class="form-label">Producto + Origen:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="Producto+Origen" class="form-control" placeholder="Dato desde catálogo especial en DB">
                        </div>
                    </div>

                    <!--Fila-->
                    <div class="row mb-2 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="Producto Nombre Comercial" class="form-label">Producto Nombre Comercial:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="Producto Nombre Comercial" class="form-control" placeholder="Dato desde catálogo importado en DB">
                        </div>
                    </div>

                    <!--espacio-->
                    <div class="row mb-1 align-items-center">
                        <h5> </h5>
                    </div>

                    <!--Fila-->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="Cantidad" class="form-label">Cantidad:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="Cantidad" class="form-control" placeholder="Ingreso la Cantidad Manual">
                        </div>
                    </div>

                    <!--Fila-->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="Precio" class="form-label">Precio:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" step="0.01" id="Precio" class="form-control" placeholder="Ingreso la Cantidad Manual">
                        </div>
                    </div>

                    <!--Fila-->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="Unidad de Medida" class="form-label">Unidad de Medida:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="Unidad de Medida" class="form-control" placeholder="Dato desde catálogo manual en DB">
                        </div>
                    </div>

                    <!--espacio-->
                    <div class="row mb-1 align-items-center">
                        <h5> </h5>
                    </div>

                    <!--Fila-->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="Supervisor" class="form-label">Supervisor:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="Supervisor" class="form-control" placeholder="Dato desde catálogo manual en DB">
                        </div>
                    </div>

                    <!--Fila-->
                    <div class="row mb-1 align-items-center">
                        <div class="col-md-6 text-md-end">
                            <label for="Ejecutivo" class="form-label">Ejecutivo:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="Ejecutivo" class="form-control" placeholder="Dato desde catálogo manual en DB">
                        </div>
                    </div>

                    <!--Botón de inicio de envio-->
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>