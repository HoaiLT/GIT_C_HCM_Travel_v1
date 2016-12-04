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
app.controller('MapkhCtrl', function ($rootScope,$scope,$http,$mdSidenav,$stateParams,uiGmapGoogleMapApi,$state,$filter,uiGmapIsReady){
   uiGmapGoogleMapApi.then(function (maps) {
    $scope.map = {
       center:  {
                     latitude:10.774114,
                     longitude: 106.688571},
                     mapTypeId: 'roadmap',
                     pan: true,
                     refresh: false,
       control: {},
        zoom: 17,
        options: {},
         control: {},
       window: {
                    show: true,
                    options: {
                                 pixelOffset: {width:-1,height:-20

                     }
            //      icon:'../C_HCM_Travel_v1/public/map_libs/img/icon/Travel_baloon_icon48.png'
                    },
                     closeClick: function() {
                      this.show = false;
                    }
                 },
             events: {
              click: function(marker, eventName, model, arguments) {
                $scope.map.window.model = model;
                $scope.map.window.show = true;
                console.log(  $scope.map.window.model);
              }
            },
       bounds: {},
       markers:[],
       hotels:[],
       xang:[],
       yte:[],
       kh_detail:[],
       duongdi_detail:[],
       info:[]
        };
    });

    $scope.onclickDetail_KH = function (i) {
      $state.go("/Kehoach_C/kehoach_detail", {ten: i.properties['ten_kh']});
     };


     // $scope.onClick = function(data) {
     //             $scope.map.window.marker.geometry = data.geometry;
     //            $scope.map.window.show=true;
     //            console.log(data);
     //   };
    // uiGmapIsReady.promise() // if no value is put in promise() it defaults to promise(1)
    // .then(function (instances) {
    //     console.log(instances[0].map); // get the current map
    // })
    //     .then(function () {
    //     $scope.addMarkerClickFunction($scope.filtermarkers);
    // });

    //  $scope.addMarkerClickFunction = function (markersArray) {
    //     angular.forEach(markersArray, function (value, key) {
    //         value.onClick = function () {
    //             $scope.onClick(value.data);
    //             $scope.map.window.marker = value;
    //             $scope.map.window.show=true;
    //         };
    //     });
    // };
    // $scope.onClick = $scope.$on('$stateChangeStart', function(e, model){
    //           e.preventDefault();
    //         $scope.map.window.model = model;
    //         $scope.map.window.show = true;
    //          console.log($scope.map.window.model);
    // });

   uiGmapGoogleMapApi.then(function () {
      $scope.onClick=function(e, model){
              e.preventDefault();
            $scope.map.window.model = model;
            $scope.map.window.show = true;
             console.log( $scope.map.window.model);
    }
  });


  $scope.ten = $stateParams.ten;

// // show infowindow cho diem bat dau
//    uiGmapGoogleMapApi.then(function () {
//         $http.get('chitiet_duongdi.json').then(function (response) {
//         $scope.map.info = response.data.features;
//       });  });
//   $scope.$watch("map.info", function(){
//   $scope.infoWindow = $filter("filter")($scope.map.info,$scope.ten);
//   if (!$scope.infoWindow){
//   return;
//   }
// $scope.inforWindow= {
//         coords: $scope.infoWindow.map(function (m) {
//             return {
//                 latitude: m.latitude,
//                 longitude: m.longitude
//             };
//         }),
//         options: {
//           disableAutoPan: true
//         },
//         show: true
//       }

// });

 $scope.inforWindow = {
        coords: {
          latitude: 10.787964,
          longitude: 106.704835
        },
        options: {
          disableAutoPan: true
        },
        show: true
      };


// lay thong tin cho marker
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
  } });
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
                //parent: 'index',
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




