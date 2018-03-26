<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/customstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
    </style>
    <title>POST</title>
  </head>

  <body ng-app="indexApp" ng-controller="control1">
    <?php 
        include('navbar.php');
      ?>
    <div class="container">
      
      
        <div class="row row-allign">
          <div class="col-sm-4">
            <!-- <center> -->
            <div class="form-border spacing-top">
              <div class="card-header"><center><h5>Header</h5></center></div>
              <div class="extra-padding">

                <form ng-submit="processForm()" class="custom-form">
                  <div class="">
                  <div class="">
                  <div class="form-group input-group-sm">
                      <label for="inputZip" class="animated-label">Pincode</label>
                      <input type="text" class="form-control rounded-0 textbox-depth textbox-border" id="pincode" ng-model="address.pincode" ng-blur="geocodeAddress(address)"/>
                      <!-- <ul class="list-group" ng-model="hidethis" ng-hide="hidethis" class="overlap">  
                          <li class="list-group-item" ng-repeat="zipcode in filterzipcodes" ng-click="complete(zipcode)">{{zipcode}}</li>  
                     </ul> -->
                  </div>
                  </div>

                  <div class="">
                    <div class="form-group input-group-sm">
                      <label for="sector">Sector/Area</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="sector" placeholder="" ng-model="address.sector" ng-blur="geocodeAddress(address)"/>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-group input-group-sm">
                      <label for="street">Street Name/Street No.</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="street" placeholder="" ng-model="address.street" ng-blur="geocodeAddress(address)"/>
                    </div>
                  </div>

                  <div class="">
                    <!-- <div class="form-group col-md-6">
                      <label for="input7">City</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="city" ng-model="city" ng-keyup="getCity()"/>
                    </div> -->
                    <div class="form-group input-group-sm">
                      <label for="city">Landmark</label>
                      <input type="text" class="form-control rounded-0 textbox-border textbox-depth" id="landmark" placeholder="" ng-model="address.landmark" ng-blur="geocodeAddress(address)"/>
                    </div>
                  </div>

                  <div class="">
                    <div class="form-group input-group-sm">
                      <label for="bhname">Building/House Name.</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="bhname" placeholder="" ng-model="address.bhname" ng-blur="geocodeAddress(address)"/>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-group input-group-sm">
                      <label for="hfno">Room No./Flat No.</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="hfno" placeholder="" ng-model="address.hfno" ng-blur="geocodeAddress(address)"/>
                    </div>
                  </div>
                  <div class="">
                    <div class="form-group input-group-sm">
                      <input type="hidden" ng-model="address.lat"/>
                    </div>
                  </div><div class="">
                    <div class="form-group input-group-sm">
                      <input type="hidden" ng-model="address.long"/>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-color btn-block">Verify</button>
                  </div>
                </form>
              </div>
            </div>
            <br>
            <div class="p-1 mb-2 bg-danger text-white border border-white" ng-show=""><h4><center ng-bind="myWelcome.value1"></center></h4>
            </div>
          <!-- </center> -->
        </div>
          <div class="col-sm-8 map-align" ng-init="initMap()">
            <div id="map" class="extra-padding"></div>
          </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
        </div>
        <div class="col-sm-4">
        
      </div>
      </div>

      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content rounded-0 form-border">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="printbody">
              <div class="row">
                <div class="col-sm-6"></br></br></br>
                  <div class="align-middle">
                    <h1><span ng-model="digiaddlabel">{{digiaddlabel}}</span></h1>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div ng-show="digiadd" ng-model="digiadd" class="float-right">
                    <img src="{{digiadd}}">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" ng-click="printQR('printbody')">Print</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>



    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXtUgIJI39fpYsM2y2FwAs0KynuS_qmP8">
    </script>
    <script src="js/functionality.js">
    </script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>