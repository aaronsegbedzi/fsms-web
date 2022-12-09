$(function () {

  // Function to view map1.
  function viewMap(lat, lng) {

    var location = new google.maps.LatLng(lat, lng);

    map = new google.maps.Map(document.getElementById('map1'), {
      center: location,
      zoom: 19,
      mapTypeId: google.maps.MapTypeId.HYBRID
    });

    marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }

  // Function to edit map2.
  function editMap(lat, lng) {

    var location = new google.maps.LatLng(lat, lng);

    map = new google.maps.Map(document.getElementById('map2'), {
      center: location,
      zoom: 19,
      mapTypeId: google.maps.MapTypeId.HYBRID
    });

    marker = new google.maps.Marker({
      position: location,
      map: map,
      draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
      editMarkerLocation();
    });

    google.maps.event.addListener(map, 'click', function (event) {
      var clickedLocation = event.latLng;
      if (marker === false) {
        marker = new google.maps.Marker({
          position: clickedLocation,
          map: map
        });
      } else {
        marker.setPosition(clickedLocation);
      }
      editMarkerLocation();
    });
  }

  // Function to create map3.
  function createMap(lat, lng) {

    var location = new google.maps.LatLng(lat, lng);

    map = new google.maps.Map(document.getElementById('map3'), {
      center: location,
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.HYBRID
    });

    marker = new google.maps.Marker({
      position: location,
      map: map,
      draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
      createMarkerLocation();
    });

    google.maps.event.addListener(map, 'click', function (event) {
      var clickedLocation = event.latLng;
      if (marker === false) {
        marker = new google.maps.Marker({
          position: clickedLocation,
          map: map
        });
      } else {
        marker.setPosition(clickedLocation);
      }
      createMarkerLocation();
    });
  }

  // Sub function for map2.
  function editMarkerLocation() {
    var currentLocation = marker.getPosition();
    $("#edit-form input[name=latitude]").val(currentLocation.lat());
    $("#edit-form input[name=longitude]").val(currentLocation.lng());
  }

  // Sub function for map3.
  function createMarkerLocation() {
    var currentLocation = marker.getPosition();
    $("#create-form input[name=latitude]").val(currentLocation.lat());
    $("#create-form input[name=longitude]").val(currentLocation.lng());
  }

  // View more information for each row datatable.
  function format(data) {
    // `d` is the original data object for the row
    return '<table class="table table-bordered table-hover table-responsive text-left">' +
      '<tr>' +
      '<td><strong>No. Of Subscribers:</strong></td>' +
      '<td>' + data.subscriberCount + '</td>' +
      '</tr>' +
      '<tr>' +
      '<td><strong>Last Updated:</strong></td>' +
      '<td>' + data.updatedAt + '</td>' +
      '</tr>' +
      '<tr>' +
      '<td><strong>Created:</strong></td>' +
      '<td>' + data.createdAt + '</td>' +
      '</tr>' +
      '</table>';
  }

  // Initiate datatable for users.
  var table = $('#table').DataTable({
    ajax: localStorage.getItem('api') + '/v1/station.php?dataTable=true&token=' + localStorage.getItem('key'),
    responsive: true,
    dom: 'f<"toolbar">rtip',
    language: {
      searchPlaceholder: 'Search...',
      sSearch: ''
    },
    columns: [{
        "className": 'details-control',
        "orderable": false,
        "data": null,
        "defaultContent": '<i id="moreInfo" class="fa fa-info-circle text-info"></i>'
      },
      {
        'data': 'id'
      },
      {
        'data': 'location'
      },
      {
        'data': 'manager'
      },
      {
        'data': 'tankCount'
      }
    ],
    columnDefs: [{
      targets: 5,
      data: null,
      defaultContent: '<div class="btn-group" role="group" aria-label="Actions">' +
        '<button type="button" id="viewMap" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="left" title="Click this button to view this stations location on a map."><i class="fa fa-map-marker"></i></button>' +
        '<button type="button" id="view" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="Click this button to view this station."><i class="fa fa-eye"></i></button>' +
        '<button id="edit" type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Click this button to edit this station."><i class="fa fa-edit"></i></button>' +
        '<button id="delete" type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="left" title="Click this button to delete this station."><i class="fa fa-trash"></i></button>' +
        '</div>'
    }]
  });

  // Custom toolbar for datatable.
  $("div.toolbar").html('<button id="create" class="btn btn-success col-lg-3 col-12">' +
    '<span class="icon"><i class="fa fa-plus-square fa-lg"></i></span>' +
    '<span class="pd-x-15">New Filling Station</span>' +
    '</button>'
  );

  $('#create').on('click', function () {
    // Random coordinates for map initialization. (Accra Tetteh Quashie Interchange)
    createMap(5.623227, -0.176422);
    // View modal-create.
    $('#modal-create').modal('toggle');
  });

  // Add event listener for opening and closing details
  $('#table tbody').on('click', '#moreInfo', function () {
    var tr = $(this).closest('tr');
    var row = table.row(tr);
    if (row.child.isShown()) {
      // This row is already open - close it
      row.child.hide();
      tr.removeClass('shown');
    } else {
      // Open this row
      row.child(format(row.data())).show();
      tr.addClass('shown');
    }
  });

  // Add event listener for opening and closing details
  $('#table tbody').on('click', '#view', function () {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Set Stationid for station/view.php page.
    localStorage.setItem('Stationid', data.id);
    window.location.href = '/station/view.php';
  });

  // Add event listener for opening and closing details
  $('#table tbody').on('click', '#viewMap', function () {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    viewMap(data.latitude, data.longitude);
    // Show modalViewMap modal.
    $('#modal-view-map').modal('toggle');
  });

  // Add event listener for editing station.
  $('#table').on('click', '#edit', function () {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Set values for edit form.
    $("#edit-form input[name=id]").val(data.id);
    $("#edit-form input[name=location]").val(data.location);
    $("#edit-form input[name=latitude]").val(data.latitude);
    $("#edit-form input[name=longitude]").val(data.longitude);
    editMap(data.latitude, data.longitude);
    // Show modal-edit modal.
    $('#modal-edit').modal('toggle');
  });

  // Add event listener for deleting station.
  $('#table tbody').on('click', '#delete', function () {
    // Get data from row selected.
    var data = table.row($(this).parents('tr')).data();
    // Get user confirmation before proceeding.
    swal({
        title: "Are you sure?",
        text: "You are deleting this station: " + data.location + ".",
        icon: "warning",
        buttons: [true, "Yes"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          // Station delete form function.
          $.ajax({
            type: 'DELETE',
            url: localStorage.getItem('api') + '/v1/station.php?id=' + data.id + '&token=' + localStorage.getItem('key'),
            success: function (response) {
              swal("Deleted filling station successfully.", "", "success");
              table.ajax.reload(null, false);
            },
            error: function (status) {
              swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
            }
          });
        }
      });
  });

  // Station edit form function.
  $("#edit-form").submit(function (event) {
    event.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: localStorage.getItem('api') + '/v1/station.php?token=' + localStorage.getItem('key'),
      data: data,
      success: function (response) {
        swal("Filling station saved successfully.", "", "success");
        $('#modal-edit').modal('hide');
        table.ajax.reload(null, false);
      },
      error: function (status) {
        swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
      }
    });
  });

  // Station create form function.
  $("#create-form").submit(function (event) {
    event.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: localStorage.getItem('api') + '/v1/station.php?token=' + localStorage.getItem('key'),
      data: data,
      success: function (response) {
        swal("Filling station created successfully.", "", "success");
        $('#modal-create').modal('hide');
        table.ajax.reload(null, false);
      },
      error: function (status) {
        swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
      }
    });
  });
  
});