
<div  style="height:100%;"  >


    <ui-gmap-google-map id="map"
                        center="map.center"
                        zoom="map.zoom"
                        bounds="map.bounds"
                        options="map.window.options"
                        pan="true"
                        control="map.control"
                         >
         <ui-gmap-window show="inforWindow.show" coords="inforWindow.coords" isIconVisibleOnClick="false" options="inforWindow.options" ng-cloak>
            <div>
                <p>Diem bat dau hanh trinh</p>
            </div>
        </ui-gmap-window>


         <ui-gmap-markers models="filtermarkers" fit="true" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events" click='Onclick' >
        </ui-gmap-markers>
        <ui-gmap-window  ng-cloak=""
                     show="map.window.show"
                    coords="map.window.model.geometry"
                     templateUrl="'./info_kehoach.tpl'"
                     templateParameter="map.window.model"
                     options="map.window.options"
                    closeClick="map.window.closeClick()">
          </ui-gmap-window>

        <ui-gmap-polyline path="polyline.path" stroke="polyline.stroke" visible='polyline.visible' geodesic='polyline.geodesic' fit="false"  >
        </ui-gmap-polyline>



 </ui-gmap-google-map>

</div>
<!-- <div class="row" ng-repeat="i in filtermarkers track by $id($index)" ng-class="{selected: i === map.window.model}"  ng-click="map.window.model = i"  ng-cloak="" class="sidenavdemoCustomSidenav" ng-controller="MapkhCtrl" >
                    <div  style="border: 0px solid black; margin-bottom: 5px;">
                        <h4>{{i.properties['ten']}}</h4>
                    </div>
</div>
 -->
