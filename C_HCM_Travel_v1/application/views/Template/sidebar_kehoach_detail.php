<div class="row"  style="margin-top:60px" ng-controller="MapkhCtrl">
    <div class="w3-padding w3-xlarge w3-teal">
        <div class="w3-container">
             <a  ui-sref="index()"> <i class="fa fa-chevron-circle-left" ></i></a> Hành trình chi tiết
        </div>
   </div>
    <div class="w3-container w3-margin-left ">
         <div class="w3-left-align" >
            <h3 class="w3-text-pink"><b>{{ten}}</b></h3>
         </div>
          <div class="w3-card-6">
              <iframe ng-src="{{video}}" width=380 height=230 frameborder="0"></iframe>
          </div>
       <button onclick="myFunction('intro')" class="w3-btn-block ">
                  <i class="fa fa-info-circle fa-fw" aria-hidden="true" ></i>&nbsp; Thông tin giới thiệu hành trình:
                  <i class="fa fa-chevron-circle-down fa-fw" style="margin-left:100px;" aria-hidden="true"></i>
         </button>
          <div id="intro" class="w3-accordion-content " >
                  <br>
                    <div class="w3-container">
                        <p>{{gioithieu}}</p>
                  </div>
           </div>
    <hr>
  <p> <i class="fa fa fa-clock-o" aria-hidden="true"></i><b>Tổng thời gian:</b>{{songay}} h/ {{khoangcach}} km</p>
          <p><b>Phương tiện di chuyển chính:</b>{{phuongtien}}</p>
          <hr>
          <div class="w3-text-pink"><h3><b>Lộ trình di chuyển:</b></h3></div>
              <ul class="timeline"  style="width:350px"  ng-cloak="" ng-controller="MapkhCtrl" >
                  <li ng-repeat="i in filtermarkers" ng-click="Onclick(i)">
                    <div class="timeline-badge">
                         <img class="middle" src={{i.properties['hinh_anh']}} alt={{i.properties['ten']}} width="70px" height="70px"
                         style="border-radius:50%;"/>
                    </div>
                        <div class="timeline-panel " style="width:300px" >
                            <div class="timeline-heading">
                                <h4 class="timeline-title">{{i.properties['ten']}}</h4>
                                <div  ng-controller="MapkhCtrl">
                                      <p><b>Đến điểm tiếp theo:</b>{{i.properties['mota']}}</p>
                                 </div>
                            </div>
                        </div>
                  </li>
              </ul>
      <hr>
      <p><b>Lộ trình chi tiết:</b><button class="w3-btn  w3-round-large"><a style="text-decoration: none;" href="<?php echo base_url();?>Kehoach_C/xem_kehoach?makh={{id}}" target="_blank"> <i class="fa fa-eye fa-fw" aria-hidden="true"></i>Xem</a>
      </button>
      <button class="w3-btn  w3-blue w3-round-large w3-hover-blue">
      <a style="text-decoration: none;" href="<?php echo base_url();?>Kehoach_C/kehoach?makh={{id}}" target="_blank">
      <i class="fa fa-download fa-fw" aria-hidden="true"></i>
       Download</a>
      </button></p>

      </div>
      <hr>
  </div>





