<!DOCTYPE html>
<html lang="en" ng-app="MyApp1" >
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tư vấn kế hoạch du lịch</title>
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
  <script src="<?php echo base_url(); ?>public/map_libs/scripts/mapkh.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/libs/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
  <style type="text/css">

 .angular-google-map-container {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
}

  </style>
</head>
<body ng-controller="MapkhCtrl">
    <script
     src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAePY8xEeKl8-3U1GqmcrYl6OdPPtyOH5k&sensor=false">
    </script>
     <nav class="navbar navbar-default " role="navigation" style="padding-right: 5px;margin-bottom:0px">
            <div class='row' >
              <div class='col-md-4'>
                <div class="navbar-header">
                   <h2><a href="<?php echo base_url(); ?>">Map Online</a></h2>
                </div>
                </div>
               <!--  SEARCH BOX -->
                  <div class='col-md-6' >

                </div>
               <div class='col-md-2'>
               </div>
          </div>
 </nav>
    <div class="row" >
        <div  class="col-md-3" style=" border: 0px solid black;overflow: auto;padding-left: 10px; width:330px; height:600px " >
            <div ui-view="sidebar_kehoach"></div>
            <div ui-view="sidebar_kehoach_detail"></div>
        </div>
        <div ng-controller="MapkhCtrl"  class="col-md-9" style="border: 0px solid black;height:600px; padding-left:2px; padding-right:2px;margin-right: 0px; margin-left: 2px;">
            <div ui-view="map_kehoach"></div>
            <div ui-view="map_kehoach_detail"></div>
      </div>
    </div>





