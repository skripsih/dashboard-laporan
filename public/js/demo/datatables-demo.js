// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('.datatable').DataTable({
    order: true
  });

  $("#laporan").DataTable({
    responsive: true,
    autoWidth: false,
    dom: "Bfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        footer: true,
      },
      {
        extend: "pdfHtml5",
        footer: true,
      },
      {
        extend: "print",
        footer: true,
      },
    ],
  });
});
