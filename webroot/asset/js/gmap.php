<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', function()
		{
			// 登録地点を編集した場合、その値をPOSTで取得し表示
			// 編集が行われなかった場合、元々DBに登録されていた値を取得し表示
			<?php if (isset($_POST['lng']) && isset($_POST['lat'])): ?>
			var lng = <?php echo htmlspecialchars($_POST['lng']) ?>;
			var lat = <?php echo htmlspecialchars($_POST['lat']) ?>;
			<?php else: ?>
			var lng = <?php echo $this->viewOptions['lng']; ?>;
			var lat = <?php echo $this->viewOptions['lat']; ?>;
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
		});
</script>
