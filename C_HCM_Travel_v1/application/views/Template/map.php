<div  style="height:100%;">
    <ui-gmap-google-map id="map"
                        center="map.center"
                        zoom="map.zoom"
                        bounds="map.bounds"
                        options="map.window.options"
                        pan="true"
                        control="map.control">

        <ui-gmap-markers models="map.markers" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events">
        </ui-gmap-markers>

         <ui-gmap-markers models="map.hotels" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events_detail"  doCluster=true>
        </ui-gmap-markers>

        <ui-gmap-markers models="map.xang" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events_detail"  doCluster=true>
        </ui-gmap-markers>

         <ui-gmap-markers models="map.yte" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events_detail"  doCluster=true>
        </ui-gmap-markers>
         <ui-gmap-window
             show="map.window.show"
             coords="map.window.model.geometry"
             templateUrl="'./info.tpl'"
             templateParameter="map.window.model"
             options="map.window.options"
            closeClick="map.window.closeClick()">
        </ui-gmap-window>
 </ui-gmap-google-map>
</div>


