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
   <link href="<?php echo base_url(); ?>public/map_libs/css/style.css" rel="stylesheet" type="text/css"/>
  <!-- Your application bootstrap  -->
  <link href="<?php echo base_url(); ?>public/map_libs/css/directions.css" rel="stylesheet" type="text/css"/>
  <script src="<?php echo base_url(); ?>public/map_libs/scripts/map.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/libs/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/libs/scripts/jquery-3.1.1.min.js" type="text/javascript"></script>
  <style type="text/css">
  .md-accent{
    position: absolute;
  }
 #markerLayer img {
        border: 2px solid red !important;
        border-radius: 50%;
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
    background-color: #FFFFFF;
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
#custom-search-input {
        margin:0;
        margin-top: 10px;
        padding: 0;
    }

    #custom-search-input .search-query {
        padding-right: 3px;
        padding-right: 4px;
        padding-left: 3px;
        padding-left: 4px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */

        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    #custom-search-input button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color:#D9230F;
    }

    .search-query:focus + button {
        z-index: 3;
    }

    .search ul {
    position: absolute;
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 300px;
    background-color: #f1f1f1;

}

 .search li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;

}

/* Change the link color on hover */
 .search li a:hover {
    background-color:#eeba30;
    color: white;
}
.search img {
    border-radius:50%;
    vertical-align:top;
  }
  img.middle {
    vertical-align: text-bottom;
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
                      <div>DU LỊCH HỒ CHÍ MINH <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> &times;</a></div>
                       <div><a href="<?php echo base_url(); ?>about.html">Giới thiệu</a></div>
                         <div>  <a href="<?php echo base_url(); ?>Kehoach_C" target="_blank">Tư vấn kế hoạch du lịch</a></div>
                        <div> <a href="<?php echo base_url(); ?>Map_HCM_C/map_directions" target="_blank"> Tìm đường đi</a></div>
                       <div> <a href="<?php echo base_url(); ?>Kehoach_C" target="_blank">Tiện ích</a></div>
                       <div><a href="<?php echo base_url(); ?>contact.html">Liên hệ</a></div>

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
                                <input type="text" class="search-query form-control" ng-focus="focus=true"  ng-blur="focus = false" ng-model="searchString" placeholder="Bạn muốn đến..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>

                        </div>
              <div class="search" >
                     <ul >
                         <li  ng-repeat="i in map.markers | filter: searchString" ng-click=" onSidebarClicked(i)" ng-show="searchString">
                         <a>
                            <p><img class="middle" src={{i.properties['hinh_anh']}} alt={{i.properties['ten']}} width="40px" height="40px"/> <p>{{i.properties['ten']}}</p>
                                 <p>{{i.properties['ten_duong']}} {{i.properties['phuong_xa']}} {{i.properties['quan_huyen']}}</p></p>
                            </a>
                          </li>
                      </ul>
              </div>
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
                          <md-button  ng-click="toggleLeft()" ui-sref="index()" class="md-accent" >
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





