$("#servicio").change(function () {
  const idServicio = $(this).val();

  $.ajax({
    url: "/cita/trabajadores",
    type: "POST",
    data: {
      idServicio: idServicio,
    },
    success: function (trabajadores) {
      // Limpiar select
      $("#trabajador").empty();

      $("#t-wrapper").show();

      // Comprobar si hay trabajadores
      if (trabajadores.length === 0) {
        $("#trabajador").append(
          '<option value="">No hay trabajadores disponibles</option>'
        );

        return;
      }

      // Insertar opción por defecto
      $("#trabajador").append(
        '<option value="">Seleccione un trabajador</option>'
      );

      // Inserta los trabajadores en el select
      trabajadores.forEach((trabajador) => {
        // Crear elemento option
        const option = document.createElement("option");
        option.value = trabajador.dni;
        option.innerText = `${trabajador.nombre} ${trabajador.apellidos}`;

        // Insertar elemento option en el select
        $("#trabajador").append(option);
      });
    },
  });
});

$("#trabajador").change(function () {
  const dniTrabajador = $(this).val();

  $.ajax({
    url: "/cita/fechas",
    type: "POST",
    data: {
      dniTrabajador: dniTrabajador,
    },
    success: function (fechas) {
      // Limpiar select
      $("#fecha").empty();

      $("#f-wrapper").show();

      // Comprobar si hay fechas disponibles
      if (fechas.length === 0) {
        $("#fecha").append(
          '<option value="">No hay fechas disponibles</option>'
        );

        return;
      }

      // Insertar opción por defecto
      $("#fecha").append('<option value="">Seleccione una fecha</option>');

      // Inserta los días de la semana en el select
      fechas.forEach((fecha) => {
        const option = document.createElement("option");
        option.value = fecha;
        option.innerText = fecha;

        // Insertar elemento option en el select
        $("#fecha").append(option);
      });
    },
  });
});

$("#fecha").change(function () {
  const fecha = $(this).val();
  const idServicio = $("#servicio").val();

  $.ajax({
    url: "/cita/horas",
    type: "POST",
    data: {
      fecha: fecha,
      dniTrabajador: $("#trabajador").val(),
      idServicio: idServicio,
    },
    success: function (horas) {
      // Limpiar select
      $("#hora").empty();

      $("#h-wrapper").show();

      // Comprobar si hay horas disponibles
      if (horas.length === 0) {
        $("#hora").append('<option value="">No hay horas disponibles</option>');

        return;
      }

      // Insertar opción por defecto
      $("#hora").append('<option value="">Seleccione una hora</option>');

      // Inserta las horas del día en el select
      horas.forEach((hora) => {
        const option = document.createElement("option");
        option.value = hora;
        option.innerText = `${hora}`;

        // Insertar elemento option en el select
        $("#hora").append(option);
      });
    },
  });
});

$("#hora").change(function () {
  $("#n-wrapper").show();
  $("#a-wrapper").show();
  $("#e-wrapper").show();
  $("#o-wrapper").show();

  // Añade los datos del usuario en caso de que haya iniciado sesión
  if (usuario) {
    $("#nombre").val(usuario.nombre);
    $("#apellidos").val(usuario.apellidos);
    $("#email").val(usuario.email);
  }
});

$("#form-cita").submit(function (e) {
  e.preventDefault();

  const formData = new FormData(this);

  $.ajax({
    url: "/cita/crear",
    type: "POST",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (res) {
      if (res.status == "OK") {
        Swal.fire({
          title: "Cita creada",
          html:
            "La cita se ha creado correctamente." +
            "<br> ¡Gracias por confiar en nosotros!",
          icon: "success",
          confirmButtonColor: "#0d6efd",
          confirmButtonText: "Cerrar",
        }).then(() => {
          window.location.href = "/home";
        });
      } else {
        Swal.fire({
          title: "Error",
          text: "Ha ocurrido un error al crear la cita",
          icon: "error",
          confirmButtonColor: "#0d6efd",
          confirmButtonText: "Cerrar",
        });
      }
    },
  });
});
