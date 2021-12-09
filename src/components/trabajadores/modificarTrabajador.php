<!-- Modal modificar servicio -->
<div class="modal fade" id="modificarTrabajador" tabindex="-1" aria-labelledby="modificarTrabajadorLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarTrabajadorLabel">Modificar trabajador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/trabajador/modificar" method="post" id="form-datos">
          <div class="mb-3">
            <label for="dni" class="col-form-label">DNI:</label>
            <input type="text" class="form-control" name="dni" id="dni" readonly>
          </div>

          <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required />
          </div>

          <div class="mb-3">
            <label for="apellidos" class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" required />
          </div>

          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required />
          </div>

          <div class="mb-3">
            <label for="categoria" class="col-form-label">Categoría:</label>
            <input type="text" class="form-control" name="categoria" id="categoria" required />
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Cerrar
        </button>
        <button type="submit" class="btn btn-primary" form="form-datos">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>