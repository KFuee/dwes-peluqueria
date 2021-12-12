var $tabla = $("#servicios");
var $eliminar = $("#eliminar");

var seleccionados = [];

function getIdSelections() {
  return $.map($tabla.bootstrapTable("getSelections"), function (row) {
    return row.id;
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
    if (key != "state" && value) {
      html.push("<p><b>" + key + ":</b> " + value + "</p>");
    }
  });

  return html.join("");
}

function operateFormatter(value, row, index) {
  return [
    '<button class="btn btn-primary btn-sm me-2" type="button" data-toggle="modal" data-target="#modificarServicio" data-id="' +
      row.id +
      '">',
    '<i class="fa fa-pencil"></i>',
    "</button>",
    '<button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i></button>',
  ].join("");
}

window.operateEvents = {
  "click .btn-primary": function (e, value, row, index) {
    $("#modificarServicio").modal("show");
    $("#modificarServicio").find('input[name="id"]').val(row.id);
    $("#modificarServicio").find('input[name="nombre"]').val(row.nombre);
    $("#modificarServicio").find('input[name="precio"]').val(row.precio);
    $("#modificarServicio").find('input[name="duracion"]').val(row.duracion);
    $("#modificarServicio")
      .find('textarea[name="descripcion"]')
      .val(row.descripcion);
  },
  "click .btn-danger": function (e, value, row, index) {
    // Ajax eliminar
    $.ajax({
      url: "/servicio/eliminar",
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
    url: "/servicio/data",
    search: true,
    detailView: true,
    detailFormatter: detallesFormatter,
    showRefresh: true,
    showExport: true,
    exportTypes: ["pdf", "sql", "excel"],
    showColumns: true,
    showPaginationSwitch: true,
    pagination: true,
    paginationParts: ["pageInfo", "pageList"],
    pageSize: 5,
    columns: [
      {
        field: "state",
        checkbox: true,
        align: "center",
        valign: "middle",
      },
      {
        field: "nombre",
        title: "Nombre",
        align: "center",
      },
      {
        field: "precio",
        title: "Precio",
        sortable: true,
        align: "center",
        formatter: precioFormatter,
      },
      {
        field: "duracion",
        title: "Duración",
        sortable: true,
        align: "center",
        formatter: duracionFormatter,
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
    url: "/servicio/eliminar",
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
