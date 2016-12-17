<style>
  a {
    text-decoration:none;
  }
</style>
<div ng-controller="MapCtrl">
<div  class="w3-card">
  <a href="" onclick="document.getElementById('id').style.display='block'" ><img src="{{hinhanh}}" alt="{{ten}}" height="295px" width="320px" /></a>
  <div class="w3-container">
       <h4><b>{{ten}}</b></h4>
        <p><i class="fa fa-address-book fa-fw" aria-hidden="true"></i>&nbsp; <b>Địa chỉ: </b>{{duong}},{{phuongxa}} {{quanhuyen}}</p>
  </div>
</div>
  <!-- <h3 style="padding: 10px 5px 5px 10px; font-size:1.2em">{{ten}}</h3> -->
  <div class="w3-container" style="padding-top:10px;">
      <p><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp;<b>GPS:</b>{{geometry}}</p>
  </div>
      <button onclick="myFunction('intro')" class="w3-btn-block w3-left-align w3-green">
            <i class="fa fa-info-circle fa-fw" aria-hidden="true" ></i>&nbsp; Giới thiệu:
            <i class="fa fa-chevron-circle-down fa-fw" style="margin-left:170px;" aria-hidden="true"></i>
      </button>
    <div id="intro" class="w3-accordion-content " ng-controller="MapCtrl">
          <br>
            <div class="w3-container">
                <p>{{gioithieu}}</p>
          </div>
          <hr>
   </div>
   <div class="w3-container" style="padding-top:10px;" >
    <p><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><b>Giờ mở cửa:</b> {{giomocua}}</p>
  </div>
   <hr style="margin-bottom: 10px; margin-top: 10px;">
    <div class="w3-container">
      <p><i class="fa fa-ticket fa-fw" aria-hidden="true"></i><b>Giá vé:</b> {{giave}}</p>
  </div>
    <hr style="margin-bottom: 10px; margin-top: 10px;">
  <div class="w3-container">
      <p><i class="fa fa-external-link fa-fw" aria-hidden="true"></i><b>Website:</b>{{website}}</p>
  </div>
   <hr style="margin-bottom: 10px; margin-top: 10px;">
     <div class="w3-container">
          <p><i class="fa fa-phone-square fa-fw" aria-hidden="true"></i><b>Số điện thoại: </b>{{sodt}}</p>
    </div>
      <button onclick="myFunction('tour')" class="w3-btn-block w3-left-align w3-green">
            <i class="fa fa-list fa-fw" aria-hidden="true"></i>&nbsp;<b>Tour du lịch: </b>
            <i class="fa fa-chevron-circle-down fa-fw" style="margin-left:150px;" aria-hidden="true"></i>
      </button>
       <div id="tour" class="w3-accordion-content" ng-controller="MapCtrl">
             <div class="w3-container">
                   <ul class="w3-ul w3-small" ng-repeat="t in tour_lienquan | filter: id"  ng-cloak="" >
                        <li><p>{{t.properties['ten_tour']}}</p>
                          <button class="w3-btn w3-blue w3-round"><a class="w3-hover-blue"  href="<?php echo base_url();?>/Map_HCM_C/page_tour_detail?ma_tour={{t.properties['ma_tour']}}" target="_blank">Xem </a></button>
                          <hr>
                        </li>
                   </ul>
              </div>
        </div>
</div>





