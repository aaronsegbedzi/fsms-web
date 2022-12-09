$(function() {

  // Initiate datatable for fuels.
  var table = $('#table').DataTable({
    ajax: localStorage.getItem('api') + '/v1/reading.php?Stationid=' + localStorage.getItem('Stationid') + '&token=' + localStorage.getItem('key'),
    responsive: true,
    dom: 'f<"toolbar">rtip',
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    },
    columns: [
      { 'data': 'id' },
      { 'data': 'value' },
      { 'data': 'dateTime' },
      { 'data': 'Tankuid' }
    ],
    order:[
      [0,"desc"]
    ]
  });

  // Custom toolbar for datatable.
  $("div.toolbar").html('<button id="reload" class="btn btn-primary col-lg-2 col-12">' +
      '<span class="icon"><i class="icon ion-ios-reload"></i></span>' +
      '<span class="pd-x-15">Refresh</span>' +
    '</button>'
  );

  $('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity
  });

  $('#reload').on('click', function () {
    table.ajax.reload( null, false );
  });

});