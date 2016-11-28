<div  ng-repeat="i in map.kh_detail | filter:ten | filter: i.map.kh_detail.properties['stt']" ng-click="map.window.model===i"  ng-cloak="" class="sidenavdemoCustomSidenav" ng-controller="MapkhCtrl" >
                    <div  style="border: 0px solid black; margin-bottom: 5px;">
                        <h4>{{i.properties['ten']}}</h4>
                    </div>
</div>

<!--  <ul class="location-list" ng-controller="MapkhCtrl">
      <li  ng-repeat="i in map.kh_detail | filter:ten | filter: i.map.kh_detail.properties['stt']" ng-click="openInfoWindow($event, i)" >
                        <h4 >{{i.properties['ten']}} </h4>

      </li>
    </ul> -->
