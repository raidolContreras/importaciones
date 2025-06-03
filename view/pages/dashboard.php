<!-- DASHBOARD CARDS (sin cambios) -->
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

<!-- MODAL CATÁLOGO / ORDEN -->
<div class="modal fade" id="catalogModal" tabindex="-1" aria-labelledby="catalogModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title asignate-ejecutive">Nueva Orden</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Cabecera con folio y datos generales -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <button type="button" class="btn btn-outline-custom">
            Folio:
            <strong class="folioId"></strong>
          </button>
          <h5 class="mb-0 dataCapture">Captura de Datos</h5>
        </div>

        <form id="catalogForm">
          <div class="row g-3 mb-4">
            <!-- Broker -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Broker</span>
                <select id="numeroBroker" class="form-select" required disabled>
                  <option value="">Selecciona un Broker</option>
                </select>
              </div>
            </div>
            <!-- Proveedor -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Proveedor</span>
                <select id="numeroProveedor" class="form-select" required disabled>
                  <option value="">Selecciona un Proveedor</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Supervisor, Ejecutivo -->
          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:120px;">Supervisor</span>
                <select id="supervisor" name="supervisor" class="form-select" required></select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:140px;">Ejecutivo</span>
                <select id="ejecutivo" name="ejecutivo" class="form-select" required></select>
              </div>
            </div>
          </div>

          <!-- === Bloque de Productos en tarjetas === -->
          <div id="productListContainer">
            <!-- Tarjeta para Producto 1 (índice “1”) -->
            <div class="card mb-3 product-card" data-index="1">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6 class="card-title mb-0">Producto 1</h6>
                  <button type="button" class="btn-close remove-product-btn" aria-label="Eliminar producto"></button>
                </div>
                <div class="row g-3 product-group" id="product-group-1">
                  <!-- Producto + Origen -->
                  <div class="col-6">
                    <div class="input-group">
                      <span class="input-group-text" style="min-width:180px;">Producto + Origen</span>
                      <select id="productoOrigen1" class="form-select" required disabled>
                        <option value="">Selecciona Producto + Origen</option>
                      </select>
                    </div>
                  </div>
                  <!-- Nombre Comercial -->
                  <div class="col-6">
                    <div class="input-group">
                      <span class="input-group-text" style="min-width:180px;">Nombre Comercial</span>
                      <select id="productoNombreComercial1" class="form-select" required disabled>
                        <option value="">Selecciona Nombre Comercial</option>
                      </select>
                    </div>
                  </div>
                  <!-- Cantidad -->
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-text" style="min-width:120px;">Cantidad</span>
                      <input type="number" id="cantidad1" class="form-control" min="0" placeholder="Ej. 1000" required disabled>
                    </div>
                  </div>
                  <!-- Unidad de Medida -->
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-text" style="min-width:140px;">Unidad</span>
                      <select id="unidadMedida1" class="form-select" required disabled>
                        <option value="">Selecciona Unidad</option>
                      </select>
                    </div>
                  </div>
                  <!-- Precio -->
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-text price currencyTypeSelected" style="min-width:120px;">Mex$</span>
                      <input type="text" id="precio1" class="form-control" placeholder="Ej. 25.50" required disabled>
                    </div>
                  </div>
                  <!-- Moneda -->
                  <div class="col-md-3">
                    <div class="input-group">
                      <span class="input-group-text" style="min-width:140px;">Moneda</span>
                      <select id="tipoMoneda1" class="form-select" required disabled>
                        <option value="MXN" selected>MXN</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="JPY">JPY</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Botón para agregar nueva tarjeta de producto -->
          <div class="d-grid gap-2 mb-3">
            <button type="button" id="addProductBtn" class="btn btn-outline-primary" disabled>
              ＋ Agregar Producto
            </button>
          </div>

          <!-- Botón de envío de toda la Orden -->
          <div class="col-12">
            <button type="submit" id="submitOrder" class="btn btn-primary btn-lg w-100 asignate-ejecutive">
              Guardar Orden
            </button>
          </div>
        </form>
        <!-- === Fin del bloque modificado === -->
      </div>
    </div>
  </div>
