<style>
.polaroid {
  width: 295px;
   box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.3);
  text-align: center;
}
.sidenavdemoCustomSidenav div:hover {
    box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.soflow {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 0px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 295px;
}

 #soflow-color {
   color: #58B14C;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
   background-color: blue;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 5px;
}

</style>
<div ng-controller="MapCtrl">
<select ng-model="selected" class="soflow" >
    <option  value="{{ }}">Chọn loại địa điểm </option>
    <option ng-repeat="x in loai_place" value="{{x.id}}">{{x.properties['ten_loai']}}</option>
</select>
<div ng-repeat="marker in map.markers | filter: selected" ng-click=" onSidebarClicked(marker)" ng-cloak="" class="sidenavdemoCustomSidenav" ng-controller="MapCtrl" >
            <div class="polaroid">
              <img src={{marker.properties['hinh_anh']}} alt="{{marker.properties['ten']}}"  style="width:100%"/>
                <p style="padding-top:8px; padding-bottom:10px; font-size:1.2em">{{marker.properties['ten']}}</p>
          </div>
</div>
</div>
