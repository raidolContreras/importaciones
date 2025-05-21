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
            <div class="list-group list-group-flush list-tasks">
              <button class="btn btn-primary mx-2 my-3 addNew" id="addNewButton" data-bs-toggle="modal" data-bs-target="#catalogModal"></button>

              <div class="mx-2 my-3 row align-items-center">
                <label for="searchSelect" class="form-label col-auto mb-0 filterState"></label>
                <div class="col">
                  <select id="searchSelect" class="form-select">
                    <option value="">Todos</option>
                    <option value="Por Embarcar">Por Embarcar</option>
                    <option value="En Tránsito">En Tránsito</option>
                    <option value="Aduana">Aduana</option>
                    <option value="Punto de Inspección">Punto de Inspección</option>
                    <option value="Entregado">Entregado</option>
                    <option value="Cierre de Cuentas">Cierre de Cuentas</option>
                    <option value="Terminado">Terminado</option>
                  </select>
                </div>
                <label for="textFilter" class="form-label col-auto mb-0 search"></label>
                <div class="col">
                  <input type="text" id="textFilter" class="form-control searchInput">
                </div>
              </div>
              <!-- <button class="mt-1 mx-2 btn btn-success text-start" search="Por Embarcar">NC-01 / DR-4321 / ID00001</button> -->
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
            <div class="list-group list-group-flush list-pending">
              <div class="mx-2 my-3 row align-items-center">
                <label for="pendingSearchSelect" class="form-label col-auto mb-0 filterState"></label>
                <div class="col">
                  <select id="pendingSearchSelect" class="form-select">
                    <option value="">Todos</option>
                    <option value="Por Embarcar">Por Embarcar</option>
                    <option value="En Tránsito">En Tránsito</option>
                    <option value="Aduana">Aduana</option>
                    <option value="Punto de Inspección">Punto de Inspección</option>
                    <option value="Entregado">Entregado</option>
                    <option value="Cierre de Cuentas">Cierre de Cuentas</option>
                    <option value="Terminado">Terminado</option>
                  </select>
                </div>
                <label for="pendingTextFilter" class="form-label col-auto mb-0 search"></label>
                <div class="col">
                  <input type="text" id="pendingTextFilter" class="form-control searchInput">
                </div>
              </div>
              <!-- <button class="mt-1 mx-2 btn btn-warning text-start" search="Por Embarcar">NC-03 / DR-4321 / ID00001</button> -->
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

            <!-- <div class="list-group list-group-flush">
              <div class="d-flex justify-content-center align-items-center my-3">
                <hr class="flex-grow-1 me-3">
                <span class="text-muted-dashboard">Almacenadora</span>
                <hr class="flex-grow-1 ms-3">
              </div>
            </div>
            <div class="list-group list-group-flush">
              <button class="mt-1 mx-2 btn btn-info text-start">NC-04 / DR-4321 / ID00004</button>
              <button class="mt-1 mx-2 btn btn-info text-start">NC-04 / DR-4321 / ID00001</button>
            </div> -->
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Improved Modal -->
<div class="modal fade" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title asignate-ejecutive"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <button type="button" class="btn btn-outline-custom">
            <span class="folioSystem"></span>
            <strong class="folioId">0001</strong>
          </button>
          <h5 class="mb-0 dataCapture"></h5>
        </div>
        <form id="catalogForm">
          <div class="row g-3">
            <!-- # Broker -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text brokerNumber" style="min-width:180px;"></span>
                <select id="numeroBroker" class="form-select">
                  <option value="">Selecciona un Broker</option>
                  <option value="BRK001">BRK001 - Broker Uno</option>
                  <option value="BRK002">BRK002 - Broker Dos</option>
                  <option value="BRK003">BRK003 - Broker Tres</option>
                </select>
              </div>
            </div>
            <!-- # Proveedor -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text supplierNumber" style="min-width:180px;"></span>
                <select id="numeroProveedor" class="form-select" disabled>
                  <option value="">Selecciona un Proveedor</option>
                  <option value="PRV001">PRV001 - Proveedor Uno</option>
                  <option value="PRV002">PRV002 - Proveedor Dos</option>
                  <option value="PRV003">PRV003 - Proveedor Tres</option>
                </select>
              </div>
            </div>
            <!-- Producto + Origen -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text productOrigin" style="min-width:180px;"></span>
                <select id="productoOrigen" class="form-select" disabled>
                  <option value="">Selecciona Producto + Origen</option>
                  <option value="Nacional">Nacional</option>
                  <option value="Importado">Importado</option>
                </select>
              </div>
            </div>
            <!-- Nombre Comercial -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text commercialName" style="min-width:180px;"></span>
                <input type="text" id="productoNombreComercial" class="form-control" placeholder="Nombre Comercial" disabled>
              </div>
            </div>
            <!-- Cantidad y Unidad de Medida -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text quantity" style="min-width:120px;"></span>
                <input type="number" id="cantidad" class="form-control" min="0" placeholder="Ej. 1000" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text unitOfMeasure" style="min-width:140px;"></span>
                <select id="unidadMedida" class="form-select" disabled>
                  <option value="">Selecciona una Medida</option>
                  <option value="kg">Kilogramo</option>
                  <option value="ton">Tonelada</option>
                  <option value="lt">Litro</option>
                  <!-- Más opciones -->
                </select>
              </div>
            </div>
            <!-- Precio y Unidad de Moneda -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text price currencyTypeSelected" style="min-width:120px;">Mex$</span>
                <input type="text" id="precio" class="form-control" placeholder="Ej. 25.50" data-inputmask="'alias': 'currency', 'prefix': '', 'placeholder': '0', 'autoUnmask': true, 'removeMaskOnSubmit': true" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:140px;">Unidad de Moneda:</span>
                <select id="tipoMoneda" class="form-select" disabled>
                  <option selected value="MXN">MXN (Mex$)</option>
                  <option value="USD">USD ($)</option>
                  <option value="EUR">EUR (€)</option>
                  <option value="JPY">JPY (¥)</option>
                </select>
              </div>
            </div>
            <!-- Supervisor y Ejecutivo -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:120px;">Supervisor:</span>
                <select id="supervisor" class="form-select" disabled>
                  <option value="">Selecciona un Supervisor</option>
                  <option value="SUP001">SUP001 - Supervisor Uno</option>
                  <option value="SUP002">SUP002 - Supervisor Dos</option>
                  <option value="SUP003">SUP003 - Supervisor Tres</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text executive" style="min-width:140px;"></span>
                <select id="ejecutivo" class="form-select" disabled>
                  <option value="">Selecciona un Ejecutivo</option>
                  <option value="EJ001">EJ001 - Ejecutivo Uno</option>
                  <option value="EJ002">EJ002 - Ejecutivo Dos</option>
                  <option value="EJ003">EJ003 - Ejecutivo Tres</option>
                </select>
              </div>
            </div>
            <!-- Botón Guardar -->
            <div class="col-12 mt-4">
              <button type="submit" class="btn btn-primary btn-lg w-100 asignate-ejecutive"></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script>
  document.getElementById('searchSelect').addEventListener('change', function() {
    const selectedValue = this.value.toLowerCase();
    const buttons = document.querySelectorAll('.list-tasks button[search]');
    buttons.forEach(button => {
      const searchField = button.getAttribute('search').toLowerCase();
      if (selectedValue === "" || searchField.includes(selectedValue)) {
        button.style.display = '';
      } else {
        button.style.display = 'none';
      }
    });
  });

  document.getElementById('textFilter').addEventListener('input', function() {
    const filterText = this.value.toLowerCase();
    const buttons = document.querySelectorAll('.list-tasks button[search]');
    buttons.forEach(button => {
      const buttonText = button.textContent.toLowerCase();
      if (buttonText.includes(filterText)) {
        button.style.display = '';
      } else {
        button.style.display = 'none';
      }
    });
  });

  document.getElementById('pendingSearchSelect').addEventListener('change', function() {
    const selectedValue = this.value.toLowerCase();
    const buttons = document.querySelectorAll('.list-pending button[search]');
    buttons.forEach(button => {
      const searchField = button.getAttribute('search').toLowerCase();
      if (selectedValue === "" || searchField.includes(selectedValue)) {
        button.style.display = '';
      } else {
        button.style.display = 'none';
      }
    });
  });

  document.getElementById('pendingTextFilter').addEventListener('input', function() {
    const filterText = this.value.toLowerCase();
    const buttons = document.querySelectorAll('.list-pending button[search]');
    buttons.forEach(button => {
      const buttonText = button.textContent.toLowerCase();
      if (buttonText.includes(filterText)) {
        button.style.display = '';
      } else {
        button.style.display = 'none';
      }
    });
  });

  $('#precio').inputmask({
    alias: 'currency',
    prefix: '',
    groupSeparator: ',',
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    removeMaskOnSubmit: true
  });

  document.getElementById('tipoMoneda').addEventListener('change', function() {
    const selectedValue = this.value;
    const currencyTypeSelected = document.querySelector('.currencyTypeSelected');
    if (selectedValue === 'MXN') {
      currencyTypeSelected.textContent = 'Mex$';
    } else if (selectedValue === 'USD') {
      currencyTypeSelected.textContent = '$';
    } else if (selectedValue === 'EUR') {
      currencyTypeSelected.textContent = '€';
    } else if (selectedValue === 'JPY') {
      currencyTypeSelected.textContent = '¥';
    }
  });

  function getDataToNew() {
    $.ajax({
      url: 'controller/actions.controller.php',
      type: 'POST',
      data: {
        action: 'getDataToNew'
      },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
        } else {
          console.error('Error fetching data:', response.message);
        }
      },
      error: function(xhr, status, error) {
        console.error('AJAX error:', error);
      }
    });
  }
</script>