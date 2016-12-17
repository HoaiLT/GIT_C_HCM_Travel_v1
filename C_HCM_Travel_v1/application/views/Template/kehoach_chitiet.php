<!DOCTYPE html>
<html lang="en"  >
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lộ trình chi tiết</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>public/libs/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/libs/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link href="<?php echo base_url(); ?>public/map_libs/css/custom_map.css" rel="stylesheet" type="text/css"/>
  <script src="<?php echo base_url(); ?>public/libs/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
  <style type="text/css">
.timeline {list-style:none;padding:0 0 20px;position:relative;margin-top:-15px}
.timeline:before
{top:30px;bottom:25px;position:absolute;content:" ";width:3px;background-color:#ccc;left:40px;margin-right:-1.5px}

.timeline>li,.timeline>li>.timeline-panel
{margin-bottom:5px;position:relative}
.timeline>li:after,.timeline>li:before
{content:" ";display:table}
.timeline>li:after{clear:both}
.timeline>li>.timeline-panel{
  margin-left:80px;
  float:left;top:25px;
  padding:4px 5px 8px 4px;
  border:0px solid #ccc;
  border-radius:5px;
  width:100%;}
.timeline>li>.timeline-badge
{
  color:#fff;
  width:70px;
  height:70px;
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
.timeline-title{margin-top:0;color:inherit}
  </style>
</head>
<body>
<div class="container">
   <?php foreach($kh as $plan){?>
<h2 align="center"><?php echo $plan['ten_kh']; ?></h2>
  <img  src="<?php echo base_url().$plan['hinh_anh_hanhtrinh'];?>" alt="<?php echo $plan['ten_kh']; ?>" width=100%; height="500px"/>
  <br>
  <h3 align="center">Tổng thời gian hành trình:<?php echo $plan['thoi_gian']; ?>h/<?php echo $plan['tong_khoangcach']; ?>km</h3>
 <?php  } ?>

<div class="w3-container w3-margin-left ">
    <div class="row" >
        <ul class="timeline" style="width:100%" >
              <?php foreach($items as $item){?>
                  <li>
                    <div class="timeline-badge">
                         <img class="middle" src="<?php echo base_url().$item['hinh_anh']; ?>" alt="<?php echo $item['ten']; ?>" width="200px" height="200px"/>
                    </div>
                        <div class="timeline-panel " style="margin-left: 250px;top: 20px;padding-top: 0px;border-radius:2px">
                            <div class="timeline-heading">
                                <h3 class="timeline-title"><?php echo $item['ten']; ?></h3>
                                <div >
                                    <p><b>Giờ mở cửa:</b> <?php echo $item['gio_mo_cua']; ?></p>
                                    <p><b>Giá vé: </b><?php echo $item['gia_ve']; ?></p>
                                    <p><b>Số điện thoại:</b><?php echo $item['so_dt']; ?></p>
                                    <p><b>Website:</b><?php echo $item['website']; ?></p>
                                    <p><b>Địa chỉ: </b><?php echo $item['ten_duong']; ?><?php echo $item['phuong_xa'];?><?php echo $item['quan_huyen'];?></p>
                                    <p><b>Đến điểm tiếp theo:</b><?php echo $item['mota']; ?></p>
                                </div>
                            </div>
                        </div>
                  </li>
        <?php  } ?>
    </ul>
</div>
</div>
</div>
</body>
</html>










