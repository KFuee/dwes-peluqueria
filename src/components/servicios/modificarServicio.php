<!-- Modal modificar servicio -->
<div class="modal fade" id="modificarModal" tabindex="-1" aria-labelledby="modificarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarModalLabel">Modificar servicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/servicio/modificar" method="post" id="form-datos">
          <input type="hidden" name="id" id="id" />

          <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" />
          </div>

          <div class="mb-3">
            <label for="precio" class="col-form-label">Precio:</label>
            <input type="text" class="form-control" name="precio" id="precio" />
          </div>

          <div class="mb-3">
            <label for="duracion" class="col-form-label">Duración:</label>
            <input type="text" class="form-control" name="duracion" id="duracion" />
          </div>

          <div class="mb-3">
            <label for="descripcion" class="col-form-label">Descripción:</label>
            <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
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

<script>
  const modificarModal = document.getElementById("modificarModal");
  modificarModal.addEventListener("show.bs.modal", function(event) {
    const boton = event.relatedTarget;

    // Obtener los datos del servicio
    const idServicio = boton.getAttribute("data-bs-id");
    const nombre = boton.getAttribute("data-bs-nombre");
    const precio = boton.getAttribute("data-bs-precio");
    const duracion = boton.getAttribute("data-bs-duracion");
    const descripcion = boton.getAttribute("data-bs-descripcion");

    // Seleccionamos los elementos del formulario
    const titulo = modificarModal.querySelector(".modal-title");
    const idInput = modificarModal.querySelector(".modal-body #id");
    const nombreInput = modificarModal.querySelector(".modal-body #nombre");
    const precioInput = modificarModal.querySelector(".modal-body #precio");
    const duracionInput = modificarModal.querySelector(".modal-body #duracion");
    const descripcionTextarea = modificarModal.querySelector(
      ".modal-body #descripcion"
    );

    // Asignar valores a los inputs
    titulo.textContent = `Modificar servicio: ${idServicio}`;
    idInput.value = idServicio;
    nombreInput.value = nombre;
    precioInput.value = precio;
    duracionInput.value = duracion;
    descripcionTextarea.value = descripcion;
  });
</script>
