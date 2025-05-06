<div class="container-fluid py-4 d-flex flex-column">
    <div class="row g-4 flex-grow-1">

        <!-- CARD TAREAS -->
        <div class="col-12 col-md-6 col-lg-4 d-flex">
            <div class="card shadow border-0 rounded-4 flex-fill d-flex flex-column">
                <div class="card-header d-flex flex-column justify-content-center align-items-center bg-success text-white p-4" style="height: 130px;">
                    <i class="fas fa-tasks fa-2x mb-1"></i>
                    <h4 class="card-title mb-0 tasks"></h4>
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
                <div class="card-header d-flex flex-column justify-content-center align-items-center bg-warning text-dark p-4" style="height: 130px;">
                    <i class="fas fa-clock fa-2x mb-1"></i>
                    <h4 class="card-title mb-0 pending"></h4>
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
                <div class="card-header d-flex flex-column justify-content-center align-items-center bg-primary text-white p-4" style="height: 130px;">
                    <i class="fas fa-bell fa-2x mb-1"></i>
                    <h4 class="card-title mb-0 reminders"></h4>
                </div>
                <div class="card-body d-flex flex-column p-0 overflow-hidden">
                    <div class="flex-grow-1 overflow-auto">

                        <div class="list-group list-group-flush">
                            <div class="d-flex justify-content-center align-items-center my-3">
                                <hr class="flex-grow-1 me-3">
                                <span class="text-muted-dashboard">Almacenadora</span>
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
                                <span class="text-muted-dashboard">Agruza</span>
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
<button type="button" class="btn btn-primary position-fixed bottom-0 end-0 m-4 rounded-circle shadow d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#catalogModal" style="width: 30px; height: 30px; font-size: 1rem;">
  <i class="fas fa-plus"></i>
</button>

<!-- Improved Modal -->
<div class="modal fade" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="catalogModalLabel"><span class="Catalog"></span> <span class="text-muted-dashboard">ID00001</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <button type="button" class="btn btn-outline-custom"> <span class="folioSystem"></span> <strong class="folioId">0001</strong></button>
          <h5 class="mb-0 dataCapture"></h5>
        </div>
        <form id="catalogForm">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="numeroBroker" class="form-label brokerNumber"></label>
              <input type="text" id="numeroBroker" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="numeroProveedor" class="form-label supplierNumber"></label>
              <input type="text" id="numeroProveedor" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="productoOrigen" class="form-label productOrigin"></label>
              <input type="text" id="productoOrigen" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="productoNombreComercial" class="form-label commercialName"></label>
              <input type="text" id="productoNombreComercial" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="cantidad" class="form-label quantity"></label>
              <input type="number" id="cantidad" class="form-control" min="0">
            </div>
            <div class="col-md-6">
              <label for="precio" class="form-label price"></label>
              <input type="number" id="precio" class="form-control" step="0.01" min="0">
            </div>
            <div class="col-md-6">
              <label for="unidadMedida" class="form-label unitOfMeasure"></label>
              <input type="text" id="unidadMedida" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="supervisor" class="form-label supervisor"></label>
              <input type="text" id="supervisor" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="ejecutivo" class="form-label executive"></label>
              <input type="text" id="ejecutivo" class="form-control">
            </div>
          </div>
          <div class="mt-4 text-center">
            <button type="button" class="btn btn-danger btn-lg cancel" data-bs-dismiss="modal"></button>
            <button type="submit" class="btn btn-primary btn-lg create"></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
