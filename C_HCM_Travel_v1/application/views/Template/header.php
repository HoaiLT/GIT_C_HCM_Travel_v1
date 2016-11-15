<!DOCTYPE html>
<html lang="en" ng-app="MyApp" >
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang chủ</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>public/libs/css/bootstrap.min.css" rel="stylesheet">
  <!-- Angular Material style sheet -->
  <link href="<?php echo base_url();?>public/libs/css/angular-material.min.css" rel="stylesheet" type="text/css"/>
   <!-- Angular Material requires Angular.js Libraries -->
   <script src="<?php echo base_url();?>public/libs/scripts/angular.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>public/libs/scripts/angular-route.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/scripts/angular-resource.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>public/libs/scripts/lodash.js" type="text/javascript"></script>
     <script src="<?php echo base_url(); ?>public/libs/scripts/angular-simple-logger.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>public/libs/scripts/angular-google-maps.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/libs/scripts/angular-animate.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/libs/scripts/angular-aria.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/libs/scripts/angular-messages.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>public/libs/scripts/angular-ui-router.js" type="text/javascript"></script>
  <!-- Angular Material Library -->
  <script src="<?php echo base_url(); ?>public/libs/scripts/angular-material.min.js" type="text/javascript"></script>
  <link href="<?php echo base_url(); ?>public/map_libs/css/custom_map.css" rel="stylesheet" type="text/css"/>
  <!-- Your application bootstrap  --> 
  <link href="<?php echo base_url(); ?>public/map_libs/css/directions.css" rel="stylesheet" type="text/css"/>
  <script src="<?php echo base_url(); ?>public/map_libs/scripts/map.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/libs/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
 #markerLayer img {
        border: 2px solid red !important;
        border-radius: 50%;
      }
  #nut:hover {
      background: white;
  }
 .angular-google-map-container {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
  </style>  
  <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "320px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
</head>
<body>
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding-right: 5px;">        
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
              
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="<?php echo base_url(); ?>">Trang chủ</a>
          <a href="<?php echo base_url(); ?>Map_HCM_C/map_directions" target="blank"> Hướng dẫn đường đi</a>
           <a href="<?php echo base_url(); ?>Kehoach_C" target="blank">Kế hoạch du lịch của tôi.</a>
          <a href="<?php echo base_url(); ?>about.html">Giới thiệu</a>
          <a href="<?php echo base_url(); ?>contact.html">Liên hệ</a>
        
           
        </div>
            <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776;   Map Online</span>
          </div>
          <div class="navbar-collapse collapse">
              
             
<!--                <div class="navbar-right" style="border: 0px solid black; width: 630px;">             
                    <div ng-controller="DemoCtrl as ctrl" layout="column" ng-cloak="" class="autocompletedemoBasicUsage"style=" width: 430px; float: left;border: 0px solid black;margin-top: 5px;">
                        <form ng-submit="$event.preventDefault()">  
                          <md-autocomplete ng-disabled="ctrl.isDisabled" md-no-cache="ctrl.noCache" md-selected-item="ctrl.selectedItem" md-search-text-change="ctrl.searchTextChange(ctrl.searchText)" md-search-text="ctrl.searchText" md-selected-item-change="ctrl.selectedItemChange(item)" md-items="item in ctrl.querySearch(ctrl.searchText)" md-item-text="item.display" md-min-length="-3" placeholder="Tôi muốn đến.....">
                            <md-item-template>
                              <span md-highlight-text="ctrl.searchText" md-highlight-flags="^i" style="">{{item.display}}</span>
                            </md-item-template>
                            <md-not-found>
                             Rất tiếc địa điểm "{{ctrl.searchText}}" không tìm thấy.
                              <a ng-click="ctrl.newState(ctrl.searchText)">Create a new one!</a>
                            </md-not-found>
                          </md-autocomplete>  
                        </form>
                    </div>
                  <button class="btn btn-default navbar-btn" data-toggle="modal" data-target="#signupModal" style="float: right;"> Đăng ký</button> 
                  <button class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#signinModal" style="float: right; margin-right: 5px;">Đăng nhập</button>   
               </div>ng-click="close($event)" -->
            </div>    
 </nav>  
 <div  ng-controller="MapCtrl" ng-cloak="" class="tabsdemoDynamicHeight" style="margin-top: 52px;">
  <md-content>
    <md-tabs md-dynamic-height md-border-bottom>
      <md-tab label="Điểm du lịch">
          <div class="row">
              <md-sidenav  class="md-sidenav-left" md-component-id='left' md-disable-backdrop="" md-whiteframe="3" >                                
                   
                  <md-content layout-margin="" >
                        <md-button  ng-click="toggleLeft()" ui-sref="index()" class="md-accent" id="nut">                            
                          <span class="glyphicon glyphicon-arrow-left"></span>                           
                        </md-button> 
                        <div ui-view="detail"></div>
                        <div ui-view="detail_directions"></div>
                    </md-content>
               </md-sidenav>
              <div ng-show="show" id="direct">
                          <h4>Tìm đường đi</h4>
                          <input type="text" id="start1" class="search-query " value="" placeholder="Điểm bắt đầu"> 
                          <button id="clearstart1" onclick="ClearStart1()" style="background-color: #AED1FF; border: 1px solid white;">Xóa</button>
                          <input type="text" id="end1" class="search-query " value="" placeholder="Điểm kết thúc" >
                          <button id="clearend1" onclick="ClearEnd1()" style="background-color: #AED1FF; border: 1px solid white;">Xóa</button>
                          <div id="mode-selector" class="controls">
                          <input type="radio" name="type" id="changemode-walking" >
                          <label for="changemode-walking">Walking</label>

                          <input type="radio" name="type" id="changemode-transit">
                          <label for="changemode-transit">Transit</label>

                          <input type="radio" name="type" id="changemode-driving" checked="checked">
                          <label for="changemode-driving">Driving</label>
                        </div>

                          <hr>

                      <div id="left-panel" ></div>  

                  </div> 

                <md-content class="md-padding" style="padding-top: 0px;">
                            <div  class="col-md-3" style=" border: 0px solid black;overflow: auto;padding-left: 10px; width:330px; height:600px " >
                                <div ui-view="sidebar"></div>
                               
                            </div>
                           <div  class="col-md-9" style="border: 0px solid black;height:600px; padding-left:2px; padding-right:2px;margin-right: 0px; margin-left: 2px;">               
<!--                                      <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-left: 500px; margin-top: 30px; width: 700px;">        
                                          <div>
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mymenu2">
                                                <span class="sr-only"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>

                                          </div>
                                          <div class="navbar-collapse collapse" id="mymenu2" >
                                              <ul class="nav navbar-nav" >
                                                  <li><a>Khách sạn</a></li>
                                                  <li><a href="">Tram xăng</a></li>
                                                  <li><a href="">ATM</a></li>
                                              </ul> 
                                          </div>

                                      </div> -->
                                      <script
                                        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAePY8xEeKl8-3U1GqmcrYl6OdPPtyOH5k&sensor=false">
                                      </script>
                                      <div ui-view="map"></div>
                                      <div ui-view="map_detail"></div>
                                     
                        </div>
                </md-content>
              </div>
          </md-tab>

          <md-tab label="Tour">
            <md-content class="md-padding">
              <h3 class="md-display-0.5"></h3>
              <div class="container" style="height: auto; border: 0px solid black;padding: 0 0 0 0;">
                <div class="">
                    <div class="thumbnail" style="border: 1px solid #bdc3c7;width:279.9px;height: 450px;padding: 0 0 0 0; margin-right: 15.7px; float: left;" >
                        <a class="" style="border:0px solid black;">
                         <img src="" alt="" style="width: 279px; height: 200px;">
                        </a>
                        <br/> 
                        <p style="padding: 0px 3px 3px 5px;">Nội dung Integer turpis erat, porttitor vitae mi faucibus, laoreet interdum tellus.
                         Curabitur posuere molestie dictum. Morbi eget congue risus, quis rhoncus quam. 
                         Suspendisse vitae hendrerit erat, at posuere mi.</p>
                        <br/>
                    </div>

                </div>
              </div>  
            </md-content>
          </md-tab>
<!--          <md-tab label="Lập kế hoạch">
              
      </md-tab>-->
      
    </md-tabs>
  </md-content>
</div>  
 
 



