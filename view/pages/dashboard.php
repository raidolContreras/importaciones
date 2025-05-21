<!-- Dashboard Cards -->
<div class="container-fluid py-4 d-flex flex-column">
  <div class="row g-4 flex-grow-1">

    <!-- CARD TAREAS -->
    <div class="col-12 col-md-6 col-lg-4 d-flex">
      <div class="card shadow border-0 rounded-4 flex-fill d-flex flex-column">
        <div class="card-header d-flex flex-column justify-content-center align-items-center bg-success text-white p-4"
          style="height: 130px;">
          <i class="fas fa-tasks fa-2x mb-1"></i>
          <h4 class="card-title mb-0 tasks">Tareas</h4>
        </div>
        <div class="card-body d-flex flex-column p-0 overflow-hidden">
          <div class="flex-grow-1 overflow-auto">
            <div class="list-group list-group-flush list-tasks">
              <button class="btn btn-primary mx-2 my-3 addNew" id="addNewButton" data-bs-toggle="modal"
                data-bs-target="#catalogModal">
                Nueva Orden
              </button>
              <div class="mx-2 my-3 row align-items-center">
                <label for="searchSelect" class="form-label col-auto mb-0">Estado:</label>
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
                <label for="textFilter" class="form-label col-auto mb-0">Buscar:</label>
                <div class="col">
                  <input type="text" id="textFilter" class="form-control searchInput" placeholder="Filtrar texto">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD PENDIENTES -->
    <div class="col-12 col-md-6 col-lg-4 d-flex">
      <div class="card full-height shadow border-0 rounded-4 flex-fill d-flex flex-column">
        <div class="card-header d-flex flex-column justify-content-center align-items-center bg-warning text-dark p-4"
          style="height: 130px;">
          <i class="fas fa-clock fa-2x mb-1"></i>
          <h4 class="card-title mb-0 pending">Pendientes</h4>
        </div>
        <div class="card-body d-flex flex-column p-0 overflow-hidden">
          <div class="flex-grow-1 overflow-auto">
            <div class="list-group list-group-flush list-pending">

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD RECORDATORIOS -->
    <div class="col-12 col-md-6 col-lg-4 d-flex">
      <div class="card full-height shadow border-0 rounded-4 flex-fill d-flex flex-column">
        <div class="card-header d-flex flex-column justify-content-center align-items-center bg-primary text-white p-4"
          style="height: 130px;">
          <i class="fas fa-bell fa-2x mb-1"></i>
          <h4 class="card-title mb-0 reminders">Recordatorios</h4>
        </div>
        <div class="card-body d-flex flex-column p-0 overflow-hidden">
          <div class="flex-grow-1 overflow-auto list-reminders">
            <!-- Aquí irán los recordatorios -->
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Modal de Catálogo / Orden -->
<div class="modal fade" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title asignate-ejecutive">Nueva Orden</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <button type="button" class="btn btn-outline-custom">
            Folio:
            <strong class="folioId"></strong>
          </button>
          <h5 class="mb-0 dataCapture">Captura de Datos</h5>
        </div>
        <form id="catalogForm">
          <div class="row g-3">
            <!-- Broker -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Broker</span>
                <select id="numeroBroker" class="form-select" disabled>
                  <option value="">Selecciona un Broker</option>
                </select>
              </div>
            </div>
            <!-- Proveedor -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Proveedor</span>
                <select id="numeroProveedor" class="form-select" disabled>
                  <option value="">Selecciona un Proveedor</option>
                </select>
              </div>
            </div>
            <!-- Producto + Origen -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Producto + Origen</span>
                <select id="productoOrigen" class="form-select" disabled>
                  <option value="">Selecciona Producto + Origen</option>
                </select>
              </div>
            </div>
            <!-- Nombre Comercial -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Nombre Comercial</span>
                <input type="text" id="productoNombreComercial" class="form-control" disabled>
              </div>
            </div>
            <!-- Cantidad -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:120px;">Cantidad</span>
                <input type="number" id="cantidad" class="form-control" min="0" placeholder="Ej. 1000" disabled>
              </div>
            </div>
            <!-- Unidad de Medida -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:140px;">Unidad</span>
                <select id="unidadMedida" class="form-select" disabled>
                  <option value="">Selecciona una Medida</option>
                  <option value="kg">Kilogramo</option>
                  <option value="ton">Tonelada</option>
                  <option value="lt">Litro</option>
                </select>
              </div>
            </div>
            <!-- Precio -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text price currencyTypeSelected" style="min-width:120px;">Mex$</span>
                <input type="text" id="precio" class="form-control" placeholder="Ej. 25.50" disabled>
              </div>
            </div>
            <!-- Moneda -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:140px;">Moneda</span>
                <select id="tipoMoneda" class="form-select" disabled>
                  <option value="MXN" selected>MXN</option>
                  <option value="USD">USD</option>
                  <option value="EUR">EUR</option>
                  <option value="JPY">JPY</option>
                </select>
              </div>
            </div>
            <!-- Supervisor -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:120px;">Supervisor</span>
                <select id="supervisor" class="form-select">
                </select>
              </div>
            </div>
            <!-- Ejecutivo -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:140px;">Ejecutivo</span>
                <select id="ejecutivo" class="form-select">
                </select>
              </div>
            </div>
            <!-- Guardar -->
            <div class="col-12 mt-4">
              <button type="submit" class="btn btn-primary btn-lg w-100 asignate-ejecutive">Guardar Orden</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Inputmask -->
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<!-- Lógica JS Dinámica -->
<script>
  $(function () {
    const brokerSelect = $('#numeroBroker');
    const providerSelect = $('#numeroProveedor');
    const productSelect = $('#productoOrigen');
    const commercialInput = $('#productoNombreComercial');
    const qtyInput = $('#cantidad');
    const unitSelect = $('#unidadMedida');
    const priceInput = $('#precio');
    const currencySelect = $('#tipoMoneda');
    const folioLabel = $('.folioId');
    const supervisorSelect = $('#supervisor');
    const ejecutivoSelect = $('#ejecutivo');

    let productOrigins = [];

    // Inicializar filtros de tabla (sin cambios respecto al original)
    $('#searchSelect, #pendingSearchSelect').on('change', function () {
      const sel = $(this).val().toLowerCase();
      const listClass = this.id === 'searchSelect' ? '.list-tasks' : '.list-pending';
      $(`${listClass} button[search]`).each(function () {
        const txt = $(this).attr('search').toLowerCase();
        $(this).toggle(sel === '' || txt.includes(sel));
      });
    });
    $('#textFilter, #pendingTextFilter').on('input', function () {
      const txt = $(this).val().toLowerCase();
      const listClass = this.id === 'textFilter' ? '.list-tasks' : '.list-pending';
      $(`${listClass} button[search]`).each(function () {
        $(this).toggle($(this).text().toLowerCase().includes(txt));
      });
    });

    // Máscara de precio
    priceInput.inputmask({
      alias: 'currency', prefix: '', groupSeparator: ',', autoGroup: true,
      digits: 2, digitsOptional: false, placeholder: '0', rightAlign: false,
      removeMaskOnSubmit: true
    });

    // Abrir modal y cargar datos
    $('#addNewButton').on('click', function () {
      $.post('controller/actions.controller.php', { action: 'initOrder' }, function (data) {
        if (data.status === 'success') {
          // Folio
          folioLabel.text(String(data.next_order_id).padStart(4, '0'));

          // Brokers
          brokerSelect.prop('disabled', false).empty().append('<option value="">Selecciona un Broker</option>');
          data.brokers.forEach(b => {
            if (b.broker_isActive) {
              brokerSelect.append(
                `<option value="${b.broker_id}"
                         data-phone="${b.broker_phone}"
                         data-email="${b.broker_email}">
                  ${b.broker_id} - ${b.broker_name}
                </option>`
              );
            }
          });

          // Proveedores
          providerSelect.prop('disabled', false).empty().append('<option value="">Selecciona un Proveedor</option>');
          data.providers.forEach(p => {
            if (p.provider_isActive) {
              providerSelect.append(
                `<option value="${p.provider_id}"
                         data-phone="${p.provider_phone}"
                         data-email="${p.provider_email}">
                  ${p.provider_id} - ${p.provider_name}
                </option>`
              );
            }
          });

          // Productos-Origen
          productOrigins = data.product_origins;
          productSelect.prop('disabled', true).empty().append('<option value="">Selecciona Producto + Origen</option>');

          // Reset campos dependientes
          commercialInput.val('').prop('disabled', true);
          qtyInput.val('').prop('disabled', true);
          unitSelect.val('').prop('disabled', true);
          priceInput.val('').prop('disabled', true);
          currencySelect.val('MXN').prop('disabled', true);
          $('.currencyTypeSelected').text('Mex$');

          // Supervisores
          supervisorSelect
            .prop('disabled', false)
            .empty()
            .append('<option value="">Selecciona un Supervisor</option>');
          data.supervisores.forEach(s => {
            supervisorSelect.append(
              `<option value="${s.id_Users}">
                ${s.id_Users} – ${s.Username}
              </option>`
            );
          });

          // Ejecutivos
          ejecutivoSelect
            .prop('disabled', false)
            .empty()
            .append('<option value="">Selecciona un Ejecutivo</option>');
          data.ejecutivos.forEach(e => {
            ejecutivoSelect.append(
              `<option value="${e.id_Users}">
                ${e.id_Users} – ${e.Username}
              </option>`
            );
          });
        }
      }, 'json')
        .fail(console.error);
    });

    // Al cambiar broker, filtrar productos
    brokerSelect.on('change', function () {
      const brokerId = +this.value;
      productSelect.prop('disabled', false).empty().append('<option value="">Selecciona Producto + Origen</option>');
      productOrigins
        .filter(po => po.broker_id === brokerId)
        .forEach(po => {
          productSelect.append(
            `<option value="${po.id}"
                     data-comercial="${po.nombre_comercial}"
                     data-unidad="${po.unidad_inventariable}">
               ${po.producto} – ${po.pais_origen}
            </option>`
          );
        });
    });

    // Al seleccionar producto, autocompletar y habilitar campos
    productSelect.on('change', function () {
      const opt = $(this).find('option:selected');
      const nombre = opt.data('comercial') || '';
      const unidad = opt.data('unidad') || '';
      commercialInput.val(nombre).prop('disabled', !nombre);
      qtyInput.prop('disabled', !nombre);
      unitSelect.val(unidad).prop('disabled', !unidad);
      priceInput.prop('disabled', !nombre);
      currencySelect.prop('disabled', !nombre);
    });

    // Cambiar símbolo de moneda
    currencySelect.on('change', function () {
      const symMap = { MXN: 'Mex$', USD: '$', EUR: '€', JPY: '¥' };
      $('.currencyTypeSelected').text(symMap[this.value] || '');
    });

    // Enviar formulario de nueva orden por AJAX
    $('#catalogForm').on('submit', function (e) {
      e.preventDefault();

      // Preparamos los datos a enviar
      const payload = {
        action: 'saveOrder',
        order_id: parseInt(folioLabel.text(), 10),           // Folio que ves en pantalla (sin ceros a la izquierda)
        broker_id: brokerSelect.val(),                       // ID de broker
        provider_id: providerSelect.val(),                   // ID de proveedor
        product_origin_id: productSelect.val(),              // ID de producto+origen
        commercial_name: commercialInput.val(),              // Nombre comercial
        quantity: qtyInput.val(),                            // Cantidad
        unit: unitSelect.val(),                              // Unidad
        price: priceInput.inputmask('unmaskedvalue'),        // Precio sin máscara
        currency: currencySelect.val(),                      // Moneda
        supervisor_id: supervisorSelect.val(),               // ID de supervisor
        executive_id: ejecutivoSelect.val()                  // ID de ejecutivo
      };

      // Opcional: desactivar botón de guardar para evitar dobles clicks
      const $btn = $(this).find('button[type="submit"]');
      $btn.prop('disabled', true).text('Guardando...');

      $.ajax({
        url: 'controller/actions.controller.php',
        method: 'POST',
        data: payload,
        dataType: 'json',
        success: function (res) {
          if (res.status === 'success') {
            // Cerrar modal y notificar
            $('#catalogModal').modal('hide');
            toastr.success('Orden guardada correctamente');
            // Aquí podrías recargar tu lista de tareas o actualizar la vista
          } else {
            toastr.error(res.message || 'Error al guardar la orden');
          }
        },
        error: function (xhr, status, error) {
          toastr.error('Error en la petición: ' + (xhr.responseText || error));
        },
        complete: function () {
          // Reactivar botón
          $btn.prop('disabled', false).text('Guardar Orden');
        }
      });
    });

    loadPendienting();
  });

  function loadPendienting() {
    $.ajax({
      url: 'controller/actions.controller.php',
      method: 'POST',
      data: { action: 'loadPendienting' },
      dataType: 'json',
      success: function (data) {
        if (data.status === 'success') {
          const list = $('.list-pending');
          list.empty();
          list.append(
            `<div class="mx-2 my-3 row align-items-center">
                <label for="pendingSearchSelect" class="form-label col-auto mb-0">Estado:</label>
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
                <label for="pendingTextFilter" class="form-label col-auto mb-0">Buscar:</label>
                <div class="col">
                  <input type="text" id="pendingTextFilter" class="form-control searchInput"
                    placeholder="Filtrar texto">
                </div>
              </div>`
          )
          if (Array.isArray(data.data) && data.data.length > 0) {
            data.data.forEach(p => {
              // Puedes personalizar el texto mostrado según tus necesidades
              const text = `${p.nombre_comercial} (${p.cantidad} ${p.unidad_medida_id}) - ${p.moneda} ${parseFloat(p.precio_unitario).toLocaleString()}`;
              const search = [
                p.nombre_comercial,
                p.cantidad,
                p.moneda,
                p.precio_unitario,
                p.creado_en,
                p.actualizado_en
              ].join(' ').toLowerCase();
              list.append(
                `<button class="mt-1 mx-2 btn btn-success text-start" search="${search}">
            ${text}
          </button>`
              );
            });
          } else {
            list.html('<div class="w-100 text-center py-5 text-muted">No pending orders found.</div>');
          }
        } else {
          $('.list-pending').html('<div class="w-100 text-center py-5 text-muted">No pending orders found.</div>');
        }
      },
      error: function (xhr, status, error) {
        console.error('Error al cargar pendientes:', error);
      }
    });
  }

  function loadReminders() {
    // Aquí iría la lógica para cargar los recordatorios
  }
</script>