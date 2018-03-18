<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/customstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <title>POST</title>
  </head>

  <body ng-app="indexApp" ng-controller="control1">
    <div class="fluid-container">
      <nav class="navbar navbar-expand-lg navbar-primary navbar-color">
        <a class="navbar-brand text-color" href="#">Navbar</a>
        <button class="navbar-toggler button-color" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul> -->
        </div>
      </nav>
      <div class="fluid-container">
        <div class="row no-margin">
          <div class="col-sm-3">
           
          </div>
          <div class="col-sm-6">
            <div class="border border-warning spacing-top">
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
                      <input type="text" class="form-control rounded-0 is-valid textbox-depth" id="zip" ng-model="zip" ng-keyup="getZipCode(zip)"/>
                      <ul class="list-group" ng-model="hidethis" ng-hide="hidethis" class="overlap">  
                          <li class="list-group-item" ng-repeat="zipcode in filterzipcodes" ng-click="fillTextbox(zipcode)">{{zipcode}}</li>  
                     </ul>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="input8">State</label>
                      <select id="inputState" class="form-control rounded-0 is-valid" ng-model="input8" ng-keyup="getStates()">
                        <option selected>Choose...</option>
                        <option selected>Choose...</option>
                        <option selected>Choose...</option>
                        <option selected>Choose...</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input6">District</label>
                      <input type="text" class="form-control rounded-0 is-valid" id="input7" placeholder="District" ng-model="district.zipcode" ng-keyup="getDistrict()"/>
                    </div>
                  </div>

                  <div class="form-row textbox-depth">
                    <div class="form-group col-md-6">
                      <label for="input7">City</label>
                      <input type="text" class="form-control rounded-0 is-valid" id="input6" ng-model="input6" ng-keyup="getCity()"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input5">Something</label>
                      <input type="text" class="form-control rounded-0 is-valid textbox-depth" id="input5" placeholder="" ng-model="input5" ng-keyup=""/>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="input4">Sector/Area</label>
                      <input type="text" class="form-control rounded-0 is-valid" id="input4" placeholder="Sector/Area" ng-model="input4" ng-keyup="getArea()"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input3">Street Name/Street No.</label>
                      <input type="text" class="form-control rounded-0 is-valid" id="input3" placeholder="Street Name/Street No." ng-model="input3" ng-keyup="getStreet()"/>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="input2">Building Name/House Name.</label>
                      <input type="text" class="form-control rounded-0 is-valid" id="input2" placeholder="Building Name/House Name." ng-model="input2" ng-keyup="getHouse()"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="input1">Room No./Flat No.</label>
                      <input type="text" class="form-control rounded-0 is-valid" id="input1" placeholder="Room No./Flat No." ng-model="input1"/>
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
          
        </div>
      </div>
    </div>
    <script src="js/functionality.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
