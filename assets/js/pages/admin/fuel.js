$(function() {

  // Initiate datatable for products.
  var table = $('#table').DataTable({
    ajax: localStorage.getItem('api') + '/v1/fuel.php?token=' + localStorage.getItem('key'),
    responsive: true,
    dom: 'f<"toolbar">rtip',
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    },
    columns: [
      { 'data': 'id' },
      { 'data': 'name' },
      { 'data': 'density' },
      { 'data': 'unit' },
    ],
    columnDefs: [{
      targets: 4,
      data: null,
      defaultContent: '<div class="btn-group" role="group" aria-label="Actions">' + 
        '<button id="edit" type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Click this button to edit this product."><i class="fa fa-edit"></i></button>' + 
        '<button id="delete" type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Click this button to delete this product."><i class="fa fa-trash"></i></button>' +
        '</div>'
    }]
  });

  $('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity
  });

  // Custom toolbar for datatable.
  $("div.toolbar").html('<button id="create" class="btn btn-success col-lg-3 col-12" data-toggle="modal" data-target="#modal-create">' +
      '<span class="icon"><i class="fa fa-plus-square fa-lg"></i></span>' +
      '<span class="pd-x-15">New Product</span>' +
    '</button>'
  );

  // Add event listener for editing Product.
  $('#table').on('click', '#edit', function() {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Set values for edit-form form.
    $("#edit-form input[name=id]").val(data.id);   
    $("#edit-form input[name=name]").val(data.name);
    $("#edit-form input[name=density]").val(data.density);
    $("#edit-form input[name=unit]").val(data.unit);
    // Show modal-edit modal.
    $('#modal-edit').modal('toggle');
  });

  // Add event listener for deleting product.
  $('#table tbody').on('click', '#delete', function() {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Get user confirmation before proceeding.
    swal({
      title: "Are you sure?",
      text: "You are deleting the product: " + data.name + ".",
      icon: "warning",
      buttons: [true ,"Yes"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // product delete form function.
        $.ajax({
            type: 'DELETE',
            url: localStorage.getItem('api') + '/v1/fuel.php?id=' + data.id + '&token=' + localStorage.getItem('key'),
            success: function(response) {
              swal("Deleted product successfully.", "", "success");
              table.ajax.reload( null, false );
            },
            error: function(status) {
                swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
            }
        });
      }
    });
  });

  // product edit form function.
  $("#edit-form").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: localStorage.getItem('api') + '/v1/fuel.php?token=' + localStorage.getItem('key'),
          data: data,
          success: function(response) {
              swal("Product saved successfully.", "", "success");
              // Hide the edit modal form.
              $('#modal-edit').modal('hide');
              // Reload datatable.
              table.ajax.reload( null, false );
          },
          error: function(status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
          }
      });
  });

  // product create form function.
  $("#create-form").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
          type: 'POST',
          url: localStorage.getItem('api') + '/v1/fuel.php?token=' + localStorage.getItem('key'),
          data: data,
          success: function(response) {
              swal("Product created successfully.", "", "success");
              $('#modal-create').modal('hide');
              table.ajax.reload( null, false );
          },
          error: function(status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
          }
      });
  });

});