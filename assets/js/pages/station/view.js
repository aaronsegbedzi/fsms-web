var latitude;
var longitude;

$.getJSON(localStorage.getItem('api') + '/v1/tank.php', {
	'Stationid': localStorage.getItem('Stationid'),
	'token': localStorage.getItem('key')
}, function (data) {

	// Get station information from first object.
	$('.manager').text(data['data'][0]['manager']);
	$('.username').text(data['data'][0]['username']);
	$('.location').text(data['data'][0]['location']);
	$('.coordinates').text(data['data'][0]['latitude'] + ' , ' + data['data'][0]['longitude']);
	$('.subscribers').text(data['data'][0]['subscribers']);
	$('.updatedAt').text('Last Updated: ' + data['data'][0]['updatedAt']);
	$('.createdAt').text('Created: ' + data['data'][0]['createdAt']);

	// Set values for latitude and longitude.
	latitude = data['data'][0]['latitude'];
	longitude = data['data'][0]['longitude'];

	$.each(data, function (i) {
		$.each(data[i], function (key, val) {

			// Generate dom HTML for tanks.
			$('<div/>', {
				class: 'col-lg-4',
				html: $('<div/>', {
					class: 'card',
					html: $('<div/>', {
						class: 'card-header bg-light bd-b bd-2',
						html: $('<div/>', {
							html: $('<span/>', {
								class: 'tx-11',
								text: 'Tank UID:'
							}).add(
								$('<h6/>', {
									class: 'tx-inverse',
									text: '#' + val.uid
								})
							)
						}).add(
							$('<div/>', {
								html: $('<span/>', {
									class: 'tx-11',
									text: 'Volume:'
								}).add(
									$('<h6/>', {
										id: 'volume' + key,
										class: 'tx-inverse',
										text: 'N/A'
									})
								)
							})
						).add(
							$('<div/>', {
								html: $('<span/>', {
									class: 'tx-11',
									text: 'Refresh:'
								}).add(
									$('<h6/>', {
										id: 'volume' + key,
										class: 'tx-inverse',
										text: 'N/A'
									})
								)
							})
						).add(
							$('<div/>', {
								html: $('<ul/>', {
									class: 'nav nav-tabs',
									html: $('<li/>', {
										class: 'nav-item',
										html: '<a class="btn active" data-toggle="tab" href="#gauge' + key + '">' +
											'<i class="icon ion-speedometer tx-22 tx-dark"></i>' +
											'</a>'
									}).add(
										$('<li/>', {
											class: 'nav-item',
											html: '<a class="btn" data-toggle="tab" href="#bar' + key + '">' +
												'<i class="icon ion-connection-bars tx-22 tx-dark"></i>' +
												'</a>'
										})
									)
								})
							})
						)
					}).add(
						$('<div/>', {
							class: 'card-body tab-content bg-light bd-b bd-2',
							html: $('<div/>', {
								id: 'gauge' + key,
								class: 'tab-pane container active',
								html: $('<div/>', {
									id: 'gaugeChart' + key
								})
							}).add(
								$('<div/>', {
									id: 'bar' + key,
									class: 'tab-pane container',
									style: 'overflow: scroll !important;',
									html: $('<div/>', {
										id: 'lineChart' + key
									})
								})
							)
						})
					)
				})
			}).appendTo('#dashboard');

			// Get Gauge chat data from api.
			$.getJSON(localStorage.getItem('api') + '/v1/reading.php', {
				'Tankuid': val.uid,
				'gauge': true,
				'token': localStorage.getItem('key')
			}, function (data) {
				$('#volume' + key).text(data['payload'][0]['volume'] + ' Litres');
				zingchart.render({
					id: 'gaugeChart' + key,
					data: data,
					height: "300"
				});
			});

			// Get line chart data from api.
			$.getJSON(localStorage.getItem('api') + '/v1/reading.php', {
				'Tankuid': val.uid,
				'line': true,
				'token': localStorage.getItem('key')
			}, function (data) {
				zingchart.render({
					id: 'lineChart' + key,
					data: data,
					height: "300"
				});
			});

		});
	});
});

// Function to view map
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

// Add event listener for opening and closing details
$('#viewMap').on('click', function () {
	viewMap(latitude, longitude);
	// Show modalViewMap modal.
	$('#modal-view-map').modal('toggle');
});