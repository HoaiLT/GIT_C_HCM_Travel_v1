/* global google */
var app = angular.module('MyApp',['ngMaterial', 'ngMessages','ngRoute', 'ngResource', 'uiGmapgoogle-maps','ui.router'])
       .config(['uiGmapGoogleMapApiProvider', function(uiGmapGoogleMapApiProvider){
	uiGmapGoogleMapApiProvider.configure({
		key: "key", 
		v: '3.17', 
		libraries: 'geometry,visualization' 
                });
                }      
]);
app.run(["$rootScope", "$state", "$stateParams", function($rootScope, $state, $stateParams) {
    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;
}]);
//app.service('detail',function($http,$q){
//    return {
//   geojson : function(){
//           this.markers = $http.get("./diadiem.json").then(function(response){
//            return response.data.features;
//         }); 
//    },
//   getDetail : function(id){
//        var d= $q.defer();
//        this.geojson().forEach(function(marker) {
//	        if (marker.id === id) 
//                    d.resolve(marker);
//	      });
//              return d.promise;
//    }
//    };
//});
app.factory('Markers', function($http) {
   var markers =[];
    return {
   
    getMarkers: function(){
 
      return $http.get("./diadiem.json").then(function(response){
          markers = response.data.features;
          return markers;
      });
 
    }
  };
})
  /* global google */;
app.controller('MapCtrl', function ($scope,$http,$mdSidenav,$stateParams,uiGmapGoogleMapApi){
    
    $scope.toggleLeft = buildToggler('left');
    function buildToggler(componentId) {
      return function() { 
        $mdSidenav(componentId).toggle();  
      };
    };
    $scope.map = {
       center:   new google.maps.LatLng(10.774114,106.688571),
       zoom: 13,
       mapTypeId: 'roadmap',
       pan: true,
       refresh: false,
       control: {},
       events: {},
       bounds: {},
       options: {
        streetViewControl: false,
        panControl: false,
        maxZoom: 20,
        minZoom: 3
      },
       
       markers:[]
      };
     uiGmapGoogleMapApi.then(function () {
          $http.get('./diadiem.json').then(function (response) {
            $scope.map.markers = response.data.features;
          });

        });
        
    //    $http.get("./diadiem.json").then(function(response){
//        $scope.markers =  response.data.features;
//    }); 
    $http.get("./khachsan_local.json").then(function(response){
    $scope.khachsan_local =  response.data.features;
    });
    
    $http.get("./diem_khachsan.json").then(function(response){
    $scope.diem_khachsan =  response.data.features;
    });
        
     $scope.onMarkerClicked = function (marker) {
     $mdSidenav('left').toggle();
  };

    $scope.id = $stateParams.id;
    $scope.hinhanh = $stateParams.hinhanh;
    $scope.ten = $stateParams.ten;  
    $scope.geometry = $stateParams.geometry;
    $scope.phuongxa = $stateParams.phuongxa;
    $scope.quanhuyen= $stateParams.quanhuyen; 
    $scope.gioithieu= $stateParams.gioithieu; 
    $scope.$root.windowClicked = function (id) {
        alert(id);
        
    };

});
app.controller('DetailCtrl',function(){
   
});
 
var a= app.config(function($stateProvider, $urlRouterProvider){
     $urlRouterProvider.otherwise('/Map_HCM_C');  
      $stateProvider.state('detail',{
           parent: 'index',
           url:'/detail/:id/:hinhanh/:ten/:geometry/:quanhuyen/:phuongxa/:gioithieu',
           views:{
            'detail@': {
                templateUrl: function($stateParams) {
                return 'Map_HCM_C/detail/' + $stateParams.id;
            },
                controller: 'MapCtrl'
                        }
//            'map@': {
//                templateUrl: 'Map_HCM_C/map',
//                controller: 'MapCtrl'
//                    }
        }
    });
          
    $stateProvider.state('index', {
           url:'/Map_HCM_C',
           views: {
               'sidebar@': {
                templateUrl: 'Map_HCM_C/sidebar',
                controller: 'MapCtrl'
            } ,
            'map@': {
                templateUrl: 'Map_HCM_C/map',
                controller: 'MapCtrl'
            }   
        }
        
    });
    $stateProvider.state('location', {
           url:'/Map_HCM_C/location',
           views: {
            'map_location@': {
                templateUrl: 'Map_HCM_C/location',
                controller: 'MapCtrl'
            }   
        }
        
    });
    
});


  
  
