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

  <script src="<?php echo base_url(); ?>public/map_libs/scripts/map.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/libs/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
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
  </style>    
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
            <a href="<?php echo base_url();?>" class="navbar-brand">Map Online</a>
          </div>
          <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                  <li><a href="<?php echo base_url(); ?>about.html">Giới thiệu</a></li>
                  <li><a href="<?php echo base_url(); ?>contact.html">Liên hệ</a></li>  
              </ul> 
             
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
      <md-tab label="Địa điểm">
          <div class="row">
              <md-sidenav  class="md-sidenav-left" md-component-id='left' md-disable-backdrop="" md-whiteframe="3" >                                
                    <md-content layout-margin="" >
                        <md-button  ng-click="toggleLeft()" ui-sref="index()" class="md-accent" id="nut">                            
                          <span class="glyphicon glyphicon-arrow-left"></span>                           
                        </md-button> 
                        <div ui-view="detail"></div>
                    </md-content>
               </md-sidenav>
                <md-content class="md-padding" style="padding-top: 0px;">
                            <div  class="col-md-3" style=" border: 0px solid black;overflow: auto;padding-left: 10px; width:330px; height:600px " >
                                <div ui-view="sidebar"></div>
                            </div>
                           <div  class="col-md-9" style="border: 0px solid black;height:600px; padding-left:2px; padding-right:2px;margin-right: 0px; margin-left: 2px;">               
                                      <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-left: 500px; margin-top: 30px; width: 700px;">        
<!--                                          <div>
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mymenu2">
                                                <span class="sr-only"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>

                                          </div>-->
                                          <div class="navbar-collapse collapse" id="mymenu2" >
                                              <ul class="nav navbar-nav" >
                                                  <li><a  ui-sref="location()">Khách sạn</a></li>
                                                  <li><a href="">Tram xăng</a></li>
                                                  <li><a href="">ATM</a></li>
                                              </ul> 
                                          </div>

                                      </div> 
                                      <script
                                        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
                                      </script>
                                      <div ui-view="map"></div>
                                      <div ui-view="map_location"></div>
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
          <md-tab label="Lập kế hoạch">
            <md-content class="md-padding">
              <h1 class="md-display-2">Tab Three</h1>
              <p> hongthuy</p>
            </md-content>
      </md-tab>
      
    </md-tabs>
  </md-content>
</div>  
 
 



