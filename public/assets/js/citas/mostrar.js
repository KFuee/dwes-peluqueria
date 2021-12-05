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
    if (key != "db" && key != "state") {
      html.push("<p><b>" + key + ":</b> " + value + "</p>");
    }
  });

  return html.join("");
}

function operateFormatter(value, row, index) {
  return [
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
        field: "id",
        title: "ID",
        align: "center",
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
      },
      {
        field: "hora",
        title: "Hora",
        align: "center",
        sortable: true,
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
