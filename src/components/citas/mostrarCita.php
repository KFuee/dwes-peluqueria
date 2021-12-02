<!-- Modal modificar servicio -->
<div class="modal fade" id="mostrarModal" tabindex="-1" aria-labelledby="mostrarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mostrarModalLabel">Mostrar cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-datos">
          <div class="mb-3">
            <label for="trabajador" class="col-form-label">Trabajador:</label>
            <input type="text" class="form-control" name="trabajador" id="trabajador" disabled />
          </div>

          <div class="mb-3">
            <label for="servicio" class="col-form-label">Servicio:</label>
            <input type="text" class="form-control" name="servicio" id="servicio" disabled />
          </div>

          <div class="mb-3">
            <label for="fecha" class="col-form-label">Fecha:</label>
            <input type="text" class="form-control" name="fecha" id="fecha" disabled />
          </div>

          <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre completo:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" disabled />
          </div>

          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email" disabled />
          </div>

          <div class="mb-3">
            <label for="observaciones" class="col-form-label">Observaciones:</label>
            <textarea class="form-control" name="observaciones" id="observaciones" disabled></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  const mostrarModal = document.getElementById("mostrarModal");
  mostrarModal.addEventListener("show.bs.modal", function(event) {
    const boton = event.relatedTarget;

    // Obtener los datos del servicio
    const id = boton.getAttribute("data-bs-id");
    const trabajador = boton.getAttribute("data-bs-trabajador");
    const servicio = boton.getAttribute("data-bs-servicio");
    const fecha = boton.getAttribute("data-bs-fecha");
    const nombreCompleto = boton.getAttribute("data-bs-nombre");
    const email = boton.getAttribute("data-bs-email");
    const observaciones = boton.getAttribute("data-bs-observaciones");

    // Seleccionamos los elementos del formulario
    const titulo = mostrarModal.querySelector(".modal-title");

    const trabajadorInput = mostrarModal.querySelector(".modal-body #trabajador");
    const servicioInput = mostrarModal.querySelector(".modal-body #servicio");
    const fechaInput = mostrarModal.querySelector(".modal-body #fecha");
    const nombreCompletoInput = mostrarModal.querySelector(".modal-body #nombre");
    const emailInput = mostrarModal.querySelector(".modal-body #email");
    const observacionesInput = mostrarModal.querySelector(".modal-body #observaciones");

    // Asignar valores a los inputs
    titulo.textContent = `Mostrar cita: ${id}`;
    trabajadorInput.value = trabajador;
    servicioInput.value = servicio;
    fechaInput.value = fecha;
    nombreCompletoInput.value = nombreCompleto;
    emailInput.value = email;
    observacionesInput.value = observaciones;
  });
</script>
