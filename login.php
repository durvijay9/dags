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

  <body ng-app="loginApp" ng-controller="loginControl">
    <?php 
      include('navbar.php');
    ?>
    <div class="fluid-container">
      <div class="row row-allign"> 
        <div class="col-sm-1">
        </div>
        <div class="col-sm-7">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExmpleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
            </ol>
            <div class="carousel-inner">
              <!-- <div class="carousel-item active">
                <img class="d-block w-100" src="images/Digital-post-office.jpg" alt="First slide" height="350px">
              </div> -->
              <div class="carousel-item active">
                <img class="d-block w-100" src="images/FC_image_750.jpg" alt="Second slide" height="350px">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/india-post-centre.jpg" alt="Third slide" height="350px">
              </div>
            </div>
            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span> -->
            </a>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card-layout">
            <form ng-submit="validatelogin()">
              <div class="form-group">
                <label for="userID">User ID</label>
                <input type="text" class="form-control rounded-0" id="userID" name="userid" ng-model="userid" placeholder="userID">
                <small id="emailHelp" class="form-text text-danger" ng-show="errorUserid">{{errorUserid}}</small>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control rounded-0" id="password" name="password" ng-model="password" placeholder="Password">
                <small class="form-text text-danger" ng-show="errorPassword">{{errorPassword}}</small>
              </div>
              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
              <hr>
              <button type="submit" class="btn btn-color btn-block text-color">Login</button>
              <span class="form-text text-muted" ng-show="status">{{status}}</span>
            </form>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
