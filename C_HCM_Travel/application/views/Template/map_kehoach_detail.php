<div  style="height:100%;">
    <ui-gmap-google-map id="map"
                        center="map.center"
                        zoom="map.zoom"
                        bounds="map.bounds"
                        options="map.window.options"
                        pan="true"
                        control="map.control">

        <ui-gmap-markers  models="filtermarkers"  idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events">
        </ui-gmap-markers>
<ui-gmap-polyline path="polyline.path" stroke="polyline.stroke" visible='polyline.visible' geodesic='polyline.geodesic' fit="false">
</ui-gmap-polyline>

 <!-- <ui-gmap-polyline ng-repeat="p in map.polylines" path="p.path" stroke="p.stroke" visible='p.visible'
            geodesic='p.geodesic' fit="false" editable="p.editable" draggable="p.draggable"></ui-gmap-polyline> -->

         <ui-gmap-window
             show="map.window.show"
             coords="map.window.model.geometry"
             templateUrl="'./info_kehoach.tpl'"
             templateParameter="map.window.model"
             options="map.window.options"
             ng-cloak>
        </ui-gmap-window>

 </ui-gmap-google-map>
</div>


