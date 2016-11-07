<div ng-repeat="marker in map.markers" ng-cloak="" class="sidenavdemoCustomSidenav" ng-controller="MapCtrl">                                       
    <md-content ng-click="toggleLeft()" ui-sref="detail({id: marker.id,hinhanh: marker.properties['hinh_anh'],ten:marker.properties['ten'],geometry:marker.geometry['coordinates'],quanhuyen:marker.properties['quan_huyen'],phuongxa:marker.properties['phuong_xa'],gioithieu:marker.properties['gioi_thieu']})" ui-sref-active  flex="" layout-padding="" style=" border: 0px solid black;padding-left: 10px;" ng-controller="MapCtrl">
            <div  style="border: 0px solid black; margin-bottom: 5px;">
              <img src={{marker.properties['hinh_anh']}} alt="{{marker.properties['ten']}}" height="150" width="250" /> 
                <h4>{{marker.properties['ten']}}</h4>
                          <p>{{marker.properties['dia_chi']}}</p>
                          <p>Tọa độ:{{marker.geometry.coordinates}}</p>
            </div>
    </md-content>
</div>
