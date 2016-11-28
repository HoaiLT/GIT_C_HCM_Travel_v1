<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <link href="<?php echo base_url();?>public/libs/css/bootstrap.min.css" rel="stylesheet">
        <title>Tìm đường đi</title>
        <link href="<?php echo base_url(); ?>public/map_libs/css/directions.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <script>
            function initMap() {
              var origin_place_id = null;
              var destination_place_id = null;
              var travel_mode = 'DRIVING';
              var directionsService = new google.maps.DirectionsService;
              var directionsDisplay = new google.maps.DirectionsRenderer;
              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: {lat:10.768598, lng:106.706647},
                mapTypeControl:true,
                mapTypeControlOptions: {
                  style:google.maps.MapTypeControlStyle.DEFAULT,
                  position:google.maps.ControlPosition.RIGHT_TOP
                },
                mapTypeId: google.maps.MapTypeId.ROADMAP
              });
              directionsDisplay.setMap(map);
              directionsDisplay.setPanel(document.getElementById('left-panel'));
              var origin_input= document.getElementById('start1');
              var destination_input= document.getElementById('end1');
//              var modes = document.getElementById('mode-selector');
              // places-autocomplete-directions
              var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
                origin_autocomplete.bindTo('bounds', map);
              var destination_autocomplete =new google.maps.places.Autocomplete(destination_input);
               destination_autocomplete.bindTo('bounds', map);

              
               var control = document.getElementById('direct');
                control.style.display = 'block';
                map.controls[google.maps.ControlPosition.LEFT_TOP].push(control);
                               
                //travelmode
                 function setupClickListener(id, mode) {
                    var radioButton = document.getElementById(id);
                    radioButton.addEventListener('click', function() {
                      travel_mode = mode;
                    });
                  }
                  setupClickListener('changemode-walking', 'WALKING');
                  setupClickListener('changemode-transit', 'TRANSIT');
                  setupClickListener('changemode-driving', 'DRIVING');
                //end
                
                function expandViewportToFitPlace(map, place) {
                if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
                } else {
                  map.setCenter(place.geometry.location);
                  map.setZoom(17);
                }
              }

              origin_autocomplete.addListener('place_changed', function() {
              
                var place = origin_autocomplete.getPlace();
                if (!place.geometry) {
                  window.alert("Địa điểm không tồn tại");
                  return;
                }
                expandViewportToFitPlace(map, place);   
                 
                // If the place has a geometry, store its place ID and route if we have
                // the other place ID
                origin_place_id = place.place_id;
                route(origin_place_id, destination_place_id, travel_mode,
                      directionsService, directionsDisplay);
              });

              destination_autocomplete.addListener('place_changed', function() {
                
                var place = destination_autocomplete.getPlace();
                if (!place.geometry) {
                  window.alert("Địa điểm không tồn tại");
                  return;
                }
                expandViewportToFitPlace(map, place);
               
                // If the place has a geometry, store its place ID and route if we have
                // the other place ID
                
                destination_place_id = place.place_id;
                route(origin_place_id, destination_place_id, travel_mode,
                      directionsService, directionsDisplay);
              });

              function route(origin_place_id, destination_place_id, travel_mode,
                             directionsService, directionsDisplay) {
                if (!origin_place_id || !destination_place_id) {
                  return;
                }
              
//              var onChangeHandler = function() {
//                calculateAndDisplayRoute(directionsService, directionsDisplay);
//              };
////              document.getElementById('start1').addEventListener('change', onChangeHandler);
//              document.getElementById('end1').addEventListener('change', onChangeHandler);
//            }

            //function calculateAndDisplayRoute(directionsService, directionsDisplay) {
              directionsService.route({
                origin: {'placeId': origin_place_id},
                destination: {'placeId': destination_place_id},
                travelMode: travel_mode
              }, function(response, status) {
                if (status === 'OK') {
                  directionsDisplay.setDirections(response);
                } else {
                  window.alert('Directions request failed due to ' + status);
                }
              });
            }
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoENVtyhvBsIluOlce3u_oUcbbvV7BeuI&libraries=places&language=vi&callback=initMap" async defer> </script>
        <script>
          function ClearStart1(){
          document.getElementById('start1').value ='';        
          }  
          function ClearEnd1(){
          document.getElementById('end1').value ='';        
          } 
        </script>
        <div id="direct">
            
                <h4>Tìm đường đi</h4>
                <input type="text" id="start1" class="search-query " value="" placeholder="Điểm bắt đầu"> 
                <button id="clearstart1" onclick="ClearStart1()" style="background-color: #AED1FF; border: 1px solid white;">Xóa</button>
                <input type="text" id="end1" class="search-query " value="" placeholder="Điểm kết thúc" >
                <button id="clearend1" onclick="ClearEnd1()" style="background-color: #AED1FF; border: 1px solid white;">Xóa</button>
                <div id="mode-selector" class="controls">
                <input type="radio" name="type" id="changemode-walking" >
                <label for="changemode-walking">Walking</label>

                <input type="radio" name="type" id="changemode-transit">
                <label for="changemode-transit">Transit</label>

                <input type="radio" name="type" id="changemode-driving" checked="checked">
                <label for="changemode-driving">Driving</label>
              </div>

                <hr>
           
            <div id="left-panel" ></div>  
           
        </div> 
        <div id="map"></div>
       
    </body>
</html>
