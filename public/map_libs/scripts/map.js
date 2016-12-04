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
  /* global google, _ */;
app.controller('MapCtrl', function ($scope,$http,$mdSidenav,$stateParams,uiGmapGoogleMapApi,$state,$filter,$document){

    $scope.toggleLeft = buildToggler('left');
    function buildToggler(componentId) {
      return function() {
        $mdSidenav(componentId).toggle();
      };
    };
    $scope.map = {
       showWindow:false,
       center:  {
       latitude:10.774114,
       longitude: 106.688571},
       zoom: 15,
       mapTypeId: 'roadmap',
       pan: true,
       refresh: false,
       control: {},
       window: {
            model: {},
            show: false,
        options: {
         pixelOffset: {width:-1,height:-20},
         streetViewControl: false,
         panControl: false,
         maxZoom: 17,
         minZoom: 3
//        icon:'../C_HCM_Travel_v1/public/map_libs/img/icon/Travel_baloon_icon48.png'
        },
         closeClick: function() {
          this.show = false;
        }
          },

       events: {
        click: function(marker, eventName, model, args) {
          $scope.map.window.model = model;
          $scope.map.window.show = true;
          $scope.onMarkerClicked(model);

        }
      },

          events_detail: {
        click: function(marker, eventName, model, args) {
          $scope.map.window.model = model;
          $scope.map.window.show = true;
        }
      },
       bounds: {},
       markers:[],
       hotels:[],
       xang:[],
       yte:[]
      };


   uiGmapGoogleMapApi.then(function () {
          $http.get('./diadiem.json').then(function (response) {
            $scope.map.markers = response.data.features;
          });
        });
   uiGmapGoogleMapApi.then(function () {
          $http.get('./khachsan.json').then(function (response) {
            $scope.map.hotels = response.data.features;
          });
        });
      uiGmapGoogleMapApi.then(function () {
          $http.get('./tramxangdau.json').then(function (response) {
            $scope.map.xang = response.data.features;
          });
        });

    uiGmapGoogleMapApi.then(function () {
          $http.get('./tramyte.json').then(function (response) {
            $scope.map.yte = response.data.features;
          });
        });

      $http.get('./kehoach_thamkhao.json').then(function (response) {
        $scope.kehoach_thamkhao = response.data.features;
      });

      $http.get('./kehoach_thamkhao_chitiet.json').then(function (response) {
        $scope.map.kehoach_thamkhao_chitiet = response.data.features;
      });
      $http.get('./full_list_tour.json').then(function(response){
          $scope.full_list_tour = response.data.features;
      });
  //HAM HIEN THI THONG TIN INFOR WINDOW
  $scope.openClick = function (marker) {
        marker.showWindow = true;

      };
    $scope.detail_directions = function () {
    $state.go("detail_directions",{ten:$stateParams.ten});

    };
    //HAM cua MARKER TRONG TRANG MAP.PHP
     $scope.onMarkerClicked = function (marker) {
     $mdSidenav('left').toggle();
     $state.go("detail", {id: marker.id,hinhanh: marker.properties['hinh_anh'],ten:marker.properties['ten'],geometry:marker.geometry['coordinates'],quanhuyen:marker.properties['quan_huyen'],phuongxa:marker.properties['phuong_xa'],gioithieu:marker.properties['gioi_thieu'],duong:marker.properties['ten_duong'],website:marker.properties['website'],sodt:marker.properties['so_dt']});
     };
     $scope.focus = true;
      //HAM cua SIDEBAR TO LOAD MAP_DETAIL AND DETAIL PAGE
     $scope.onSidebarClicked = function (marker) {
       $scope.focus = !$scope.focus ;
      $mdSidenav('left').toggle();
      $state.go("detail_sidebar", {id: marker.id,hinhanh: marker.properties['hinh_anh'],ten: marker.properties['ten'],geometry:marker.geometry['coordinates'],quanhuyen:marker.properties['quan_huyen'],phuongxa:marker.properties['phuong_xa'],gioithieu:marker.properties['gioi_thieu'],duong:marker.properties['ten_duong'],website:marker.properties['website'],sodt:marker.properties['so_dt']});
     };
     $scope.$watch("map.markers", function(){
      $scope.filtermarkers = $filter("filter")($scope.map.markers,$scope.ten);
      if (!$scope.filtermarkers){
        return;
      }

   });
//     $scope.filtertour = function(id){
//         if($scope.tour_lienquan.id===id)
//             return id;
//
//     };
    //    $http.get("./diadiem.json").then(function(response){
//        $scope.markers =  response.data.features;
//    });
// LAY DU LIEU NHỮNG TOUR LIEN QUAN DEN DIA DIEM DU LICH
 $http.get("./tour_lienquan.json").then(function(response){
    $scope.tour_lienquan =  response.data.features;
    });

    $scope.id = $stateParams.id;
    $scope.hinhanh = $stateParams.hinhanh;
    $scope.ten = $stateParams.ten;
    $scope.geometry = $stateParams.geometry;
    $scope.phuongxa = $stateParams.phuongxa;
    $scope.quanhuyen= $stateParams.quanhuyen;
    $scope.gioithieu= $stateParams.gioithieu;
    $scope.duong= $stateParams.duong;
     $scope.website= $stateParams.website;
    $scope.sodt= $stateParams.sodt;
});

app.config(function($stateProvider, $urlRouterProvider){
     $urlRouterProvider.otherwise('/Map_HCM_C');
      $stateProvider.state('detail',{
           parent: 'index',
           url:'/detail/:id/:hinhanh/:ten/:geometry/:quanhuyen/:phuongxa/:gioithieu/:duong/:website/:sodt',
           views:{
            'detail@': {
                templateUrl: 'Map_HCM_C/detail',
//                templateUrl: function($stateParams) {
//                return 'Map_HCM_C/detail/' + $stateParams.id;
//            },
                controller: 'MapCtrl'
                        }
//            'map_detail@': {
//                templateUrl: 'Map_HCM_C/map_detail',
//                controller: 'MapCtrl'
//                    }
        }
    });


    $stateProvider.state('detail_sidebar',{
           parent: 'index',
           url:'/detail_sidebar/:id/:hinhanh/:ten/:geometry/:quanhuyen/:phuongxa/:gioithieu/:duong/:website/:sodt',
           views:{
            'detail@': {
                 templateUrl: 'Map_HCM_C/detail',
//                templateUrl: function($stateParams) {
//                return 'Map_HCM_C/detail/' + $stateParams.id;
//            },
                controller: 'MapCtrl'

                        },
            'map_detail@': {
                templateUrl: 'Map_HCM_C/map_detail/',
                controller: 'MapCtrl'
                    }
        }
    });


    $stateProvider.state('detail_directions', {
         parent: 'index',
           url:'/map_directions/:ten',
           views: {
            'google_directions@': {
//                templateUrl: 'Map_HCM_C/detail_directions',
                 templateUrl: 'Map_HCM_C/map_directions',
                controller: 'MapCtrl'
            }
        }
    });

    $stateProvider.state('index', {
           url:'/Map_HCM_C',
           views: {
            'sidebar@': {
                templateUrl: 'Map_HCM_C/sidebar',
                controller: 'MapCtrl'
            } ,
            'c_tour@': {
                templateUrl: 'Map_HCM_C/c_tour',
                controller: 'MapCtrl'
            },
            'login@': {
                templateUrl: 'Map_HCM_C/login',
                controller: 'MapCtrl'
            } ,
            'map@': {
                templateUrl: 'Map_HCM_C/map',
                controller: 'MapCtrl'
            }
        }

    });
});

