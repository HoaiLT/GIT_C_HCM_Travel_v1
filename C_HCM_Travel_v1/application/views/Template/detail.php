<img src="{{hinhanh}}" alt="{{ten}}" height="150" width="250" />
  <p style="padding: 10px 5px 5px 10px;">{{ten}}</p>
  <p>{{phuongxa}}{{quanhuyen}}{{geometry}}</p>
  <p>{{id}}</p>
  <div ng-controller="MapCtrl" ng-repeat="t in tour_lienquan | filter: ten"  ng-cloak="" class="sidenavdemoCustomSidenav" >                                       
    <md-content  flex="" layout-padding="" style=" border: 0px solid black;padding-left: 10px;" >
            <div  style="border: 0px solid black; margin-bottom: 5px;">
             
                <a href="#"><h4>{{t.properties['ten_tour']}}</h4></a>
                          
            </div>
    </md-content>
</div>
