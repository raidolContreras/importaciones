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

          <!-- Nav tabs con botón "+" integrado -->
          <ul class="nav nav-tabs" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active"
                      id="product-tab-1"
                      data-bs-toggle="tab"
                      data-bs-target="#product-1"
                      type="button"
                      role="tab">
                Producto 1
              </button>
            </li>
            <!-- pestañas nuevas irán aquí -->
            <li class="nav-item me-auto" role="presentation">
              <button class="nav-link text-primary"
                      id="addProductTabBtn"
                      type="button"
                      title="Agregar Producto"
                      disabled>
                <strong>＋</strong>
              </button>
            </li>
          </ul>

          <!-- Contenido de pestañas -->
          <div class="tab-content pt-3" id="productTabsContent">
            <div class="tab-pane fade show active"
                 id="product-1"
                 role="tabpanel"
                 aria-labelledby="product-tab-1">
              <div class="row g-3 product-group">
                <!-- Producto + Origen -->
                <div class="col-12">
                  <div class="input-group">
                    <span class="input-group-text" style="min-width:180px;">Producto + Origen</span>
                    <select id="productoOrigen1" class="form-select" required disabled>
                      <option value="">Selecciona Producto + Origen</option>
                    </select>
                  </div>
                </div>
                <!-- Nombre Comercial -->
                <div class="col-12">
                  <div class="input-group">
                    <span class="input-group-text" style="min-width:180px;">Nombre Comercial</span>
                    <input type="text" id="productoNombreComercial1" class="form-control" required disabled>
                  </div>
                </div>
                <!-- Cantidad -->
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text" style="min-width:120px;">Cantidad</span>
                    <input type="number" id="cantidad1" class="form-control" min="0" placeholder="Ej. 1000" required disabled>
                  </div>
                </div>
                <!-- Unidad de Medida -->
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text" style="min-width:140px;">Unidad</span>
                    <select id="unidadMedida1" class="form-select" required disabled>
                      <option value="">Selecciona Unidad</option>
                    </select>
                  </div>
                </div>
                <!-- Precio -->
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text price currencyTypeSelected" style="min-width:120px;">Mex$</span>
                    <input type="text" id="precio1" class="form-control" placeholder="Ej. 25.50" required disabled>
                  </div>
                </div>
                <!-- Moneda -->
                <div class="col-md-6">
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

          <!-- Supervisor, Ejecutivo y Guardar -->
          <div class="row g-3 mt-4">
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
            <div class="col-12">
              <button type="submit" id="submitOrder" class="btn btn-primary btn-lg w-100 asignate-ejecutive">
                Guardar Orden
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Inputmask -->
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script src="view/assets/js/product-tabs-pending.js"></script>

