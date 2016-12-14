<!DOCTYPE html>
<html lang="en" ng-app="MyApp1" >
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tư vấn kế hoạch du lịch</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>public/libs/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/libs/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

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
<script>
              function myFunction(id) {
                  var x = document.getElementById(id);
                  if (x.className.indexOf("w3-show") == -1) {
                      x.className += " w3-show";
                  } else {
                      x.className = x.className.replace(" w3-show", "");
                  }
              }
</script>
  <style type="text/css">

 .angular-google-map-container {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
}
.timeline {list-style:none;padding:0 0 20px;position:relative;margin-top:-15px}
.timeline:before{top:30px;bottom:25px;position:absolute;content:" ";width:3px;background-color:#ccc;left:25px;margin-right:-1.5px}
.timeline>li,.timeline>li>.timeline-panel
{margin-bottom:5px;position:relative}
.timeline>li:after,.timeline>li:before
{content:" ";display:table}
.timeline>li:after{clear:both}
.timeline>li>.timeline-panel{
  margin-left:70px;
  float:left;top:25px;
  padding:4px 10px 8px 4px;
  border:1px solid #ccc;
  border-radius:5px;
  width:45%;}
.timeline>li>.timeline-badge
{
  color:#fff;
  width:45px;
  height:45px;
  line-height:50px;
  font-size:1.2em;
  text-align:center;
  position:absolute;
  top:20px;left:5px;
  margin-right:-30px;
  background-color:#fff;
  z-index:100;
  border-radius:50%;
  border:1px solid #d4d4d4}
  .timeline>li.timeline-inverted>.timeline-panel{ float:left}
.timeline>li.timeline-inverted>.timeline-panel:before{
  border-right-width:0;border-left-width:15px;right:-15px;left:auto}
.timeline>li.timeline-inverted>.timeline-panel:after{
  border-right-width:0;border-left-width:14px;right:-14px;left:auto}
.timeline-badge.primary{background-color:#2e6da4!important}
.timeline-badge.success{background-color:#3f903f!important}
.timeline-badge.warning{background-color:grey !important}
.timeline-badge.danger{background-color:#d9534f!important}
.timeline-title{margin-top:0;color:inherit}
  </style>
</head>
<body ng-controller="MapkhCtrl">
    <script
     src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAePY8xEeKl8-3U1GqmcrYl6OdPPtyOH5k&sensor=false">
    </script>
     <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding-right: 5px;margin-bottom:0px">
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
               <div ui-view="login"></div>
               </div>
          </div>
 </nav>

    <div class="row" >
        <div  class="col-md-3" style=" overflow: auto;width:450px; height:600px;" >
            <div ui-view="sidebar_kehoach"></div>
            <div ui-view="sidebar_kehoach_detail"></div>
        </div>
        <div class="col-md-8" style="border: 0px solid black;height:600px; padding-left:2px; padding-right:2px;margin-right: 0px; margin-left: 2px;">
            <div ui-view="map_kehoach"></div>
            <div ui-view="map_kehoach_detail"></div>
      </div>
    </div>




