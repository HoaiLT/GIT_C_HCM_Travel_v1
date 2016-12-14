<div  style="height:100%;" ng-controller="MapkhCtrl">
    <ui-gmap-google-map id="map"
                        center="map.center"
                        zoom="map.zoom"
                        bounds="map.bounds"
                        options="map.window.options"
                        pan="true"
                        control="map.control"
                        events="map.events">

        <ui-gmap-markers  models="map.diadiem"  fit="true" idKey="'id'" icon="'icon'" coords="'geometry'" events="map.events"  doCluster=true>

        <ui-gmap-window
             show="map.window.show"
             coords="map.window.model.geometry"
             options="map.window.options"
            closeClick="map.window.closeClick()">
                <div>
                          <h4>{{map.window.model.properties['ten']}}</h4>
                              <p  style="width:200px;">Địa chỉ:{{map.window.model.properties['phuong_xa']}}{{map.window.model.properties['quan_huyen']}} </p>
                         <div class="w3-container" ng-controller="MapkhCtrl">
                                <iframe ng-src="{{url}}" width=500 height=500 frameborder="0"> </iframe>
                         </div>

                </div>
        </ui-gmap-window>
     </ui-gmap-markers>
 </ui-gmap-google-map>
</div>
