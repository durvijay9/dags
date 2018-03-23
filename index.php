<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/customstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />
        
    <title>POST</title>
  </head>

  <body ng-app="indexApp" ng-controller="control1">
    <div class="fluid-container">
      <?php 
        include('navbar.php');
      ?>
      <div class="">
        <div class="row no-margin">
          <div class="col-sm-6">
            <div class="form-border spacing-top">
              <div class="card-header"><center><h5>Header</h5></center></div>
              <div class="extra-padding">
                <form ng-submit="processForm()" class="custom-form">
                  <div class="form-row">
                    <!-- <div class="form-group col-md-2">
                      <label for="inputZip" class="animated-label">Zip</label>
                      <input type="text" class="form-control rounded-0 is-valid" id="inputZip" ng-model="input9" ng-keyup="getZipCode(input9)"/>
                      <select style="width: 100%;" size="7" ng-model="select" ng-multiple="true"  
         ng-options="opt as opt for opt in district" class="ontop" ng-show="input9" ng-hide="hideit" ng-click="showHide()"></select>
                    </div> -->
                    <div class="form-group col-md-2">
                      <label for="inputZip" class="animated-label">Zip</label>
                      <input type="text" class="form-control rounded-0 textbox-depth textbox-border" id="pincode" ng-model="pincode" ng-keyup="getPincode()"/>
                      <!-- <ul class="list-group" ng-model="hidethis" ng-hide="hidethis" class="overlap">  
                          <li class="list-group-item" ng-repeat="zipcode in filterzipcodes" ng-click="complete(zipcode)">{{zipcode}}</li>  
                     </ul> -->
                    </div>
                    <div class="form-group col-md-4">
                      <label for="input8">State</label>
                      <select id="inputState" class="form-control rounded-0 textbox-border" ng-model="state" ng-keyup="getStates()">
                        <option selected>Choose...</option>
                        <option selected>Choose...</option>
                        <option selected>Choose...</option>
                        <option selected>Choose...</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input6">District</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="district" placeholder="District" ng-model="district" ng-keyup="getDistrict()"/>
                    </div>
                  </div>

                  <div class="form-row textbox-depth">
                    <div class="form-group col-md-6">
                      <label for="input7">City</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="city" ng-model="city" ng-keyup="getCity()"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="city">Something</label>
                      <input type="text" class="form-control rounded-0 textbox-border textbox-depth" id="city" placeholder="" ng-model="city" ng-keyup=""/>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="sector">Sector/Area</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="sector" placeholder="Sector/Area" ng-model="sector" ng-keyup="getArea()"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="street">Street Name/Street No.</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="street" placeholder="Street Name/Street No." ng-model="street" ng-keyup="getStreet()"/>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="bhname">Building Name/House Name.</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="bhname" placeholder="Building Name/House Name." ng-model="bhname" ng-keyup="getHouse()"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="hfno">Room No./Flat No.</label>
                      <input type="text" class="form-control rounded-0 textbox-border" id="hfno" placeholder="Room No./Flat No." ng-model="hfno"/>
                    </div>
                  </div>
                  
                  
                  
                  <button type="submit" class="btn btn-color btn-block">Verify</button>
                </form>
              </div>
              
            </div>
            <br>
            <div class="p-1 mb-2 bg-danger text-white border border-white" ng-show=""><h4><center ng-bind="myWelcome.value1"></center></h4>
            </div>
          </div>
          <div class="col-sm-6">
            maps
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>
    <script src="js/functionality.js">
    </script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