<script>
  $(document).ready(function() {
    // Variables globales
    let orderData = null;
    let productCount = 1;
    let selectedBrokerId = null; // Broker seleccionado

    // Función para inicializar el formulario con los datos del servidor
    function initOrderForm(data) {
      orderData = data;
      productCount = 1;

      const folioId = $('.folioId');
      const brokerSelect = $('#numeroBroker');
      const providerSelect = $('#numeroProveedor');
      const productOriginSelect = $('#productoOrigen1');
      const unidadSelect = $('#unidadMedida1');
      const comercialInput = $('#productoNombreComercial1');
      const cantidadInput = $('#cantidad1');
      const precioInput = $('#precio1');
      const monedaSelect = $('#tipoMoneda1');
      const supervisorSelect = $('#supervisor');
      const ejecutivoSelect = $('#ejecutivo');

      // Formatear folio a 4 dígitos
      folioId.text(String(data.next_order_id).padStart(4, '0'));

      // 1) Poblar select de Brokers
      brokerSelect.empty().append('<option value="">Selecciona un Broker</option>');
      if (Array.isArray(data.brokers)) {
        data.brokers.forEach(broker => {
          brokerSelect.append(
            `<option value="${broker.broker_id}">${broker.broker_name}</option>`
          );
        });
      }
      brokerSelect.prop('disabled', false);

      // Reset campos primer producto
      resetAllProductFields(1);
      providerSelect
        .empty()
        .append('<option value="">Selecciona un Proveedor</option>')
        .prop('disabled', true);

      // Reset supervisores y ejecutivos
      supervisorSelect.prop('disabled', true).empty().append('<option value="">Selecciona un Supervisor</option>');
      ejecutivoSelect.prop('disabled', true).empty().append('<option value="">Selecciona un Ejecutivo</option>');

      // 2) Al cambiar Broker, guardamos ID y filtramos proveedores/productos
      brokerSelect.off('change').on('change', function() {
        selectedBrokerId = $(this).val();

        // Reset primer producto
        resetAllProductFields(1);

        providerSelect
          .empty()
          .append('<option value="">Selecciona un Proveedor</option>')
          .prop('disabled', true);

        if (!selectedBrokerId) {
          return;
        }

        // 2.1) Poblar Proveedores
        if (Array.isArray(orderData.providers)) {
          orderData.providers.forEach(provider => {
            providerSelect.append(
              `<option value="${provider.provider_id}">${provider.provider_name}</option>`
            );
          });
        }
        providerSelect.prop('disabled', false);

        // 2.2) Al cambiar Proveedor, poblar Productos y Unidades (Producto 1)
        providerSelect.off('change').on('change', function() {
          const selectedProviderId = $(this).val();

          // Reset primer producto
          resetAllProductFields(1);

          if (!selectedProviderId) {
            return;
          }

          // 2.2.1) Poblar Productos filtrando por selectedBrokerId
          if (Array.isArray(orderData.product_origins)) {
            productOriginSelect.empty().append('<option value="">Selecciona Producto + Origen</option>');
            orderData.product_origins.forEach(prod => {
              if (prod.broker_id == selectedBrokerId) {
                productOriginSelect.append(
                  `<option value="${prod.id}"
                    data-nombre_comercial="${prod.nombre_comercial}"
                    data-unidad="${prod.unidad_inventariable}">
                    ${prod.nombre_comercial} (${prod.pais_origen})
                  </option>`
                );
              }
            });
          }
          productOriginSelect.prop('disabled', false);

          // 2.2.2) Cargar Unidades para product 1
          unidadSelect.empty().append('<option value="">Selecciona Unidad</option>');
          if (Array.isArray(orderData.units)) {
            orderData.units.forEach(unit => {
              unidadSelect.append(
                `<option value="${unit.unidad_medida_id}"
                  data-nomenclatura="${unit.nomenclatura}">
                  ${unit.nameUM}
                </option>`
              );
            });
          }
          unidadSelect.prop('disabled', false);

          // 2.2.3) Habilitar inputs para product 1
          comercialInput.prop('disabled', false);
          cantidadInput.prop('disabled', false);
          precioInput.prop('disabled', false);
          monedaSelect.prop('disabled', false).val('MXN');

          // 2.2.4) Autocompletar nombre comercial/unidad al cambiar producto (Producto 1)
          productOriginSelect.off('change').on('change', function() {
            const selectedOption = $(this).find('option:selected');
            // Usar .attr() en lugar de .data()
            const nombreComercial = selectedOption.attr('data-nombre_comercial') || '';
            const unidadProd = selectedOption.attr('data-unidad') || '';

            comercialInput.val(nombreComercial);

            if (unidadProd) {
              unidadSelect.find('option').each(function() {
                if ($(this).text().toLowerCase().includes(unidadProd.toLowerCase())) {
                  $(this).prop('selected', true);
                  return false;
                }
              });
            }
          });
        });
      });

      // 3) Cargar Supervisores y Ejecutivos
      if (Array.isArray(orderData.supervisores)) {
        orderData.supervisores.forEach(supervisor => {
          $('#supervisor').append(
            `<option value="${supervisor.id_Users}">${supervisor.Username}</option>`
          );
        });
      }
      $('#supervisor').prop('disabled', false);

      if (Array.isArray(orderData.ejecutivos)) {
        orderData.ejecutivos.forEach(ejecutivo => {
          $('#ejecutivo').append(
            `<option value="${ejecutivo.id_Users}">${ejecutivo.Username}</option>`
          );
        });
      }
      $('#ejecutivo').prop('disabled', false);

      // 4) Configurar habilitación del botón "+" para el primer producto
      configureAddButtonForProduct(1);
    }

    // Función para resetear todos los campos de un producto dado
    function resetAllProductFields(index) {
      $(`#productoOrigen${index}`)
        .empty()
        .append('<option value="">Selecciona Producto + Origen</option>')
        .prop('disabled', true);

      $(`#unidadMedida${index}`)
        .empty()
        .append('<option value="">Selecciona Unidad</option>')
        .prop('disabled', true);

      $(`#productoNombreComercial${index}`)
        .prop('disabled', true)
        .val('');

      $(`#cantidad${index}`)
        .prop('disabled', true)
        .val('');

      $(`#precio${index}`)
        .prop('disabled', true)
        .val('');

      $(`#tipoMoneda${index}`)
        .prop('disabled', true).val('MXN');
    }

    // Verificar si todos los campos de un producto están completos
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
        const $el = $(sel);
        if (!$el.val()) {
          allFilled = false;
        }
      });
      // Habilitar o deshabilitar el botón "+"
      $('#addProductTabBtn').prop('disabled', !allFilled);
    }

    // Enlazar eventos de comprobación de completitud para un producto dado
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
      // Comprobar inmediatamente
      checkProductComplete(index);
    }

    // Configurar habilitación del botón "+" para un producto “index”
    function configureAddButtonForProduct(index) {
      $('#addProductTabBtn').prop('disabled', true);
      bindCheckForProduct(index);
    }

    // Agregar nuevo pestaña/producto dinámicamente
    function addNewProductTab() {
      productCount++;
      const newIndex = productCount;
      const tabId = `product-${newIndex}`;
      const tabButtonId = `product-tab-${newIndex}`;

      // 1) Crear nueva pestaña
      const $newTabLi = $(`
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="${tabButtonId}"
            data-bs-toggle="tab"
            data-bs-target="#${tabId}"
            type="button"
            role="tab">
            Producto ${newIndex}
          </button>
        </li>
      `);
      $('#addProductTabBtn').closest('li').before($newTabLi);

      // 2) Crear nuevo contenido para la pestaña
      const $newTabPane = $(`
        <div
          class="tab-pane fade"
          id="${tabId}"
          role="tabpanel"
          aria-labelledby="${tabButtonId}">
          <div class="row g-3 product-group">
            <!-- Producto + Origen -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Producto + Origen</span>
                <select id="productoOrigen${newIndex}" class="form-select" required disabled>
                  <option value="">Selecciona Producto + Origen</option>
                </select>
              </div>
            </div>
            <!-- Nombre Comercial -->
            <div class="col-12">
              <div class="input-group">
                <span class="input-group-text" style="min-width:180px;">Nombre Comercial</span>
                <input
                  type="text"
                  id="productoNombreComercial${newIndex}"
                  class="form-control"
                  required
                  disabled>
              </div>
            </div>
            <!-- Cantidad -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:120px;">Cantidad</span>
                <input
                  type="number"
                  id="cantidad${newIndex}"
                  class="form-control"
                  min="0"
                  placeholder="Ej. 1000"
                  required
                  disabled>
              </div>
            </div>
            <!-- Unidad de Medida -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text" style="min-width:140px;">Unidad</span>
                <select id="unidadMedida${newIndex}" class="form-select" required disabled>
                  <option value="">Selecciona Unidad</option>
                </select>
              </div>
            </div>
            <!-- Precio -->
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text price currencyTypeSelected" style="min-width:120px;">Mex$</span>
                <input
                  type="text"
                  id="precio${newIndex}"
                  class="form-control"
                  placeholder="Ej. 25.50"
                  required
                  disabled>
              </div>
            </div>
            <!-- Moneda -->
            <div class="col-md-6">
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
      `);
      $('#productTabsContent').append($newTabPane);

      // 3) Cambiar a la nueva pestaña
      const newTab = new bootstrap.Tab(document.getElementById(tabButtonId));
      newTab.show();

      // 4) Inicializar los campos del nuevo producto
      initializeProductFields(newIndex);

      // 5) Deshabilitar botón "+" hasta que este producto esté completo
      $('#addProductTabBtn').prop('disabled', true);

      // 6) Preparar chequeo de completitud para este producto
      configureAddButtonForProduct(newIndex);
    }

    // Poblar los campos de un producto “index”
    function initializeProductFields(index) {
      // 1) Poblamos select de productoOrigen{index}
      const $prodOriginSelect = $(`#productoOrigen${index}`);
      $prodOriginSelect.empty().append('<option value="">Selecciona Producto + Origen</option>');
      if (Array.isArray(orderData.product_origins)) {
        orderData.product_origins.forEach(prod => {
          if (prod.broker_id == selectedBrokerId) {
            $prodOriginSelect.append(
              `<option value="${prod.id}"
                data-nombre_comercial="${prod.nombre_comercial}"
                data-unidad="${prod.unidad_inventariable}">  
                ${prod.nombre_comercial} (${prod.pais_origen})
              </option>`
            );
          }
        });
      }
      $prodOriginSelect.prop('disabled', false);

      // 2) Poblamos select de unidadMedida{index}
      const $unidadSelect = $(`#unidadMedida${index}`);
      $unidadSelect.empty().append('<option value="">Selecciona Unidad</option>');
      if (Array.isArray(orderData.units)) {
        orderData.units.forEach(unit => {
          $unidadSelect.append(
            `<option value="${unit.unidad_medida_id}"
              data-nomenclatura="${unit.nomenclatura}">
              ${unit.nameUM}
            </option>`
          );
        });
      }
      $unidadSelect.prop('disabled', false);

      // 3) Habilitar campos restantes
      $(`#productoNombreComercial${index}`).prop('disabled', false).val('');
      $(`#cantidad${index}`).prop('disabled', false).val('');
      $(`#precio${index}`).prop('disabled', false).val('');
      $(`#tipoMoneda${index}`).prop('disabled', false).val('MXN');

      // 4) Autocompletar nombre comercial/unidad al cambiar producto
      $prodOriginSelect.off('change').on('change', function() {
        const selectedOption = $(this).find('option:selected');
        // Leer con .attr() en lugar de .data()
        const nombreComercial = selectedOption.attr('data-nombre_comercial') || '';
        const unidadProd = selectedOption.attr('data-unidad') || '';
        $(`#productoNombreComercial${index}`).val(nombreComercial);

        if (unidadProd) {
          $(`#unidadMedida${index}`)
            .find('option')
            .each(function() {
              if ($(this).text().toLowerCase().includes(unidadProd.toLowerCase())) {
                $(this).prop('selected', true);
                return false;
              }
            });
        }
      });
    }

    // Evento para abrir el formulario (inicializa el orden)
    $('#addNewButton').on('click', function() {
      $.ajax({
        url: 'controller/actions.controller.php',
        method: 'POST',
        data: { action: 'initOrder' },
        dataType: 'json',
        success: function(data) {
          if (data.status === 'success') {
            // Limpiar pestañas anteriores (si reabres)
            $('#productTabs').find('li.nav-item').not(':first').not(':last').remove();
            $('#productTabsContent').find('.tab-pane').not('#product-1').remove();
            $('#productTabs .nav-link').removeClass('active');
            $('#product-1').removeClass('show active');
            $('#product-tab-1').addClass('active');
            $('#product-1').addClass('show active');

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

    // Evento para el botón "+" (agregar nueva pestaña/producto)
    $('#addProductTabBtn').on('click', function() {
      addNewProductTab();
    });

    // Evento de envío del formulario: recolectar todos los productos
    $('#catalogForm').on('submit', function(event) {
      event.preventDefault();

      // Datos generales
      const formData = {
        numeroBroker: $('#numeroBroker').val(),
        numeroProveedor: $('#numeroProveedor').val(),
        supervisor: $('#supervisor').val(),
        ejecutivo: $('#ejecutivo').val(),
        action: 'createOrdenCompra'
      };

      // Recolectar productos
      const products = [];
      for (let i = 1; i <= productCount; i++) {
        const origin = $(`#productoOrigen${i}`).val();
        if (origin) {
          const comercial = $(`#productoNombreComercial${i}`).val();
          const cantidad = $(`#cantidad${i}`).val();
          const unidad = $(`#unidadMedida${i}`).val();
          const precio = $(`#precio${i}`).val();
          const moneda = $(`#tipoMoneda${i}`).val();
          products.push({
            producto_origen_id: origin,
            nombre_comercial: comercial,
            cantidad: cantidad,
            unidad_medida_id: unidad,
            precio: precio,
            moneda: moneda
          });
        }
      }
      formData.products = JSON.stringify(products);

      // Enviar por AJAX
      $.ajax({
        url: 'controller/actions.controller.php',
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            $('#catalogForm')[0].reset();
            $('#productTabs').find('li.nav-item').not(':first').not(':last').remove();
            $('#productTabsContent').find('.tab-pane').not('#product-1').remove();
            $('#productTabs .nav-link').removeClass('active');
            $('#product-1').removeClass('show active');
            $('#product-tab-1').addClass('active');
            $('#product-1').addClass('show active');
            productCount = 1;
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

  });
</script>
