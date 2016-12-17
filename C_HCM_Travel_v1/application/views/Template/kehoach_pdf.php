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
  width:45%;}
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
   <?php foreach($kh as $plan){?>
<h2><?php echo $plan['ten_kh']; ?></h2>
  <img  src="<?php echo base_url().$plan['hinh_anh_hanhtrinh'];?>" alt="<?php echo $plan['ten_kh']; ?>"/>
   <p><b>Tổng thời gian hành trình:</b> <?php echo $plan['thoi_gian']; ?> / <?php echo $plan['tong_khoangcach']; ?> </p>
 <?php  } ?>
<div >
<ul class="timeline" style="width:100%" >
              <?php foreach($items as $item){?>
                  <li>
                    <div class="timeline-badge">
                         <img class="middle" src="<?php echo base_url().$item['hinh_anh']; ?>" alt="<?php echo $item['ten']; ?>" width="200px" height="200px"/>
                    </div>
                        <div class="timeline-panel ">
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






