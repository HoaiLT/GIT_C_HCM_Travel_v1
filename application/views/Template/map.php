<div  style="height:100%;">
    <ui-gmap-google-map id="map" 
                        center="map.center"
                        zoom="map.zoom"
                        events="map.events"
                        bounds="map.bounds"
                        options="map.options"
                        pan="true"
                        control="map.control">
        <ui-gmap-marker ng-repeat="m in map.markers" 
                        models="map.markers"  
                        coords="m.geometry" 
                        click="onMarkerClicked(m)"
                        idkey="m.id">
         <ui-gmap-window show="m.showWindow"
                         ng-cloak="">
         <div >
             <img src={{m.properties['hinh_anh']}} alt="{{m.properties['ten']}}" height="50" width="50" />
             <p>{{m.properties['ten']}}</p>
             <p class="muted">Địa chỉ:{{m.properties['phuong_xa']}}{{m.properties['quan_huyen']}} </p>
             <p>{{m.properties['gioi_thieu']}}</p>
             <a  ng-click="$root.windowClicked($parent.m.id)"> thong tin chi tiet</a>
         </div>
        </ui-gmap-window> 
     </ui-gmap-marker>

 </ui-gmap-google-map>
</div>         