<div  style="height:100%;">
    <ui-gmap-google-map id="map"
                        center="map.center"
                        zoom="map.zoom"
                        bounds="map.bounds"
                        options="map.window.options"
                        pan="true"
                        control="map.control">

        <ui-gmap-markers  models="filtermarkers" fit="true" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events_detail" >
        </ui-gmap-markers>

         <ui-gmap-markers models="map.hotels" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events_detail"  doCluster=true>
        </ui-gmap-markers>

        <ui-gmap-markers models="map.xang" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events_detail"  doCluster=true >
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
             ng-cloak>
        </ui-gmap-window>
 </ui-gmap-google-map>

 <div ng-controller="MapCtrl">
        <div id="id" class="w3-modal">
            <div class="w3-modal-content" style="display: block;margin-left: 350px;">
             <span onclick="document.getElementById('id').style.display='none'"  class="w3-closebtn">&times;</span>
                <div class="w3-container">
                     <div class="w3-row-padding w3-margin-top w3-margin-bottom" >
                        <div  class="w3-third" ng-repeat="marker in hinh_anh | filter: id"  ng-controller="MapCtrl">
                             <div class="w3-card-2 w3-margin-top">
                                  <img src={{marker.properties['url']}} alt="{{marker.properties['ten']}}"  style="width:268px;height:145px"/>
                            </div>
                      </div>
                    </div>
                </div>
             </div>
        </div>
</div>
</div >




