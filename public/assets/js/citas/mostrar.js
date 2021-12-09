var $tabla = $("#citas");
var $eliminar = $("#eliminar");

var seleccionados = [];

function getIdSelections() {
  return $.map($tabla.bootstrapTable("getSelections"), function (row) {
    return row.id;
  });
}

function detallesFormatter(index, row) {
  var html = [];
  $.each(row, function (key, value) {
    if (key != "db" && key != "state" && value) {
      html.push("<p><b>" + key + ":</b> " + value + "</p>");
    }
  });

  return html.join("");
}

function fechaFormatter(value, row, index) {
  return row.fecha + " " + row.hora;
}

function nClienteFormatter(value, row, index) {
  return row.nombre + " " + row.apellidos;
}

function operateFormatter(value, row, index) {
  return [
    // Botón mailto para recordar la cita al cliente
    '<a class="btn btn-primary btn-sm me-2" href="mailto:' +
      row.email +
      "?subject=Cita peluquería&body=Hola " +
      row.nombre +
      " " +
      row.apellidos +
      ",%0D%0A%0D%0A Te recordamos que has reservado una cita para el día " +
      row.fecha +
      " a las " +
      row.hora +
      ".%0D%0A%0D%0A¡Gracias por confiar en nosotros!%0D%0A%0D%0ASaludos, " +
      row.trabajador,
    '"><i class="fa fa-envelope"></i></a>',
    '<button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i></button>',
  ].join("");
}

window.operateEvents = {
  "click .btn-danger": function (e, value, row, index) {
    // Ajax eliminar
    $.ajax({
      url: "/cita/eliminar",
      type: "POST",
      data: {
        ids: [row.id],
      },
      success: function (res) {
        if (res.status == "OK") {
          $tabla.bootstrapTable("remove", {
            field: "id",
            values: [row.id],
          });
        }
      },
    });
  },
};

function iniciarTabla() {
  $tabla.bootstrapTable("destroy").bootstrapTable({
    locale: "es-ES",
    url: "/cita/data",
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
        field: "trabajador",
        title: "Trabajador",
        align: "center",
      },
      {
        field: "servicio",
        title: "Servicio",
        align: "center",
      },
      {
        field: "fecha",
        title: "Fecha",
        align: "center",
        sortable: true,
        formatter: fechaFormatter,
      },
      {
        field: "nCliente",
        title: "Nombre cliente",
        align: "center",
        formatter: nClienteFormatter,
      },
      {
        field: "email",
        title: "Email",
        align: "center",
        visible: false,
      },
      {
        field: "observaciones",
        title: "Observaciones",
        align: "center",
        visible: false,
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
    url: "/cita/eliminar",
    type: "POST",
    data: {
      ids: seleccionados,
    },
    success: function (res) {
      if (res.status == "OK") {
        $tabla.bootstrapTable("remove", {
          field: "id",
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
