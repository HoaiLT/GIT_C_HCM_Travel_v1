/* global google */
var app = angular.module('MyApp1',['ngMaterial', 'ngMessages','ngRoute', 'ngResource', 'uiGmapgoogle-maps','ui.router'])
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
app.controller('MapkhCtrl', function ($scope,$http,$mdSidenav,$stateParams,uiGmapGoogleMapApi,$state,$filter){
 $scope.map = {
       showWindow:false,
       center:  {
       latitude:10.774114,
       longitude: 106.688571},
       zoom: 17,
       mapTypeId: 'roadmap',
       pan: true,
       refresh: false,
       control: {},
       window: {
            model: {},
            show: false,
        options: {
         pixelOffset: {width:-1,height:-20}
//      icon:'../C_HCM_Travel_v1/public/map_libs/img/icon/Travel_baloon_icon48.png'
        },
         closeClick: function() {
          this.show = false;
        }
          },

       events: {
        click: function(marker, eventName, model, args) {
          $scope.map.window.model = model;
          $scope.map.window.show = true;
        }
      },

       bounds: {},
       markers:[],
       hotels:[],
       xang:[],
       yte:[],
       kh_detail:[],
       duongdi_detail:[]
      };
    $scope.onclickDetail_KH = function (i) {
      $state.go("/Kehoach_C/kehoach_detail", {ten: i.properties['ten_kh']});

     };

  $scope.ten = $stateParams.ten;

 // $scope.openInfoWindow = function(e, selectedMarker){
 //       $scope.map.window.model = selectedMarker;
 //        $scope.map.window.show = true;
 //         $scope.map.zoom=20
 //    };
// $scope.onClick = function(e,model){
//      $scope.map.window.model = model;
//      $scope.map.window.show = true;
// };

   uiGmapGoogleMapApi.then(function () {
          $http.get('diadiem.json').then(function (response) {
            $scope.map.markers = response.data.features;
          });
        });

   uiGmapGoogleMapApi.then(function () {
        $http.get('kehoach_thamkhao_chitiet.json').then(function (response) {
        $scope.map.kh_detail = response.data.features;
      });
        });

   uiGmapGoogleMapApi.then(function () {
        $http.get('chitiet_duongdi.json').then(function (response) {
        $scope.map.duongdi_detail = response.data.features;
      });  });

      $http.get('kehoach_thamkhao.json').then(function (response) {
        $scope.kehoach_thamkhao = response.data.features;
      });

  $scope.$watch("map.kh_detail", function(){
  $scope.filtermarkers = $filter("filter")($scope.map.kh_detail,$scope.ten);
  if (!$scope.filtermarkers){
  return;
  }  });
      // $http.get('kehoach_thamkhao_chitiet.json').then(function (response) {
      //   $scope.kehoach_thamkhao_chitiet = response.data.features;
      // });
 $scope.$watch("map.duongdi_detail", function(){
  $scope.duongdi = $filter("filter")($scope.map.duongdi_detail,$scope.ten);
  if (!$scope.duongdi){
  return;
  }

$scope.polyline =
    {
        "path": $scope.duongdi.map(function (m) {
            return {
                "latitude": m.latitude,
                "longitude": m.longitude
            };
        }),
        "stroke": {
            "color": '#4285F4',
            "weight": 3
        },
        "geodesic": true,
        "visible": true
    };
  });

});

app.config(function($stateProvider, $urlRouterProvider){
     $urlRouterProvider.otherwise('/Kehoach_C');
     $stateProvider.state('index', {
           url:'/Kehoach_C',
           views: {
            'sidebar_kehoach@': {
                templateUrl: 'Kehoach_C/sidebar_kehoach',
                controller: 'MapkhCtrl'
            } ,
            'map_kehoach@': {
                templateUrl: 'Kehoach_C/map_kehoach',
                controller: 'MapkhCtrl'
            }
        }

    });
    $stateProvider.state('/Kehoach_C/kehoach_detail', {
               // parent: 'index',
               url:'/Kehoach_C/kehoach_detail/:ten',
               views: {
                'sidebar_kehoach_detail@': {
                    templateUrl: 'Kehoach_C/sidebar_kehoach_detail',
                    controller: 'MapkhCtrl'
                } ,
                'map_kehoach_detail@': {
                    templateUrl: 'Kehoach_C/map_kehoach_detail',
                    controller: 'MapkhCtrl'
                }
            }

        });
});




