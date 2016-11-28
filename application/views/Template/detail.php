<style>
  .detail a{
    text-decoration:none;
  }
</style>
  <img src="{{hinhanh}}" alt="{{ten}}" height="150" width="295"  />
  <h3 style="padding: 10px 5px 5px 10px; font-size:1.2em">{{ten}}</h3>
  <p>Địa chỉ: {{duong}},{{phuongxa}} {{quanhuyen}}</p>
  <p>GPS:{{geometry}}</p>
    <p>Giới thiệu: {{gioithieu}}</p>
<span>Website: {{website}}</span>
<p>Số điện thoại: {{sodt}}</p>
<h3>Tour du lịch: </h3>
  <div ng-controller="MapCtrl" ng-repeat="t in tour_lienquan | filter: ten"  ng-cloak="" class="detail" >
                <a href="<?php echo base_url();?>/Map_HCM_C/page_tour_detail?ma_tour={{t.properties['ma_tour']}}" target="_blank"><p>{{t.properties['ten_tour']}}</p></a>
</div>








