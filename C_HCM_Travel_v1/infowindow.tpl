<div ng-controller="MapCtrl">
    <img src={{parameter.properties['hinh_anh']}} alt="{{parameter.properties['ten']}}" height="50" width="50" />
    <p>{{parameter.properties['ten']}}</p>
    <p class="muted">Địa chỉ:{{parameter.properties['phuong_xa']}}{{parameter.properties['quan_huyen']}} </p>
    <p>{{parameter.properties['gioi_thieu']}}</p>
    <a href="http://localhost:8080/C_HCM_Travel_v1/Map_HCM_C/map_directions" target="_blank" >Tìm đường đi</a>
     <button ng-click="detail_directions();">Thêm vào điểm đến</button>
</div>
