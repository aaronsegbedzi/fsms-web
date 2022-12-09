$(function() {

  // Initiate datatable for tanks.
  var table = $('#table').DataTable({
    ajax: localStorage.getItem('api') + '/v1/tank.php?dataTable=true&token=' + localStorage.getItem('key'),
    responsive: true,
    dom: 'f<"toolbar">rtip',
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    },
    columns: [
      { 'data': 'uid' },
      { 'data': 'StationLocation' },
      { 'data': 'FuelName' },
      { 'data': 'volume' },
      { 'data': 'TankTypeName' }
    ],
    columnDefs: [{
      targets: 5,
      data: null,
      defaultContent: '<div class="btn-group" role="group" aria-label="Actions">' + 
        '<button id="edit" type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Click this button to edit this tank."><i class="fa fa-edit"></i></button>' + 
        '<button id="delete" type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Click this button to delete this tank."><i class="fa fa-trash"></i></button>' +
        '</div>'
    }]
  });

  // Custom toolbar for datatable.
  $("div.toolbar").html('<button id="create" class="btn btn-success col-lg-3 col-12" data-toggle="modal" data-target="#modal-create">' +
      '<span class="icon"><i class="fa fa-plus-square fa-lg"></i></span>' +
      '<span class="pd-x-15">New Tank</span>' +
    '</button>'
  );

  // Add event listener for editing Tank.
  $('#table').on('click', '#edit', function() {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Set values for edit form.
    $("#edit-form input[name=id]").val(data.id);
    $("#edit-form input[name=uid]").val(data.uid);   
    $("#edit-form input[name=volume]").val(data.volume);
    $("#edit-form select[name=Stationid]").val(data.Stationid).change();;
    $("#edit-form select[name=Fuelid]").val(data.Fuelid).change();;
    $("#edit-form select[name=TankTypeid]").val(data.TankTypeid).change();;
    // Show modal-edit modal.
    $('#modal-edit').modal('toggle');
  });

  // Add event listener for deleting Tank.
  $('#table tbody').on('click', '#delete', function() {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Get confirmation before proceeding.
    swal({
      title: "Are you sure?",
      text: "You are deleting tank: " + data.FuelName  + " from " + data.StationLocation + ".",
      icon: "warning",
      buttons: [true ,"Yes"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // Tank delete form function.
        $.ajax({
            type: 'DELETE',
            url: localStorage.getItem('api') + '/v1/tank.php?id=' + data.id + '&token=' + localStorage.getItem('key'),
            success: function(response) {
              swal("Deleted tank successfully.", "", "success");
              table.ajax.reload( null, false );
            },
            error: function(status) {
                swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
            }
        });
      }
    });
  });

  $('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity
  });

  $.getJSON(localStorage.getItem('api') + '/v1/station.php', {'token': localStorage.getItem('key')}, function(data) {                 
    var options = [];
    $.each(data, function(i) {
      $.each(data[i], function(key, val) {
        options.push("<option value='" + val.id+ "'>" + val.location + "</option>");
      });     
    });
    $('#edit-form select[name=Stationid], #create-form select[name=Stationid]').html(options.join("")).select2();
  });

  $.getJSON(localStorage.getItem('api') + '/v1/fuel.php', {'token': localStorage.getItem('key')}, function(data) {                 
    var options = [];
    $.each(data, function(i) {
      $.each(data[i], function(key, val) {
        options.push("<option value='" + val.id+ "'>" + val.name + "</option>");
      });     
    });
    $('#edit-form select[name=Fuelid], #create-form select[name=Fuelid]').html(options.join("")).select2();
  });

  $.getJSON(localStorage.getItem('api') + '/v1/tanktype.php', {'token': localStorage.getItem('key')}, function(data) {                 
    var options = [];
    $.each(data, function(i) {
      $.each(data[i], function(key, val) {
        options.push("<option value='" + val.id+ "'>" + val.name + "</option>");
      });     
    });
    $('#edit-form select[name=TankTypeid], #create-form select[name=TankTypeid]').html(options.join("")).select2();
  });

  // Tank edit form function.
  $("#edit-form").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: localStorage.getItem('api') + '/v1/tank.php?token=' + localStorage.getItem('key'),
          data: data,
          success: function(response) {
              swal("Tank saved successfully.", "", "success");
              $('#modal-edit').modal('hide');
              table.ajax.reload( null, false );
          },
          error: function(status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
          }
      });
  });

  // Tank create form function.
  $("#create-form").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: localStorage.getItem('api') + '/v1/tank.php?token=' + localStorage.getItem('key'),
          data: data,
          success: function(response) {
              swal("Tank created successfully.", "", "success");
              $('#modal-create').modal('hide');
              table.ajax.reload( null, false );
          },
          error: function(status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
          }
      });
  });

});