$(function() {

  // Initiate datatable for users.
  var table = $('#table').DataTable({
    ajax: localStorage.getItem('api') + '/v1/user.php?dataTable=true&token=' + localStorage.getItem('key'),
    responsive: true,
    dom: 'f<"toolbar">rtip',
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    },
    columns: [
      {
        "className":      'details-control',
        "orderable":      false,
        "data":           null,
        "defaultContent": '<i id="moreInfo" class="fa fa-info-circle text-info"></i>'
      },
      { 'data': 'id' },
      { 'data': 'username' },
      { 'data': 'firstName' },
      { 'data': 'lastName' },
      { 'data': 'role' }
    ],
    columnDefs: [{
      targets: 6,
      data: null,
      defaultContent: '<div class="btn-group" role="group" aria-label="Actions">' + 
        '<button id="edit" type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Click this button to edit this user."><i class="fa fa-edit"></i></button>' + 
        '<button id="delete" type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Click this button to delete this user."><i class="fa fa-trash"></i></button>' +
        '</div>'
    },{
      targets: 5,
      data: 'role',
      render: function ( data, type, row, meta ) {
        switch(data) {
          case '0':
              return 'Administrator';
          case '1':
              return 'Manager';
          case '2':
              return 'Subscriber';
          default:
              return 'Unknown';
        } 
      }
    }]
  });

  // Custom toolbar for datatable.
  $("div.toolbar").html('<button id="create" class="btn btn-success col-lg-3 col-12" data-toggle="modal" data-target="#modal-create">' +
      '<span class="icon"><i class="fa fa-plus-square fa-lg"></i></span>' +
      '<span class="pd-x-15">New User</span>' +
    '</button>'
  );

  function format ( data ) {
    // `d` is the original data object for the row
    return '<table class="table table-bordered table-hover table-responsive text-left">'+
        '<tr>'+
            '<td><strong>Station Location:</strong></td>'+
            '<td>'+data.location+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td><strong>Last Updated:</strong></td>'+
            '<td>'+data.updated_at+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td><strong>Created:</strong></td>'+
            '<td>'+data.created_at+'</td>'+
        '</tr>'+
    '</table>';
  }

  // Add event listener for editing user.
  $('#table').on('click', '#edit', function() {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Set values for editUser form.
    $("#edit-form input[name=id]").val(data.id);   
    $("#edit-form input[name=username]").val(data.username);
    $("#edit-form input[name=firstName]").val(data.firstName);
    $("#edit-form input[name=lastName]").val(data.lastName);
    $("#edit-form select[name=role]").val(data.role).change();
    $("#edit-form select[name=Stationid]").val(data.Stationid).change();
    // Show modalEditUser modal.
    $('#modal-edit').modal('toggle');
  });

  // Add event listener for opening and closing details
  $('#table tbody').on('click', '#moreInfo', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );
      if ( row.child.isShown() ) {
          // This row is already open - close it
          row.child.hide();
          tr.removeClass('shown');
      }
      else {
          // Open this row
          row.child( format(row.data()) ).show();
          tr.addClass('shown');
      }
  });

  // Add event listener for deleting user.
  $('#table tbody').on('click', '#delete', function() {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Get user confirmation before proceeding.
    swal({
      title: "Are you sure?",
      text: "You are deleting user account: " + data.username + ".",
      icon: "warning",
      buttons: [true ,"Yes"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // User delete form function.
        $.ajax({
            type: 'DELETE',
            url: localStorage.getItem('api') + '/v1/user.php?id=' + data.id + '&token=' + localStorage.getItem('key'),
            success: function(response) {
              swal("Deleted user successfully.", "", "success");
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

  // User edit form function.
  $("#edit-form").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: localStorage.getItem('api') + '/v1/user.php?token=' + localStorage.getItem('key'),
          data: data,
          success: function(response) {
              swal("User account saved successfully.", "", "success");
              $('#modal-edit').modal('hide');
              table.ajax.reload( null, false );
          },
          error: function(status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
          }
      });
  });

  // User create form function.
  $("#create-form").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: localStorage.getItem('api') + '/v1/user.php?token=' + localStorage.getItem('key'),
          data: data,
          success: function(response) {
              swal("User account created successfully.", "", "success");
              $('#modal-create').modal('hide');
              table.ajax.reload( null, false );
          },
          error: function(status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
          }
      });
  });

});