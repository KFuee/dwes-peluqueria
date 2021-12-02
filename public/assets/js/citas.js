const obtenerDiasSemana = () => {
  let curr = new Date();
  let week = [];

  for (let i = 1; i <= 7; i++) {
    let first = curr.getDate() - curr.getDay() + i;
    let day = new Date(curr.setDate(first)).toISOString().slice(0, 10);
    week.push(day);
  }

  return week;
};

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
    success: function (dias) {
      // Limpiar select
      $("#fecha").empty();

      $("#f-wrapper").show();

      // Inserta los días de la semana en el select
      dias.forEach((dia) => {
        const option = document.createElement("option");
        option.value = dia;
        option.innerText = `${dia}`;

        // Insertar elemento option en el select
        $("#fecha").append(option);
      });
    },
  });
});

$("#fecha").change(function () {
  const dia = $(this).val();
  const idServicio = $("#servicio").val();

  $.ajax({
    url: "/cita/horas",
    type: "POST",
    data: {
      dia: dia,
      dniTrabajador: $("#trabajador").val(),
      idServicio: idServicio,
    },
    success: function (horas) {
      // Limpiar select
      $("#hora").empty();

      $("#h-wrapper").show();

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
