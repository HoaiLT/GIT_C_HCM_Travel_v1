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
  <script>document.write('<base href="' + document.location + '" />');</script> 
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

.panel-primary {
  padding: 15px;
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
<body >
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding-right: 5px;">
            <div class='row' > 
              <div class='col-md-4'>      
                <div class="navbar-header">  
                      <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="<?php echo base_url(); ?>">Trang chủ</a>
                        <a href="<?php echo base_url(); ?>Map_HCM_C/map_directions" target="_blank"> Hướng dẫn đường đi</a>
                        <a href="<?php echo base_url(); ?>Kehoach_C" target="_blank">Kế hoạch du lịch của tôi.</a>
                        <a href="<?php echo base_url(); ?>about.html">Giới thiệu</a>
                        <a href="<?php echo base_url(); ?>contact.html">Liên hệ</a> 
                      </div>      
                  <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776;</span>
                   <a href="<?php echo base_url(); ?>">Map Online</a> 
                </div>
                </div> 
               <!--  SEARCH BOX -->
                  <div class='col-md-6' >
                       <div ng-controller="MapCtrl">
                          <div id="custom-search-input">
                            <div class="input-group col-md-6">
                                <input type="text" class="search-query form-control" ng-model="searchString" placeholder="Enter your search terms" />
                            </div>
                          </div>
                            <ul class="data-ctrl" >
                               <li ng-show="searchString" ng-repeat="i in map.markers | filter:searchString">
                                   <a ng-click=" onSidebarClicked(i)">  <p>{{i.properties['ten']}}</p></a>
                                </li>
                            </ul>
                        </div>
                </div>
               <div class='col-md-2'>
               <div ng-controller="MapCtrl" ui-view="login"></div> 
             </div>
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
  <!--                        <div ui-view="detail_directions"></div>-->
                      </md-content>
                 </md-sidenav>

                <md-content class="md-padding" style="padding-top: 0px;">
                            <div  class="col-md-3" style=" border: 0px solid black;overflow: auto;padding-left: 10px; width:330px; height:600px " >
                                <div ui-view="sidebar"></div>
                            </div>
                           <div  class="col-md-9" style="border: 0px solid black;height:600px; padding-left:2px; padding-right:2px;margin-right: 0px; margin-left: 2px;">               
                    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAePY8xEeKl8-3U1GqmcrYl6OdPPtyOH5k&sensor=false"> 
                    </script>
                                       <div id="map"></div>
                                      <div ui-view="map"></div>
                                      <div ui-view="map_detail"></div>
                                     
                        </div>
                </md-content>
            </div>
          </md-tab>
           <md-tab label="Tour Du Lịch">
            <md-content class="md-padding">
                 
              <h3 class="md-display-0.5"></h3>
              <div class="container" style="height: auto; border: 0px solid black;">
                  <div class="row">
                      <div  ui-view="c_tour"></div> 
                  </div>
                  
              </div>  
            </md-content>
          </md-tab>   
    </md-tabs>
  </md-content>
</div>  
 
 



