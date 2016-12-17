<!DOCTYPE html>
<html  lang="en" ng-app="MyApp2">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Kế hoạch của tôi</title>

  <link href="<?php echo base_url();?>public/libs/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/libs/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
   <!-- Angular Material requires Angular.js Libraries -->
   <script src="<?php echo base_url();?>public/libs/scripts/angular.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/map_libs/scripts/mapkh_detail.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/libs/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>

    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 70%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
      }


       .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0px 20px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      .controls:focus {
        border-color: #4d90fe;
      }
      .title {
        font-weight: bold;
      }
      #infowindow-content {
        display: none;
      }
      #map #infowindow-content {
        display: inline;
      }
    </style>
  </head>
  <body ng-controller="MyplanCtrl" style="margin-top: 60px;">
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation"
     style="background-color:white;border:1px solid  #c2dcff;">
             <div class='row' >
                <div class='col-md-4' >
                  <div class="navbar-header" >
                        <div style="padding-left:8px; border-right:1px solid  #c2dcff;">
                             <a href="<?php echo base_url(); ?>">
                                    <img src="<?php echo base_url(); ?>public/map_libs/img/hcm.png"
                                    style="margin-bottom: 10px;margin-right: 30px;"/>
                             </a>
                        </div>
                    </div>
                   <div style="padding-right:8px; padding-left:180px;border-right:1px solid #c2dcff;padding-top: 2px;height: 60px;">
                       <h3 style="margin-bottom: 0px;">Du lịch Hồ Chí Minh</h3>
                  </div>
           </div>
               <!--  SEARCH BOX -->
                  <div class='col-md-3' style="border-right:1px solid w3-hover-black; height: 60px; padding-top: 10px;">
                  </div>
                  <div  class='col-md-3' style="border-right:1px solid #c2dcff; height: 60px;">
                         <input id="pac-input"  type="text" placeholder="Nhập địa điểm bạn cần tìm...">
                </div>

               <div class='col-md-2' style="height: 60px;">
                    <div  ui-view="login" style="margin-top: 10px;"></div>
             </div>
          </div>
 </nav>
    <div id="map"></div>
    <div id="infowindow-content">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
    <div id="right-panel">
    <div>
        <b>Địa điểm du lịch bắt đầu hành trình:</b>
        <select id="start">
          <option  value="{{ }}"> </option>
          <option ng-repeat="x in diadiem" value="{{x.properties['ten_google']}}">{{x.properties['ten']}}</option>
        </select>
        <br>
        <b>Các địa điểm du lịch khác: </b> <br>
        <i>(Nhấn Ctrl+Click hoặc Cmd+Click để chọn nhiều địa điểm)</i> <br>
        <select multiple id="waypoints" >
          <option ng-repeat="x in diadiem" value="{{x.properties['ten_google']}}">{{x.properties['ten']}}</option>

        </select>
        <br>
        <b>Địa điểm du lịch kết thúc hành trình:</b>
        <select id="end">
         <option  value="{{ }}"> </option>
         <option ng-repeat="x in diadiem" value="{{x.properties['ten_google']}}">{{x.properties['ten']}}</option>
        </select>
        <br>
        <b>Chọn phương tiện: </b>
        <select id="mode">
          <option value=""></option>
            <option value="DRIVING">Xe ô tô</option>
            <option value="WALKING">Đi bộ</option>
            <option value="BICYCLING">Xe đạp</option>
            <option value="TRANSIT">Xe buýt</option>
        </select>
    </div>
    <div id="directions-panel"></div>
    </div>
    <script>
         function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 10.774114, lng: 106.688571}
        });

        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            return;
          }
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }

          // Set the position of the marker using the place ID and location.
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
          });
          marker.setVisible(true);

          document.getElementById('place-name').textContent = place.name;
          document.getElementById('place-address').textContent = place.formatted_address;
          infowindow.setContent(document.getElementById('infowindow-content'));
          infowindow.open(map, marker);
        });

        directionsDisplay.setMap(map);

        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }

        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
           travelMode: google.maps.TravelMode[document.getElementById('mode').value]
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Chặng đường: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' đến ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br><b>Khoảng cách:</b>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><b>Thời gian di chuyển:</b>';
              summaryPanel.innerHTML += route.legs[i].duration.text  + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAePY8xEeKl8-3U1GqmcrYl6OdPPtyOH5k&libraries=places&callback=initMap">
    </script>
  </body>
</html>
