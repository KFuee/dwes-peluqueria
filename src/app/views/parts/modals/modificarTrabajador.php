<!-- Modal modificar servicio -->
<div class="modal fade" id="modificarModal" tabindex="-1" aria-labelledby="modificarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarModalLabel">Modificar trabajador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/trabajador/modificar" method="post" id="form-datos">
          <input type="hidden" name="dni" id="dni" />
          <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" />
          </div>
          <div class="mb-3">
            <label for="apellidos" class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" />
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email" />
          </div>
          <div class="mb-3">
            <label for="categoria" class="col-form-label">Categoría:</label>
            <input type="text" class="form-control" name="categoria" id="categoria" />
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
    const dni = boton.getAttribute("data-bs-dni");
    const nombre = boton.getAttribute("data-bs-nombre");
    const apellidos = boton.getAttribute("data-bs-apellidos");
    const email = boton.getAttribute("data-bs-email");
    const descripcion = boton.getAttribute("data-bs-descripcion");
    const categoria = boton.getAttribute("data-bs-categoria");

    // Seleccionamos los elementos del formulario
    const titulo = modificarModal.querySelector(".modal-title");
    const dniInput = modificarModal.querySelector(".modal-body #dni");
    const nombreInput = modificarModal.querySelector(".modal-body #nombre");
    const apellidosInput = modificarModal.querySelector(".modal-body #apellidos");
    const emailInput = modificarModal.querySelector(".modal-body #email");
    const categoriaInput = modificarModal.querySelector(".modal-body #categoria");

    // Asignar valores a los inputs
    titulo.textContent = `Modificar trabajador: ${nombre} ${apellidos}`;
    dniInput.value = dni;
    nombreInput.value = nombre;
    apellidosInput.value = apellidos;
    emailInput.value = email;
    categoriaInput.value = categoria;
  });
</script>
