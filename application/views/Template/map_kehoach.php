<div  style="height:100%;" ng-controller="MapkhCtrl">
    <ui-gmap-google-map id="map"
                        center="map.center"
                        zoom="map.zoom"
                        bounds="map.bounds"
                        options="map.window.options"
                        pan="true"
                        control="map.control"
                        events="map.events">

        <ui-gmap-markers  models="map.markers"  fit="true" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events" >
                <ui-gmap-window
                     show="map.window.show"
                     coords="map.window.model.geometry"
                     templateUrl="'./info_kehoach.tpl'"
                     templateParameter="map.window.model"
                     options="map.window.options"
                    closeClick="map.window.closeClick()">
                     ng-cloak>
                </ui-gmap-window>
        </ui-gmap-markers>


 </ui-gmap-google-map>
</div>


