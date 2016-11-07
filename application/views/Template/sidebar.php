<div ng-repeat="marker in map.markers" ng-cloak="" class="sidenavdemoCustomSidenav" ng-controller="MapCtrl">                                       
    <md-content ng-click="onclickDetail(marker)" flex="" layout-padding="" style=" border: 0px solid black;padding-left: 10px;" ng-controller="MapCtrl">
            <div  style="border: 0px solid black; margin-bottom: 5px;">
              <img src={{marker.properties['icon']}} alt="{{marker.properties['ten']}}" height="150" width="250" /> 
                <h4>{{marker.properties['ten']}}</h4>
                          <p>{{marker.properties['dia_chi']}}</p>
                          <p>Tọa độ:{{marker.geometry.coordinates}}</p>
            </div>
    </md-content>
</div>
