<style>

div.polaroid {
  width: 295px;
   box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.3);
  text-align: center;
}
.sidenavdemoCustomSidenav div:hover {
    box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style>
<div ng-repeat="marker in map.markers" ng-click=" onSidebarClicked(marker)" ng-cloak="" class="sidenavdemoCustomSidenav" ng-controller="MapCtrl" >
            <div class="polaroid">
              <img src={{marker.properties['hinh_anh']}} alt="{{marker.properties['ten']}}"  style="width:100%"/>
                <p style="padding-top:8px; padding-bottom:10px; font-size:1.2em">{{marker.properties['ten']}}</p>
          </div>
</div>

