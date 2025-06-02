
// Función para cargar pendientes
function loadPendienting() {
    $.ajax({
        url: 'controller/actions.controller.php',
        method: 'POST',
        data: {
            action: 'loadPendienting'
        },
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
                );

                if (Array.isArray(data.data) && data.data.length > 0) {
                    data.data.forEach(p => {
                        const folio = String(p.id).padStart(4, '0');
                        const text = `Folio #${folio} - ${p.nombre_comercial} (${p.cantidad} ${p.nomenclatura})`;
                        const search = [
                            p.nombre_comercial,
                            p.cantidad,
                            p.moneda,
                            p.precio_unitario,
                            p.creado_en,
                            p.actualizado_en
                        ].join(' ').toLowerCase();
                        list.append(
                            `<button class="mt-1 mx-2 btn btn-success text-start" id="pending-order" search="${search}" data-id="${p.id}">${text}</button>`
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