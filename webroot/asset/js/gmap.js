google.maps.event.addDomListener(window, 'load', function()
        {
            // La Guardia Flats2の経緯度
            var lng = <?php echo $this->viewOptions['lng']; ?>;
            var lat = <?php echo $this->viewOptions['lat']; ?>;
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
            // google.maps.event.addListener(mapObj, 'click', function(e)
            // {
            //     // ポジションを変更
            //     markerObj.position = e.latLng;
            //     // マーカーをセット
            //     markerObj.setMap(mapObj);
            //     alert("経度:" + e.latLng.lat() + "  緯度:" + e.latLng.lng());
            // })
        });