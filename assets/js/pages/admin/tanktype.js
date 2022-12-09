$(function() {

  // Initiate datatable for fuels.
  var table = $('#table').DataTable({
    ajax: localStorage.getItem('api') + '/v1/tanktype.php?token=' + localStorage.getItem('key'),
    responsive: true,
    dom: 'f<"toolbar">rtip',
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    },
    columns: [
      { 'data': 'id' },
      { 'data': 'name' },
      { 'data': 'length' },
      { 'data': 'width' },
      { 'data': 'height' },
      { 'data': 'diameter' },
      { 'data': 'radius1' },
      { 'data': 'radius2' }
    ],
    columnDefs: [{
      targets: 8,
      data: null,
      defaultContent: '<div class="btn-group" role="group" aria-label="Actions">' + 
        '<button id="edit" type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Click this button to edit this tank type."><i class="fa fa-edit"></i></button>' + 
        '<button id="delete" type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Click this button to delete this tank type."><i class="fa fa-trash"></i></button>' +
        '</div>'
    }]
  });

  // Custom toolbar for datatable.
  $("div.toolbar").html('<button id="create" class="btn btn-success col-lg-3 col-12" data-toggle="modal" data-target="#modal-create">' +
      '<span class="icon"><i class="fa fa-plus-square fa-lg"></i></span>' +
      '<span class="pd-x-15">New Tank Type</span>' +
    '</button>'
  );

  // Add event listener for editing Tank Type.
  $('#table').on('click', '#edit', function() {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Set values for edit form.
    $("#edit-form input[name=id]").val(data.id);   
    $("#edit-form input[name=name]").val(data.name);
    $("#edit-form input[name=length]").val(data.length);
    $("#edit-form input[name=width]").val(data.width);
    $("#edit-form input[name=height]").val(data.height);
    $("#edit-form input[name=diameter]").val(data.diameter);
    $("#edit-form input[name=radius1]").val(data.radius1);
    $("#edit-form input[name=radius2]").val(data.radius2);
    $("#edit-form select[name=Shapeid]").val(data.Shapeid).change();
    // Show modal-edit modal.
    $('#modal-edit').modal('toggle');
  });

  // Add event listener for deleting Tank Type.
  $('#table tbody').on('click', '#delete', function() {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Get confirmation before proceeding.
    swal({
      title: "Are you sure?",
      text: "You are deleting tank type: " + data.name + ".",
      icon: "warning",
      buttons: [true ,"Yes"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // Tank Type delete form function.
        $.ajax({
            type: 'DELETE',
            url: localStorage.getItem('api') + '/v1/tanktype.php?id=' + data.id + '&token=' + localStorage.getItem('key'),
            success: function(response) {
              swal("Deleted tank type successfully.", "", "success");
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

  // Tank Type edit form function.
  $("#edit-form").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: localStorage.getItem('api') + '/v1/tanktype.php?token=' + localStorage.getItem('key'),
          data: data,
          success: function(response) {
              swal("Tank type saved successfully.", "", "success");
              $('#modal-edit').modal('hide');
              table.ajax.reload( null, false );
          },
          error: function(status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
          }
      });
  });

  // Tank Type create form function.
  $("#create-form").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: localStorage.getItem('api') + '/v1/tanktype.php?token=' + localStorage.getItem('key'),
          data: data,
          success: function(response) {
              swal("Tank type created successfully.", "", "success");
              $('#modal-create').modal('hide');
              table.ajax.reload( null, false );
          },
          error: function(status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
          }
      });
  });

  $.getJSON(localStorage.getItem('api') + '/v1/shape.php', {'token': localStorage.getItem('key')}, function(data) {                 
    var options = [];
    $.each(data, function(i) {
      $.each(data[i], function(key, val) {
        options.push("<option value='" + val.id + "'>" + val.name + "</option>");
      });     
    });
    $('#edit-form select[name=Shapeid], #create-form select[name=Shapeid]').html(options.join("")).select2();
  });

});