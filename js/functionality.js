var app = angular.module('indexApp', []);
      app.controller('control1', function($scope, $http) {
          //$scope.formData = {};
          $scope.zipcodes = ["12", "23", "34", "45", "56", "67", "78", "32323","3232", "4565", "6767", "232", "57575", "1213", "667", "78676", "465545", "4543"];
          $scope.processForm = function() {
          $http({
          method  : 'POST',
          url     : 'process.php',
          data : {value1: $scope.input1, value2: $scope.input2}
         }).then(function mySuccess(response) {
                $scope.myWelcome = response.data; 
                console.log(response.data);
              }, function myError(response) {
                $scope.myWelcome = response.statusText;
            });
        };

        // $scope.getZipCode = function(zipcode){
        //   $http({
        //     method: 'POST',
        //     url: 'getPin.php',
        //     data: {zipcode:zipcode}
        //   }).then(function(response){
        //       $scope.hideit = false;

        //       $scope.district = response.data;
        //       console.log(response.data);
        //   }, function(response){
        //     $scope.input8 = response.statusText;
        //     console.log(response.statusText);
        //   });
        // };
        $scope.getZipCode = function(string){
            $scope.hidethis = false;
            var output = [];
            angular.forEach($scope.zipcodes, function(zip){  
                if(zip.toLowerCase().indexOf(string.toLowerCase()) >= 0)  
                {  
                     output.push(zip);  
                }  
           });
           $scope.filterzipcodes = output;  
          }
          $scope.fillTextbox = function(string){  
           $scope.zip = string;  
           $scope.hidethis = true;  
          };
        }

        // $scope.showHide = function () {
        //         $scope.input9 = $scope.select;
        //         $scope.hideit = true;
      );

var loginapp = angular.module('loginApp',[]);
  loginapp.controller('loginControl', function($scope, $http){
      $scope.credentials = {};
      $scope.validatelogin = function(){
        $http({
          method : 'POST',
          url : 'validatelogin.php',
          data : {userid: $scope.userid, password: $scope.password}
        }).then(function(response){
          if(response.data.error)
          {
            $scope.errorUserid = response.data.error.userdi;
            $scope.errorPassword = response.data.error.password;
          }
          else
          {
            $scope.credentials = null;
            $scope.errorUserid = null;
            $scope.errorpassword = null;
            $scope.status = response.data.status;
          }
        },
        function(response){
          console.log(response.statusText);
        });
      };
    });  
