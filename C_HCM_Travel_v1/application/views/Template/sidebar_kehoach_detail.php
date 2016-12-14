<div class="row"  style="margin-top:50px">
    <div class="w3-padding w3-xlarge w3-teal">
        <div class="w3-container">
             <a  ui-sref="index()"> <i class="fa fa-chevron-circle-left" ></i></a> Hành trình chi tiết
        </div>
   </div>
    <div class="w3-container w3-margin-left ">
         <div class="w3-left-align" >
            <h3 class="w3-text-pink">{{ten}}</h3>
         </div>
          <div class="w3-card-12">
              <iframe ng-src="{{video}}" width=380 height=230 frameborder="0"></iframe>
          </div>
    <br>
    <div>
          <i class="fa fa fa-clock-o" aria-hidden="true"></i>{{songay}} ngày
           <i class="fa fa-car" aria-hidden="true"></i> {{phuongtien}}
    </div>
          <br>
          <div class="w3-text-pink"><h3>Lộ trình di chuyển:</h3></div>
              <ul class="timeline"  style="width:350px"  ng-cloak="" ng-controller="MapkhCtrl" >
                  <li ng-repeat="i in filtermarkers"  >
                    <div class="timeline-badge warning"><i class="fa  fa-cog fa-spin fa-2x fa-fw" ></i></div>
                        <div class="timeline-panel w3-card-12 w3-hover-shadow w3-border-green" style="width:300px" >
                            <div class="timeline-heading">
                                <h3 class="timeline-title">{{i.properties['ten']}}</h3>
                                <div  ng-controller="MapkhCtrl">
                                      <p>{{i.properties['mota']}}</p>
                                 </div>
                            </div>

                        </div>
                  </li>
              </ul>
              <div class="w3-accordion w3-panel w3-pale-green w3-rightbar w3-leftbar w3-card-12 w3-hover-shadow w3-round" style="padding-left: 0px;padding-right: 0px;">
                    <button onclick="myFunction('intro')" class="w3-btn-block w3-left-align w3-green">Giới thiệu:</button>
                    <div id="intro" class=" w3-accordion-content " ng-controller="MapkhCtrl">
                          <p>{{gioithieu}}</p>
                    </div>
              </div>
              <div class="w3-container w3-blue w3-card-12 w3-hover-shadow">
                  <h3>Lưu ý:</h3>
                  <p>Blue often indicates a neutral informative change or action.</p>

              </div>
      </div>
  </div>





