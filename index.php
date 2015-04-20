<?php include('include/config.php'); ?>
<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>E-commerce</title>

    <!-- Bootstrap core CSS -->
    <link href="front_design/css/bootstrap.min.css" rel="stylesheet">
	<link href="front_design/css/master.css" rel="stylesheet">
    
	<style type="text/css">
    
    </style>
  </head>

  <body>

    <!-- Fixed navbar -->

    <nav ng-controller="HomeController" class="navbar navbar-default navbar-fixed-top nevi_bar" ng-hide="session_id">
      <div class="container">
	  	<div class="col-md-8 No-padding">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#dashboard">HOME</a></li>
            <li ng-repeat="data in categories"><a href="#/product-category/{{data.category_id}}">{{ data.category_title }}</a></li>

            
            </li>
          </ul>
        </div>
		</div>

		<div class="col-md-4 No-padding" >
			<div class="log_sin_box">
				<a href="#login">LOGIN</a>
				or
				<a href="#signup">SIGN UP</a>
			</div>
		</div>
		
		<!--/.nav-collapse -->
      </div>
    </nav>
	
	
	<div class="header_box" ng-hide="session_id">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="logo-box"><a href="#">
					<img src="front_design/img/lgoo.jpg"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
    
<div ng-controller="HomeController" class="navbar navbar-default navbar-fixed-top usr_nav" ng-show="session_id">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <div class="logo_user"> <a href="login-form.html"><img src="front_design/img/lgoo_user.jpg"></a> </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#dashboard">HOME</a></li>
            <li><a href="#mycart">MY CART</a></li>
            <li><a href="#dashboard">WISHLIST</a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">SIGN IN <b class="caret"></b></a>
              <ul class="dropdown-menu">
			    <li><a href="#user-home">User Home</a></li>
                <li><a ng-click="Logout()" href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    </div>
  </div>
