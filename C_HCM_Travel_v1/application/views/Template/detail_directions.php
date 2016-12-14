<h4>Hướng dẫn đường đi tới địa điểm đã chọn</h4>
        <input type="text" id="start1" class="search-query " value="" placeholder="Điểm bắt đầu"> 
        <button id="clearstart1" onclick="ClearStart1()" style="background-color: #AED1FF; border: 1px solid white;">Xóa</button>
        <input type="text" id="end1" class="search-query " value="{{ten}}" placeholder="Điểm kết thúc" >
        <button id="clearend1" onclick="ClearEnd1()" style="background-color: #AED1FF; border: 1px solid white;">Xóa</button>
        <div id="mode-selector" class="controls">
        <input type="radio" name="type" id="changemode-walking" >
        <label for="changemode-walking">Walking</label>

        <input type="radio" name="type" id="changemode-transit">
        <label for="changemode-transit">Transit</label>

        <input type="radio" name="type" id="changemode-driving" checked="checked">
        <label for="changemode-driving">Driving</label>
      </div>

        <hr>

    <div id="left-panel" ></div>  
        <script>
          function ClearStart1(){
          document.getElementById('start1').value ='';        
          }  
          function ClearEnd1(){
          document.getElementById('end1').value ='';        
          } 
        </script>

<!--<div ng-controller="MapCrtl" class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="origin" class="col-sm-2 control-label">Điểm bắt đầu:</label>
            <div class="col-sm-8">
              <input type="text" id="origin" class="form-control" ng-model="directions.origin" />
            </div>
          </div>
          <div class="form-group">
            <label for="destination" class="col-sm-2 control-label">Điểm đến:</label>
            <div class="col-sm-8">
                <input type="text" id="destination" class="form-control" ng-model="directions.destination"  />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <button class="btn btn-primary" ng-click="getDirections()">Hướng dẫn đường đi</button>
            </div>
          </div>
        </form>
        
        <div id="directionsList" ng-show="directions.showList" class="panel panel-primary"></div>
      </div>
    </div>-->



