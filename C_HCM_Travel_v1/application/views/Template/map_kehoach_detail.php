
<div  style="height:100%;"  >


    <ui-gmap-google-map id="map"
                        center="map.center"
                        zoom="map.zoom"
                        bounds="map.bounds"
                        options="map.window.options"
                        pan="true"
                        control="map.control"
                         >
<ui-gmap-window  ng-repeat="site in diem_dau " coords="{latitude: site.latitude, longitude: site.longitude}"  show="true">
            <span class="w3-tag w3-xlarge w3-padding w3-orange w3-center w3-hover-shadow">
                    <strong>Bắt đầu!</strong>
               </span>
 </ui-gmap-window>

 <ui-gmap-window  ng-repeat="site in diem_cuoi " coords="{latitude: site.latitude, longitude: site.longitude}"  show="true">
           <span class="w3-tag w3-xlarge w3-padding w3-orange w3-center">
                    <strong>Kết thúc!</strong>
               </span>
 </ui-gmap-window>

         <ui-gmap-markers models="filtermarkers" fit="true" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events"  doCluster=true>
        </ui-gmap-markers>

        <ui-gmap-window  ng-cloak=""
                     show="map.window.show"
                    coords="map.window.model.geometry"
                     templateParameter="map.window.model"
                     templateUrl="'./info_kehoach.tpl'"
                     options="map.window.options"
                    closeClick="map.window.closeClick()">
        </ui-gmap-window>

        <ui-gmap-polyline path="polyline.path" stroke="polyline.stroke" visible='polyline.visible' geodesic='polyline.geodesic' fit="false"  >
        </ui-gmap-polyline>



 </ui-gmap-google-map>

</div>

<!--   <div class="container" style="width:565px;">
        <div class="slider slider-for" style="width:595px;">
            <div><iframe src="https://www.youtube.com/embed/-Q9N6AtH9PQ?showinfo=0&controls=0" width=595 height=376 frameborder="0"></iframe></div>
        </div>
        <div class="slider slider-nav" style="width:150px">
            <div><img width=150 height=90 src="https://img.youtube.com/vi/-Q9N6AtH9PQ/3.jpg" alt="Wicked"></div>
        </div>
    </div>
 -->

