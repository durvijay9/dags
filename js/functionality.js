
var geocoder=null;
var resmap=null; 
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

          $scope.availableTags = [
                              "ActionScript",
                              "AppleScript",
                              "Asp",
                              "BASIC",
                              "C",
                              "C++",
                              "Clojure",
                              "COBOL",
                              "ColdFusion",
                              "Erlang",
                              "Fortran",
                              "Groovy",
                              "Haskell",
                              "Java",
                              "JavaScript",
                              "Lisp",
                              "Perl",
                              "PHP",
                              "Python",
                              "Ruby",
                              "Scala",
                              "Scheme"
                          ];
          $scope.getPincode = function () {
                              console.log($scope.availableTags);
                              $("#pincode").autocomplete({
                                  source: $scope.availableTags
                              });
                          };
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
          }

        var marker = null;
        var rectangle = null;
        var tempadd = null;
        var add1 = "";
    var lat, long;
    $scope.initMap = function () {

        resmap = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: {lat: -34.397, lng: 150.644}
        });
        geocoder = new google.maps.Geocoder();
        resmap.addListener('click', function (event) {
            addMarker(event.latLng);
        });
    };
    function addMarker(location) {
        removeMarker();
        removeRectangle();
        lat = location.lat();
        long = location.lng();
        $scope.address.lat = lat;
        $scope.address.long = long;
        console.log("lat " + lat + ' ' + long);
        marker = new google.maps.Marker({
            position: location,
            map: resmap
        });
        getAddress(location);
    }
    function removeMarker() {
        if (marker !== null) {
            marker.setMap(null);
        }
    }
    function removeRectangle() {
        if (rectangle !== null) {
            rectangle.setMap(null);
        }
    }
    $scope.geocodeAddress = function (address){
        if (address !== null) {
            var add = "";

            for (var key in address)
            {
                if( key !== 'lat' && key !=='long')
                add = add + ',' + address[key].toString();
            }
            if (add !== add1) {
            $http({
              method :'POST',
              url : 'geoimplement.php',
              data: {address:add},
              headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          
            }).then(function successCallback(results){
                if(results.data!="false"){
                  console.log(results);
                  removeMarker();
                        removeRectangle();
                        $scope.address.lat = lat;
                        $scope.address.long = long;
                        lat = results.data.geometry.location.lat;
                        long = results.data.geometry.location.lng;
                        console.log("Latitude:" + lat + "Longitude:" + long);
                        marker = new google.maps.Marker({
                            map: resmap,
                            position: results.data.geometry.location
                        });
                        if (results.data.geometry.viewport) {
                            rectangle = new google.maps.Rectangle({
                                strokeColor: '#FF0000',
                                strokeOpacity: 0.8,
                                strokeWeight: 2,
                                fillColor: '#FF0000',
                                fillOpacity: 0.35,
                                map: resmap,
                                bounds: {
                                    north: results.data.geometry.viewport.northeast.lat, //19.185108,
                                    south: results.data.geometry.viewport.southwest.lat, //19.1251106,
                                    east: results.data.geometry.viewport.northeast.lng, //72.94776869999998, 
                                    west: results.data.geometry.viewport.southwest.lng//72.88884499999995
                                }
                            });
                            resmap.setCenter(new google.maps.LatLng(lat,long));
                            var googleBounds = new google.maps.LatLngBounds(results.data.geometry.viewport.southwest,results.data.geometry.viewport.northeast);

                            resmap.fitBounds(googleBounds);


                }

              }else{
                  removeRectangle();

                }
              
            },function errorCallback(results){
    // called asynchronously if an error occurs
    // or server returns response with an error status.
          });

        };
    }};
    // $scope.geocodeAddress = function (address) {
    //     if (address !== null) {
    //         var add = "";

    //         for (var key in address)
    //         {
    //             if( key !== 'lat' && key !=='long')
    //             add = add + ',' + address[key].toString();
    //         }
    //         if (add !== add1) {
    //             geocoder.geocode({'address': add}, function (results, status) {
    //                 if (status === 'OK') {
    //                     removeMarker();
    //                     removeRectangle();
    //                     $scope.address.lat = lat;
    //                     $scope.address.long = long;
    //                     lat = results.data.geometry.location.lat();
    //                     long = results.data.geometry.location.lng();
    //                     console.log("Latitude:" + lat + "Longitude:" + long);
    //                     marker = new google.maps.Marker({
    //                         map: resmap,
    //                         position: results.data.geometry.location
    //                     });
    //                     if (results.data.geometry.viewport) {
    //                         rectangle = new google.maps.Rectangle({
    //                             strokeColor: '#FF0000',
    //                             strokeOpacity: 0.8,
    //                             strokeWeight: 2,
    //                             fillColor: '#FF0000',
    //                             fillOpacity: 0.35,
    //                             map: resmap,
    //                             bounds: {
    //                                 north: results.data.geometry.viewport.f.f, //19.185108,
    //                                 south: results.data.geometry.viewport.f.b, //19.1251106,
    //                                 east: results.data.geometry.viewport.b.f, //72.94776869999998, 
    //                                 west: results.data.geometry.viewport.b.b//72.88884499999995
    //                             }
    //                         });
    //                         resmap.setCenter(results.data.geometry.viewport.getCenter());
    //                         resmap.fitBounds(results.data.geometry.viewport);
    //                     }
    //                 } else {
    //                     removeRectangle();
    //                     //console.log('Geocode was not successful for the following reason: ' + status);
    //                 }
    //             });
    //         }

    //     }
    // };
    function getAddress (latlong) {
        geocoder.geocode({
            'latLng': latlong
        }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    console.log(results[1].formatted_address);
                } else {
                    console.log('No results found');
                }
            } else {
                console.logs('Geocoder failed due to: ' + status);
            }
        });
    };
      //     $scope.initMap = function(){

      //      resmap = new google.maps.Map(document.getElementById('map'), {
      //         zoom: 8,
      //         center: {lat: -34.397, lng: 150.644}
      //       });
      //        geocoder = new google.maps.Geocoder();
      //     }



      //   var marker = null;
      //   var rectangle = null;
      //   var tempadd = null;
      //   var add1 ="";
      //   var lat="";
      //   var long="";
      //   $scope.geocodeAddress = function(address) {
      //     if(address!=null){
      //     var add = "";

      //     for(var key in address)
      //     {
      //       if( key !== 'lat' && key !=='long')
      //       add = add+','+address[key].toString();
      //     }
      //     console.log("add"+add);
      //   // console.log(add);
      //   // console.log(add1);
      //     if(add != add1){
      //     geocoder.geocode({'address': add}, function(results, status) {
      //       if (status === 'OK')  {
      //         if(marker!=null){
      //            marker.setMap(null);
      //          }
      //         if(rectangle!=null){
      //            rectangle.setMap(null);
      //          }  
      //          lat =  results.data.geometry.location.lat();
      //           long = results.data.geometry.location.lng();
      //           $scope.address.lat = lat;
      //           $scope.address.long = long;
      //           //alert("Latitude:"+lat + "Longitude:"+long);
      //           console.log("Latitude:"+lat + "Longitude:"+long);
      //         marker = new google.maps.Marker({
      //           map: resmap,
      //           position: results.data.geometry.location
      //         });
      //         if(results.data.geometry.viewport){
      //         rectangle = new google.maps.Rectangle({
      //         strokeColor: '#FF0000',
      //         strokeOpacity: 0.5,
      //         strokeWeight: 2,
      //         fillColor: '#FF0000',
      //         fillOpacity: 0.25,
      //         map: resmap,
      //         bounds: {
      //           north: results.data.geometry.viewport.f.f,//19.185108,
      //           south: results.data.geometry.viewport.f.b,//19.1251106,
      //           east: results.data.geometry.viewport.b.f,//72.94776869999998, 
      //           west: results.data.geometry.viewport.b.b//72.88884499999995
      //         }
      //        });
      //       resmap.setCenter(results.data.geometry.viewport.getCenter());
      //       resmap.fitBounds(results.data.geometry.viewport);
      //       }
      //       } else {

      //         console.log('Geocode was not successful for the following reason: ' + status);
      //       }
      //     });
      //   }
        
      //   }
      // }

      //insert start
      $scope.processForm = function(){
        var digiadd="";
        $http({
          method :'POST',
          url : 'forInsertLocation.php',
          data:$scope.address,
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          // data : {
          //   pincode      :$scope.pincode,
          //   sector     :$scope.sector,
          //   street : $scope.street,
          //   landmark   :$scope.landmark,
          //   bhname    :$scope.bhname,
          //   bhname  :$scope.hfno
          // }
        }).then(function(response)
        {
          
            if(!response.data.status)
            {
              console.log("1");
              $scope.status = "Failed to insert the data";
            }
            else if (response.data.status)
            {
              console.log("2");
              digiadd=response.data.status;
              $scope.digiaddlabel = response.data.status;
              console.log(response);
              $scope.pincode=null;
              $scope.sector=null;
              $scope.street=null;
              $scope.landmark=null;
              $scope.bhname=null;
              $scope.hfno=null;
              $http({
                method :'POST',
                url : 'qrgenerate.php',
                data:{digiadd:digiadd}
              }).then(function(response)
              {
                console.log(response.data.digiadd);
                $scope.digiadd=response.data.digiadd;
                $('#exampleModalCenter').modal('show')
              },
              function(response){
                console.log("qr error "+response.statusText);
              });
            }
        },
        function(response){
          console.log(response.statusText);
        });
        

      };

      $scope.printQR = function(printbody) {
        var printContents = document.getElementById(printbody).innerHTML;
        var printWindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');
        printWindow.document.open();
        printWindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + printContents + '</html>');
        printWindow.document.close();
      };

      });

var loginapp = angular.module('loginApp',[]);
  loginapp.controller('loginControl', function($scope, $http){
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
            if(!response.data.status)
            {
              console.log("1");
              $scope.status = "Invalid Username or password";
            }
            else if (response.data.status)
            {
              console.log("2");
              window.location = "index.php";
            }

          }
        },
        function(response){
          console.log(response.statusText);
        });
      }

        

    });  

