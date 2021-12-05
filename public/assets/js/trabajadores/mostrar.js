var $tabla = $("#trabajadores");
var $eliminar = $("#eliminar");

var seleccionados = [];

function getIdSelections() {
  return $.map($tabla.bootstrapTable("getSelections"), function (row) {
    return row.dni;
  });
}

function precioFormatter(data) {
  return `${data} €`;
}

function duracionFormatter(data) {
  return `${data} min`;
}

function detallesFormatter(index, row) {
  var html = [];
  $.each(row, function (key, value) {
    if (key != "db" && key != "state") {
      html.push("<p><b>" + key + ":</b> " + value + "</p>");
    }
  });

  return html.join("");
}

function operateFormatter(value, row, index) {
  return [
    '<button class="btn btn-primary btn-sm me-2" type="button" data-toggle="modal" data-target="#modificarTrabajador" data-id="' +
      row.id +
      '">',
    '<i class="fa fa-pencil"></i>',
    "</button>",
    '<button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i></button>',
  ].join("");
}

window.operateEvents = {
  "click .btn-primary": function (e, value, row, index) {
    $("#modificarTrabajador").modal("show");
    $("#modificarTrabajador").find('input[name="dni"]').val(row.dni);
    $("#modificarTrabajador").find('input[name="nombre"]').val(row.nombre);
    $("#modificarTrabajador")
      .find('input[name="apellidos"]')
      .val(row.apellidos);
    $("#modificarTrabajador").find('input[name="email"]').val(row.email);
    $("#modificarTrabajador")
      .find('input[name="categoria"]')
      .val(row.categoria);
  },
  "click .btn-danger": function (e, value, row, index) {
    // Ajax eliminar
    $.ajax({
      url: "/trabajador/eliminar",
      type: "POST",
      data: {
        dnis: [row.dni],
      },
      success: function (res) {
        if (res.status == "OK") {
          $tabla.bootstrapTable("remove", {
            field: "dni",
            values: [row.dni],
          });
        }
      },
    });
  },
};

function iniciarTabla() {
  $tabla.bootstrapTable("destroy").bootstrapTable({
    locale: "es-ES",
    url: "/trabajador/data",
    search: true,
    detailView: true,
    detailFormatter: detallesFormatter,
    showRefresh: true,
    showExport: true,
    exportTypes: ["pdf", "sql", "excel"],
    showColumns: true,
    columns: [
      {
        field: "state",
        checkbox: true,
        align: "center",
        valign: "middle",
      },
      {
        field: "dni",
        title: "DNI",
        align: "center",
      },
      {
        field: "nombre",
        title: "Nombre",
        align: "center",
      },
      {
        field: "apellidos",
        title: "Apellidos",
        align: "center",
      },
      {
        field: "email",
        title: "Email",
        align: "center",
      },
      {
        field: "categoria",
        title: "Categoría",
        align: "center",
      },
      {
        field: "operate",
        title: "Acciones",
        align: "center",
        clickToSelect: false,
        events: operateEvents,
        formatter: operateFormatter,
        export: false,
      },
    ],
  });
}

$tabla.on(
  "check.bs.table uncheck.bs.table " +
    "check-all.bs.table uncheck-all.bs.table",
  function () {
    $eliminar.prop("disabled", !$tabla.bootstrapTable("getSelections").length);

    seleccionados = getIdSelections();
  }
);

$eliminar.click(function () {
  $.ajax({
    url: "/trabajador/eliminar",
    type: "POST",
    data: {
      dnis: seleccionados,
    },
    success: function (res) {
      if (res.status == "OK") {
        $tabla.bootstrapTable("remove", {
          field: "dni",
          values: seleccionados,
        });

        $eliminar.prop("disabled", true);
      }
    },
  });
});

$(function () {
  iniciarTabla();
});
