var app = angular.module('MyApp2',[])
  /* global google, _ */;
app.controller('MyplanCtrl', function ($scope,$http){
      $http.get('http://localhost:8080/C_HCM_Travel_v1/diadiem.json').then(function (response) {
        $scope.diadiem = response.data.features;
      });
});