</div>

<!-- Inputmask -->
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<!-- Script modificado para tarjetas de producto con nombre comercial como select y sin duplicados -->
<script>
  $(document).ready(function() {
    // === Variables globales ===
    let orderData = null;
    let productCount = 1;

    // === 1. Función para inicializar el formulario con datos del servidor ===
    function initOrderForm(data) {
      orderData = data;
      productCount = 1;

      // 1.1. Folio
      $('.folioId').text(String(data.next_order_id).padStart(4, '0'));

      // Selects principales
      const brokerSelect     = $('#numeroBroker');
      const providerSelect   = $('#numeroProveedor');
      const supervisorSelect = $('#supervisor');
      const ejecutivoSelect  = $('#ejecutivo');

      // 1.2. Poblar Brokers
      brokerSelect.empty().append('<option value="">Selecciona un Broker</option>');
      if (Array.isArray(data.brokers)) {
        data.brokers.forEach(broker => {
          brokerSelect.append(
            `<option value="${broker.broker_id}">${broker.broker_name}</option>`
          );
        });
      }
      brokerSelect.prop('disabled', false);

      // 1.3. Resetear campos del Producto 1
      resetProductFields(1);
      providerSelect
        .empty()
        .append('<option value="">Selecciona un Proveedor</option>')
        .prop('disabled', true);

      // 1.4. Poblar Supervisores y Ejecutivos
      supervisorSelect
        .prop('disabled', true)
        .empty()
        .append('<option value="">Selecciona un Supervisor</option>');
      if (Array.isArray(data.supervisores)) {
        data.supervisores.forEach(sup => {
          supervisorSelect.append(`<option value="${sup.id_Users}">${sup.Username}</option>`);
        });
      }
      supervisorSelect.prop('disabled', false);

      ejecutivoSelect
        .prop('disabled', true)
        .empty()
        .append('<option value="">Selecciona un Ejecutivo</option>');
      if (Array.isArray(data.ejecutivos)) {
        data.ejecutivos.forEach(ejec => {
          ejecutivoSelect.append(`<option value="${ejec.id_Users}">${ejec.Username}</option>`);
        });
      }
      ejecutivoSelect.prop('disabled', false);

      // 1.5. Poner la lista de productos + origen en la tarjeta 1 (sin duplicados)
      populateProductOrigins(1);

      // 1.6. Ocultar botón eliminar en el Producto 1 (no se puede eliminar el primero)
      $('.product-card[data-index="1"] .remove-product-btn').hide();

      // 1.7. Configurar habilitación del botón “＋ Agregar Producto” para el Producto 1
      configureAddButtonForProduct(1);
    }

    // === 2. Función para poblar el select “Producto + Origen” sin duplicados ni filtro por broker ===
    function populateProductOrigins(index) {
      const $prodOriginSelect = $(`#productoOrigen${index}`);
      $prodOriginSelect.empty().append('<option value="">Selecciona Producto + Origen</option>');
      const seen = new Set();
      if (Array.isArray(orderData.product_origins)) {
        orderData.product_origins.forEach(prod => {
          const comboKey = `${prod.producto}|${prod.pais_origen}`;
          if (!seen.has(comboKey)) {
            seen.add(comboKey);
            $prodOriginSelect.append(
              `<option value="${comboKey}" data-producto="${prod.producto}">
                ${prod.producto} (${prod.pais_origen})
              </option>`
            );
          }
        });
      }
      $prodOriginSelect.prop('disabled', false);

      // Vincular evento de cambio para autocompletar “Nombre Comercial”
      $prodOriginSelect.off('change').on('change', function() {
        const productoName = $(this).find('option:selected').attr('data-producto') || '';
        populateNombreComercial(index, productoName);
      });
    }

    // === 3. Función para poblar “Nombre Comercial” basado en productoName ===
    function populateNombreComercial(index, productoName) {
      const $nombreSelect = $(`#productoNombreComercial${index}`);
      $nombreSelect.empty().append('<option value="">Selecciona Nombre Comercial</option>');
      const seenNames = new Set();
      if (Array.isArray(orderData.product_origins)) {
        orderData.product_origins.forEach(prod => {
          if (prod.producto === productoName) {
            const nombre = prod.nombre_comercial;
            if (!seenNames.has(nombre)) {
              seenNames.add(nombre);
              $nombreSelect.append(`<option value="${nombre}">${nombre}</option>`);
            }
          }
        });
      }
      $nombreSelect.prop('disabled', false);
    }

    // === 4. Resetear todos los campos de un producto dado ===
    function resetProductFields(index) {
      $(`#productoOrigen${index}`)
        .empty()
        .append('<option value="">Selecciona Producto + Origen</option>')
        .prop('disabled', true);

      $(`#productoNombreComercial${index}`)
        .empty()
        .append('<option value="">Selecciona Nombre Comercial</option>')
        .prop('disabled', true);

      $(`#unidadMedida${index}`)
        .empty()
        .append('<option value="">Selecciona Unidad</option>')
        .prop('disabled', true);

      $(`#cantidad${index}`).prop('disabled', true).val('');
      $(`#precio${index}`).prop('disabled', true).val('');
      $(`#tipoMoneda${index}`).prop('disabled', true).val('MXN');
    }

    // === 5. Verificar si todos los campos de un producto están completos ===
    function checkProductComplete(index) {
      let allFilled = true;
      const selectors = [
        `#productoOrigen${index}`,
        `#productoNombreComercial${index}`,
        `#cantidad${index}`,
        `#unidadMedida${index}`,
        `#precio${index}`,
        `#tipoMoneda${index}`
      ];
      selectors.forEach(sel => {
        if (!$(sel).val()) {
          allFilled = false;
        }
      });
      // Si es el último producto, habilita/deshabilita el botón “＋ Agregar Producto”
      if (index === productCount) {
        $('#addProductBtn').prop('disabled', !allFilled);
      }
    }

    // === 6. Enlazar eventos de comprobación de completitud para un producto dado ===
    function bindCheckForProduct(index) {
      const selectors = [
        `#productoOrigen${index}`,
        `#productoNombreComercial${index}`,
        `#cantidad${index}`,
        `#unidadMedida${index}`,
        `#precio${index}`,
        `#tipoMoneda${index}`
      ];
      selectors.forEach(sel => {
        const $el = $(sel);
        if ($el.is('select')) {
          $el.off('change').on('change', () => checkProductComplete(index));
        } else {
          $el.off('input').on('input', () => checkProductComplete(index));
        }
      });
      // Revisar inmediatamente
      checkProductComplete(index);
    }

    // === 7. Deshabilitar el botón “＋ Agregar Producto” y enlazar comprobación para el producto dado ===
    function configureAddButtonForProduct(index) {
      $('#addProductBtn').prop('disabled', true);
      bindCheckForProduct(index);
    }

    // === 8. Agregar una nueva tarjeta de producto dinámicamente ===
    function addNewProductCard() {
      productCount++;
      const newIndex = productCount;

      // 8.1. Generar HTML de la nueva tarjeta
      const cardHtml = `
      <div class="card mb-3 product-card" data-index="${newIndex}">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="card-title mb-0">Producto ${newIndex}</h6>
            <button type="button" class="btn-close remove-product-btn" aria-label="Eliminar producto"></button>
          </div>
          <div class="row g-3 product-group" id="product-group-${newIndex}">
            <!-- Producto + Origen -->
            <div class="col-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Producto + Origen</span>
                <select id="productoOrigen${newIndex}" class="form-select" required disabled>
                  <option value="">Selecciona Producto + Origen</option>
                </select>
              </div>
            </div>
            <!-- Nombre Comercial -->
            <div class="col-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Nombre Comercial</span>
                <select id="productoNombreComercial${newIndex}" class="form-select" required disabled>
                  <option value="">Selecciona Nombre Comercial</option>
                </select>
              </div>
            </div>
            <!-- Cantidad -->
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-text" style="min-width:120px;">Cantidad</span>
                <input type="number" id="cantidad${newIndex}" class="form-control" min="0" placeholder="Ej. 1000" required disabled>
              </div>
            </div>
            <!-- Unidad de Medida -->
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-text" style="min-width:140px;">Unidad</span>
                <select id="unidadMedida${newIndex}" class="form-select" required disabled>
                  <option value="">Selecciona Unidad</option>
                </select>
              </div>
            </div>
            <!-- Precio -->
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-text price currencyTypeSelected" style="min-width:120px;">Mex$</span>
                <input type="text" id="precio${newIndex}" class="form-control" placeholder="Ej. 25.50" required disabled>
              </div>
            </div>
            <!-- Moneda -->
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-text" style="min-width:140px;">Moneda</span>
                <select id="tipoMoneda${newIndex}" class="form-select" required disabled>
                  <option value="MXN" selected>MXN</option>
                  <option value="USD">USD</option>
                  <option value="EUR">EUR</option>
                  <option value="JPY">JPY</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      `;
      // 8.2. Insertar la nueva tarjeta antes del botón “＋ Agregar Producto”
      $('#addProductBtn').before(cardHtml);

      // 8.3. Poblar “Producto + Origen” en esta tarjeta (sin duplicados)
      populateProductOrigins(newIndex);

      // 8.4. Inicializar unidades (sin depender de broker ni proveedor)
      initializeUnits(newIndex);

      // 8.5. Habilitar campos restantes
      $(`#productoNombreComercial${newIndex}`).prop('disabled', false);
      $(`#cantidad${newIndex}`).prop('disabled', false).val('');
      $(`#precio${newIndex}`).prop('disabled', false).val('');
      $(`#tipoMoneda${newIndex}`).prop('disabled', false).val('MXN');

      // 8.6. Configurar botón “＋ Agregar Producto” deshabilitado hasta completar el producto actual
      configureAddButtonForProduct(newIndex);

      // 8.7. Adjuntar manejador para botón eliminar en esta tarjeta
      attachRemoveHandlers();

      // 8.8. Scroll para ver la nueva tarjeta (opcional)
      $('html, body').animate({
        scrollTop: $(`.product-card[data-index="${newIndex}"]`).offset().top - 100
      }, 300);
    }

    // === 9. Poblar unidades (sin depender de broker ni proveedor) ===
    function initializeUnits(index) {
      const $unidadSelect = $(`#unidadMedida${index}`);
      $unidadSelect.empty().append('<option value="">Selecciona Unidad</option>');
      if (Array.isArray(orderData.units)) {
        orderData.units.forEach(unit => {
          $unidadSelect.append(
            `<option value="${unit.unidad_medida_id}">
                ${unit.nameUM}
            </option>`
          );
        });
      }
      $unidadSelect.prop('disabled', false);
    }

    // === 10. Al cambiar el Broker: solo habilitar select, no impacta productoOrigen ===
    $('#numeroBroker').off('change').on('change', function() {
      const selectedBrokerId = $(this).val();

      // Reset Proveedor
      $('#numeroProveedor')
        .empty()
        .append('<option value="">Selecciona un Proveedor</option>')
        .prop('disabled', true);

      if (!selectedBrokerId) return;

      // Cargar proveedores
      const providerSelect = $('#numeroProveedor');
      if (Array.isArray(orderData.providers)) {
        orderData.providers.forEach(provider => {
          providerSelect.append(
            `<option value="${provider.provider_id}">${provider.provider_name}</option>`
          );
        });
      }
      providerSelect.prop('disabled', false);
    });

    // === 11. Al cambiar Proveedor: habilitar “Producto + Origen” y “Unidad” en la tarjeta 1 ===
    $('#numeroProveedor').off('change').on('change', function() {
      const selectedProviderId = $(this).val();

      // Reset Producto 1
      resetProductFields(1);

      if (!selectedProviderId) return;

      // Poblar “Producto + Origen” en índice 1 (sin filtrado)
      populateProductOrigins(1);
      // Poblar unidades en índice 1
      initializeUnits(1);

      // Habilitar el resto de inputs para Producto 1
      $('#productoNombreComercial1').prop('disabled', false);
      $('#cantidad1').prop('disabled', false).val('');
      $('#precio1').prop('disabled', false).val('');
      $('#tipoMoneda1').prop('disabled', false).val('MXN');
    });

    // === 12. Evento para habilitar “＋ Agregar Producto” al completar campos del Producto 1 ===
    bindCheckForProduct(1);

    // === 13. Click en “＋ Agregar Producto” ===
    $('#addProductBtn').on('click', function() {
      addNewProductCard();
    });

    // === 14. Envío del formulario: recopilar todos los productos y mandarlos por AJAX ===
    $('#catalogForm').on('submit', function(event) {
      event.preventDefault();

      // 14.1. Datos generales
      const formData = {
        numeroBroker: $('#numeroBroker').val(),
        numeroProveedor: $('#numeroProveedor').val(),
        supervisor: $('#supervisor').val(),
        ejecutivo: $('#ejecutivo').val(),
        action: 'createOrdenCompra'
      };

      // 14.2. Recolectar productos
      const products = [];
      for (let i = 1; i <= productCount; i++) {
        const originCombo = $(`#productoOrigen${i}`).val();
        if (originCombo) {
          const comercial = $(`#productoNombreComercial${i}`).val();
          const cantidad  = $(`#cantidad${i}`).val();
          const unidad    = $(`#unidadMedida${i}`).val();
          const precio    = $(`#precio${i}`).val();
          const moneda    = $(`#tipoMoneda${i}`).val();
          products.push({
            producto_origen_key: originCombo,
            nombre_comercial: comercial,
            cantidad: cantidad,
            unidad_medida_id: unidad,
            precio: precio,
            moneda: moneda
          });
        }
      }
      formData.products = JSON.stringify(products);

      // 14.3. AJAX para guardar orden
      $.ajax({
        url: 'controller/actions.controller.php',
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            // Reset general, dejar solo Producto 1 en blanco
            $('#catalogForm')[0].reset();
            // Elimina todas las tarjetas excepto la 1
            $('#productListContainer .product-card').not('[data-index="1"]').remove();
            productCount = 1;

            // Reset Producto 1
            resetProductFields(1);
            $('#productoOrigen1').empty().append('<option value="">Selecciona Producto + Origen</option>');
            $('#productoNombreComercial1').empty().append('<option value="">Selecciona Nombre Comercial</option>');
            $('#unidadMedida1').empty().append('<option value="">Selecciona Unidad</option>');
            // Reset selects Brokers/Proveedores/Supervisor/Ejecutivo
            $('#numeroBroker').prop('disabled', true).empty().append('<option value="">Selecciona un Broker</option>');
            $('#numeroProveedor').prop('disabled', true).empty().append('<option value="">Selecciona un Proveedor</option>');
            $('#supervisor').prop('disabled', true).empty().append('<option value="">Selecciona un Supervisor</option>');
            $('#ejecutivo').prop('disabled', true).empty().append('<option value="">Selecciona un Ejecutivo</option>');

            $('#catalogModal').modal('hide');
            alert('¡Orden guardada correctamente!');
          } else {
            console.error('Error al guardar la orden:', response.message);
          }
        },
        error: function(xhr, status, error) {
          console.error('Error al guardar la orden:', error);
        }
      });
    });

    // === 15. Al abrir el modal (click en “Nueva Orden”), inicializar ===
    $('#addNewButton').on('click', function() {
      $.ajax({
        url: 'controller/actions.controller.php',
        method: 'POST',
        data: { action: 'initOrder' },
        dataType: 'json',
        success: function(data) {
          if (data.status === 'success') {
            // Eliminar tarjetas adicionales (por si se reabrió el modal)
            $('#productListContainer .product-card').not('[data-index="1"]').remove();
            productCount = 1;

            // Asegurar que la tarjeta 1 tenga sus títulos/ids correctos
            $('.product-card[data-index="1"] .card-title').text('Producto 1');
            resetProductFields(1);
            $('#productoOrigen1').empty().append('<option value="">Selecciona Producto + Origen</option>');
            $('#productoNombreComercial1').empty().append('<option value="">Selecciona Nombre Comercial</option>');
            $('#unidadMedida1').empty().append('<option value="">Selecciona Unidad</option>');
            // Ocultar botón eliminar en la tarjeta 1
            $('.product-card[data-index="1"] .remove-product-btn').hide();

            // Llamar a initOrderForm
            initOrderForm(data);
          } else {
            console.error('Error al inicializar orden:', data);
          }
        },
        error: function(xhr, status, error) {
          console.error('Error en la llamada AJAX:', error);
        }
      });
    });

    // === 16. Función para adjuntar manejadores “Eliminar producto” ===
    function attachRemoveHandlers() {
      $('.remove-product-btn').off('click').on('click', function() {
        const card = $(this).closest('.product-card');
        card.remove();
        reindexAllProducts();
      });
    }

    // === 17. Función para reindexar todas las tarjetas tras una eliminación ===
    function reindexAllProducts() {
      const cards = $('#productListContainer .product-card');
      productCount = cards.length;
      // Iterar en orden de aparición
      cards.each(function(idx) {
        const newIndex = idx + 1;
        const $card = $(this);
        $card.attr('data-index', newIndex);
        // Actualizar título
        $card.find('.card-title').text(`Producto ${newIndex}`);
        // Ocultar botón eliminar en el primer card
        if (newIndex === 1) {
          $card.find('.remove-product-btn').hide();
        } else {
          $card.find('.remove-product-btn').show();
        }
        // Para cada elemento con id, reemplazar número final por newIndex
        $card.find('[id]').each(function() {
          const oldId = $(this).attr('id');
          const newId = oldId.replace(/\d+$/, newIndex);
          $(this).attr('id', newId);
        });
        // Actualizar el contenedor de group
        $card.find('.product-group').attr('id', `product-group-${newIndex}`);

        // Reasignar select “Producto + Origen”
        populateProductOrigins(newIndex);
        // Reasignar “Nombre Comercial” (vacío y deshabilitado, se habilita tras elegir origen)
        $(`#productoNombreComercial${newIndex}`)
          .empty()
          .append('<option value="">Selecciona Nombre Comercial</option>')
          .prop('disabled', true);
        // Reasignar unidades
        initializeUnits(newIndex);
        // Habilitar campos restantes
        $(`#cantidad${newIndex}`).prop('disabled', true).val('');
        $(`#precio${newIndex}`).prop('disabled', true).val('');
        $(`#tipoMoneda${newIndex}`).prop('disabled', true).val('MXN');

        // Rebind de validación de completitud
        bindCheckForProduct(newIndex);
      });

      // Tras reindexar, revisar estado del botón “＋ Agregar Producto”
      checkProductComplete(productCount);
      // Readjuntar manejadores eliminar en todos
      attachRemoveHandlers();
    }

    // === 18. Inicialmente, adjuntar manejadores de eliminar (aunque el 1 ya estará oculto) ===
    attachRemoveHandlers();
  });
</script>
