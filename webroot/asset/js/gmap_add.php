 <script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', function()
	{

		<?php if (isset($_SESSION['add']) && !empty($_SESSION['add'])): ?>
			 var lng = <?php echo $_SESSION['add']['lng']; ?>;
			 var lat = <?php echo $_SESSION['add']['lat']; ?>;
		 <?php else: ?>
			 var lng = 123.90381932258606;
			 var lat = 10.329200473939935;
		 <?php endif; ?>
		var latlng = new google.maps.LatLng(lat, lng);

		var mapOptions = {
			zoom: 15,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scaleControl: true
		};
		// マップを表示する
		var mapObj = new google.maps.Map(document.getElementById('gmap'), mapOptions);
		// マップ上にマーカーを表示する
		var markerObj = new google.maps.Marker({
			position: latlng,
			map: mapObj
		});

		// クリック時のイベント
		google.maps.event.addListener(mapObj, 'click', function(e)
		{
			// ポジションを変更
			markerObj.position = e.latLng;
			// マーカーをセット
			markerObj.setMap(mapObj);
			// alert("経度:" + e.latLng.lat() + "  緯度:" + e.latLng.lng());
			var lng = document.getElementById("lng");
			var lat = document.getElementById("lat");
			lng.innerHTML = "<input type='hidden' name='lng' id='lng' value='" + e.latLng.lng() + "'>";
			lat.innerHTML = "<input type='hidden' name='lat' id='lat' value='" + e.latLng.lat() + "'>";
		})
	});
</script>