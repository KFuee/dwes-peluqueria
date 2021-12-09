<!-- Modal modificar servicio -->
<div class="modal fade" id="modificarServicio" tabindex="-1" aria-labelledby="modificarServicioLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarServicioLabel">Modificar servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/servicio/modificar" method="post" id="form-datos">
          <input type="hidden" name="id" id="id" />

          <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required />
          </div>

          <div class="mb-3">
            <label for="precio" class="col-form-label">Precio:</label>
            <input type="number" class="form-control" name="precio" id="precio" required />
          </div>

          <div class="mb-3">
            <label for="duracion" class="col-form-label">Duración:</label>
            <input type="number" class="form-control" name="duracion" id="duracion" required />
          </div>

          <div class="mb-3">
            <label for="descripcion" class="col-form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
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