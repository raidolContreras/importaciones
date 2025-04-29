<style>
    @media (min-width: 992px) {
        .card.full-height {
            height: calc(100vh - 3rem); /* Ajusta según el padding/margen superior */
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
