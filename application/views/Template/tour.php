<!--<div  ui-view="c_detail_tour">-->
<div ng-repeat="tour in full_list_tour" ng-controller="MapCtrl" >
    <div class="thumbnail" style="border: 1px solid #bdc3c7;width:279.9px;height: 420px; margin-right: 15.7px; float: left;" >
        <a class="" style="border:0px solid black;">
         <img src="{{tour.properties['hinh_anh']}}" alt="" style="width: 279px; height: 200px;"value="">
        </a>
        <h4 class="tour"><b>{{tour.properties['ten_tour']}}</b></h4>
        <h4 class="tour" style="color:red;"> Gía: {{tour.properties['gia']}} </h4>
        <h4 class="tour" style="color:red;"> Khuyến mãi tới: {{tour.properties['phantram_khuyenmai']*100}} %</h4>
        <?php           
        ?>
        <h5>
            <a href="<?php echo base_url();?>/Map_HCM_C/page_tour_detail?ma_tour={{tour.ma_tour}}" target="_blank" >Xem chi tiết tour</a></h5>   
        <br/>
    </div>

</div>