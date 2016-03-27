<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', function()
		{
			// 初期値はelse以下の部分、つまりDBに登録されている経緯度が表示される
			// 確認画面に一度行き、再度編集する場合はsessionに保存された値で経緯度を表示
			<?php if (isset($_SESSION['edit']) && !empty($_SESSION['edit'])): ?>
				var lng = <?php echo $_SESSION['edit']['lng']; ?>;
				var lat = <?php echo $_SESSION['edit']['lat']; ?>;
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
