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
       zoom: 12,
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
         minZoom: 2
//        icon:'../C_HCM_Travel_v1/public/map_libs/img/icon/Travel_baloon_icon48.png'
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
       yte:[]
      };
      
      
   uiGmapGoogleMapApi.then(function () {
          $http.get('diadiem.json').then(function (response) {
            $scope.map.markers = response.data.features;
          });
        });
        
      $http.get('kehoach_thamkhao.json').then(function (response) {
        $scope.kehoach_thamkhao = response.data.features;
      });

      $http.get('kehoach_thamkhao_chitiet.json').then(function (response) {
        $scope.map.kehoach_thamkhao_chitiet = response.data.features;
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

});




