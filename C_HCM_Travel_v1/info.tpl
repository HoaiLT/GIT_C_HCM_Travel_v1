<div ng-controller="MapCtrl">
<div>
    <img src={{parameter.properties['hinh_anh']}} alt="{{parameter.properties['ten']}}" height="100px" width="100px"
    style="float: left; margin: 0 10px 10px 10px; border-radius:20px" />
    <h4>{{parameter.properties['ten']}}</h4>
    <p >Địa chỉ:{{parameter.properties['phuong_xa']}}{{parameter.properties['quan_huyen']}} </p>
</div>
    <div class="w3-container" style="clear: left;">
      <button class="w3-btn w3-white w3-border w3-border-blue w3-round-xlarge">
      <a href="http://localhost:8080/C_HCM_Travel_v1/Map_HCM_C/map_directions" target="blank" >Hướng dẫn đường đi</a>
      </button>
      <button class="w3-btn w3-white w3-border w3-border-red w3-round-xlarge">
          <a href="http://localhost:8080/C_HCM_Travel_v1/Map_HCM_C/map_directions" target="blank" >Yêu thích</a>
      </button>
   </div>
</div>

<!-- <div ng-controller="MapCtrl">
<div>
    <img src={{parameter.properties['hinh_anh']}} alt="{{parameter.properties['ten']}}" height="100px" width="100px"
    style="float: left; margin: 0 0 10px 10px; border-radius:20px" />
    <h4>{{parameter.properties['ten']}}</h4>
    <p >Địa chỉ:{{parameter.properties['phuong_xa']}}{{parameter.properties['quan_huyen']}} </p>
</div>
<div class="w3-container" style="clear: left;">
      <button class="w3-btn w3-white w3-border w3-border-blue w3-round-xlarge">
      <a href="http://localhost:8080/C_HCM_Travel_v1/Map_HCM_C/map_directions" target="blank" >Hướng dẫn đường đi</a>
      </button>
</div>
</div> -->
