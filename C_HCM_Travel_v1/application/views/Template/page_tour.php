<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <met
        a charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chi tiết Tour</title>
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
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap -->
     <link href="<?php echo base_url();?>public/libs/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>public/libs/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- NProgress -->
    <link href="<?php echo base_url();?>public/libs/css/nprogress.css" rel="stylesheet" type="text/css"/>
    <!-- iCheck -->
    <link href="<?php echo base_url();?>public/libs/css/green.css" rel="stylesheet" type="text/css"/>
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>public/libs/css/custom.min.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
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
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding-right: 5px;background-color: white;">
        <div class="navbar-header" style="background-color: white;border: 0px solid black; height: 50px; width:150px;">
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
          <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776;</span>
          <a style="font-size:15px;" href="<?php echo base_url(); ?>">Map Online</a>
        </div>
    </nav>
    <!-- page content -->
    <div class="x_panel" style="min-height: 580px; margin-top: 50px;">
        <!--end title-->
      <div class="x_content">
          <?php foreach ($t as $value) {
           ?>
          <!--hinh anh-->
        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="product-image">
              <img src="<?php echo base_url().$value['hinh_anh'];?>" alt="..." />
          </div>
          <div class="product_gallery">
            <a>
              <img src="images/prod-2.jpg" alt="..." />
            </a>
            <a>
              <img src="images/prod-3.jpg" alt="..." />
            </a>
            <a>
              <img src="images/prod-4.jpg" alt="..." />
            </a>
            <a>
              <img src="images/prod-5.jpg" alt="..." />
            </a>
          </div>
        </div>
          <!--end hinh anh-->
          <!--noi dung chi tiet-->
        <div class="col-md-7 col-sm-7 col-xs-12" style="border:0px solid #e5e5e5; min-height: 400px">

          <h3 class="prod_title"><?php echo $value['ten_tour']; ?></h3>
          <h3 style="color: red;">Giá : <?php echo $value['gia']; ?> </h3>
          <p>
            <h4>
                <b>Lộ trình di chuyển :</b><p><?php echo $value['lo_trinh_di_chuyen']; ?>.</p><br>
                <b>Mô tả</b> : <p><?php echo $value['mota']; ?></p><br>
                <p><b><?php echo $value['thoigian']; ?></b></p>
                <b>Chi tiết về giá:</b><p><?php echo $value['mota_gia']; ?></p>
                <b>Lưu ý: </b><p><?php echo $value['ghi_chu']; ?></p>
            </h4>
          </p>
          <br />
          <div class="">
            <button type="button" class="btn btn-default btn-lg">Book Tour du lịch</button>
          </div>
        </div>
      <?php } ?>
          <!--end noi dung chi tiet-->
    <!--tab-->
        <div class="col-md-12">

          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                  synth. Cosby sweater eu banh mi, qui irure terr.</p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                  booth letterpress, commodo enim craft beer mlkshk aliquip</p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                  photo booth letterpress, commodo enim craft beer mlkshk </p>
              </div>
            </div>
          </div>

        </div>
    <!--end tab-->
      </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>public/libs/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>public/libs/scripts/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>public/libs/scripts/fastclick.js" type="text/javascript"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>public/libs/scripts/nprogress.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>public/libs/scripts/custom.min.js" type="text/javascript"></script>
  </body>
</html>