</div>
<!-- Begin page content -->
	

	<div ng-view="" id="ng-view" ng-class="session_id ? 'main_content_user' : 'main_content'" >
	
	
	</div>
	
    <script src="front_design/js/jquery.min.js"></script>
    <script src="front_design/js/bootstrap.min.js"></script>
	<script src="app/js/angular.min.js"></script>
	<script src="app/js/angular-route.min.js"></script>
	<script src="app/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
		
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
	   var myApp = angular.module("myApp", ['ngRoute','ui.bootstrap']);
      
	  myApp.factory("services", ['$http', function($http) {
		  var serviceBase = 'services/'
			var obj = {};
			obj.getcategories = function(){
				return $http.get(serviceBase + 'categories');
			}
			obj.getproduct = function(ID){
				return $http.get(serviceBase + 'product?id=' + ID);
			}
			
			obj.getallproduct = function(ID){
				return $http.get(serviceBase + 'allproduct?id=' + ID);
			}
			
			obj.addcart = function(ID){
				return $http.get(serviceBase + 'addcart?id=' + ID);
			}
			
			obj.checkincart = function(ID){
				return $http.get(serviceBase + 'checkincart?id=' + ID);
			}
			
			obj.allproduct = function(ID){
				return $http.get(serviceBase + 'allproducts');
			}
			
			obj.checksession = function(){
				return $http.get(serviceBase + 'session');
			}
			
			
			
			obj.insertUser = function (user) {
			return $http.post(serviceBase + 'saveUser', user).then(function (results) {
				return results;
			});
			};
            
			return obj;   
		}]);

	  
      myApp.config(['$routeProvider',
         function($routeProvider) {
            $routeProvider.
			   when('/', {
			      title: 'Home',
                  templateUrl: 'home.php',
                  controller: 'HomeController'
               }).
			   when('/login', {
			      title: 'Login',
                  templateUrl: 'login_form.php',
                  controller: 'HomeController'
               }).
			  
			   when('/signup', {
			      title: 'Sign Up Form',
                  templateUrl: 'registration-form.php',
                  controller: 'HomeController'
               }).
			   
			   when('/product-category/:CategoryID', {
					title: 'Product Category',
					templateUrl: 'all_product.php',
					controller: 'HomeController'
			   }).
			   
               otherwise({
                  redirectTo: '/'
               });
         }]);
        
         myApp.controller('HomeController', function($scope, $http, $route, $timeout, $rootScope, $location, $routeParams, services) { 
			
			var Auth = '';
			
			var Auth = function(){
               services.checksession().then(function(data){
					
					$rootScope.session_id = data.data.loginid;
					$rootScope.session_email = data.data.loginemail;
				});
			};
			
			Auth();
			
			services.getcategories().then(function(data){
				//alert(data.data);
				$scope.categories = data.data;
			});
			
			$scope.getProductData = function(id) { 
			    var obj = {content:null};
			    services.getproduct(id).then(function(data){	
					obj.content = data.data;
				});
				return obj;
			},
			
			$scope.getProductCat = function() { 
			
                var ID = $routeParams.CategoryID;
				//alert(ID);
			    //var obj = {content:null};
			    services.getallproduct(ID).then(function(data){	
					//alert(data.data);
					$scope.list = data.data;
					$scope.currentPage = 1; 
					$scope.entryLimit = 6; 
					
				});
				//return obj;
			},
			
			
			$scope.sort_by = function(predicate) {
				$scope.predicate = predicate;
				$scope.reverse = !$scope.reverse;
			};
			
			$scope.getAllProduct = function() { 
			    services.allproduct().then(function(data){	
					$scope.list = data.data;
					$scope.currentPage = 1; 
					$scope.entryLimit = 9; 
					
				});
			},
			
			$scope.mySplit = function(string, nb) {
				$scope.array = string.split(',');
				return $scope.result = $scope.array[nb];
			},
			
			$scope.submitForm = function(form) {
				$http.post('include/user_login.php', $scope.form).success(function(data){   
				   if(data.success !=''){
				     $rootScope.session_id = data.loginid;
					 $rootScope.session_email = data.loginemail;
				     $location.path('/user-home');
				   }
				   //$scope.success = data.success;
				   $scope.error = data.error;
				   //$location.path("user-form");
				});
             
			};
			
			$scope.loginForm = function(form) {
				$http.post('include/user_login.php', $scope.form).success(function(data){   
				   if(data.success !=''){
				     $rootScope.session_id = data.loginid;
					 $rootScope.session_email = data.loginemail;
				     $location.path('/user-home');
				   }
				   //$scope.success = data.success;
				   $scope.error = data.error;
				   //$location.path("user-form");
				});
             
			};
			
			$scope.signupForm = function(form) {
                services.insertUser(form).then(function(data){	
					//alert(data.data);
					if(data.data.status=='Error'){
					   $scope.error = data.data.msg;
					}else if(data.data.status=='Success'){ 
                       $rootScope.success = data.data.msg;
					   $location.path('/login');
					}
				});             
			};
			
			$scope.removeItem = function(index){
				$scope.list.splice(index,1);
			};
			
			$scope.Logout = function() {
				$http.get('include/check_login.php?logout=logout').success(function(data){   
				   
				   if(data.logout !=''){
				     $rootScope.session_id = '';
					 $rootScope.session_email = '';
				     $rootScope.success = 'Logout Successfully'; 
				   }
				});
             
			};
				
         });
		 
		 myApp.run(['$location', '$http', '$rootScope', function($location, $http, $rootScope) {
			$rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
				//$rootScope.login = current.$$route.requireLogin;
				Auth();
				var logged = current.$$route.requireLogin;
				if(logged==='Yes'){
				   $http.get('include/check_login.php?check=session').success(function(data){   
					   //alert(data.loginid);
					   
					   if(data.loginid > 0){
					   
					   }else{
					      $location.path('/login');
					   }
					});
				}
				else{
				   
				}
			});
		}]);
	</script>
  </body>
</html>
