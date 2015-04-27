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
    ul>li, a{cursor: pointer;}
	
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
    
	
	<!-- Fixed navbar -->
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
			<li><a href="#search">SEARCH</a></li>
            <li><a href="#mycart">MY CART</a></li>
            <li><a href="#wishlist">WISH LIST</a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ session_username }} <b class="caret"></b></a>
              <ul class="dropdown-menu">
			    <li><a href="#user-home">User Home</a></li>
				<li><a href="#order">My Order</a></li>
				<li><a href="#profile">Profile</a></li>
				<li><a href="#changepass">Change Password</a></li>
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
	
	
	<!-- Begin footer content -->
    <footer class="footer">
      <div class="container">
        <p class="text-muted">COPYRIGHT @RAVIPROLU.
		<center> 2015</center>   
		</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
			
			obj.wishlist = function(ID){
				return $http.get(serviceBase + 'wishlist?id=' + ID);
			}
			
			obj.addcart = function(ID){
				return $http.get(serviceBase + 'addcart?id=' + ID);
			}
			
			obj.addtocart = function(ID){
				return $http.get(serviceBase + 'addtocart?id=' + ID);
			}
			
			obj.checkinwish = function(ID){
				return $http.get(serviceBase + 'checkinwish?id=' + ID);
			}
			
			obj.checkincart = function(ID){
				return $http.get(serviceBase + 'checkincart?id=' + ID);
			}
			
			obj.allproduct = function(ID){
				return $http.get(serviceBase + 'allproducts');
			}
			
			obj.getfeatured = function(){
				return $http.get(serviceBase + 'getfeatured');
			}
			
			obj.checksession = function(){
				return $http.get(serviceBase + 'session');
			}
			
			obj.getmycart = function(){
				return $http.get(serviceBase + 'getmycart');
			}
			
			obj.getmywishlist = function(){
				return $http.get(serviceBase + 'getmywishlist');
			}
			
			obj.removecart = function(ID){
				return $http.get(serviceBase + 'removecart?id=' + ID);
			}
			
			obj.removewish = function(ID){
				return $http.get(serviceBase + 'removewish?id=' + ID);
			}
			
			obj.getuserdetail = function(){
				return $http.get(serviceBase + 'getuserdetail');
			}
			
			obj.getproductdetail = function(ID){
				return $http.get(serviceBase + 'getproductdetail?id=' + ID);
			}
			
			
			
			obj.updatecart = function (id,qnt) {
				return $http.post(serviceBase + 'updatecart', {id:id, quantity:qnt}).then(function (status) {
					return status.data;
				});
			};
			
			obj.insertUser = function (user) {
			return $http.post(serviceBase + 'saveUser', user).then(function (results) {
				return results;
			});
			};
			
			obj.updateUser = function (user) {
			return $http.post(serviceBase + 'updateUser', user).then(function (results) {
				return results;
			});
			};
			
			obj.changepass = function (user) {
			return $http.post(serviceBase + 'changepass', user).then(function (results) {
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
			   when('/user-home', {
			      title: 'User Home',
                  templateUrl: 'user_home.php',
                  controller: 'HomeController',
				  requireLogin: 'Yes'
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
			   when('/mycart', {
			      title: 'Mycart',
                  templateUrl: 'my_cart.php',
                  controller: 'HomeController',
				  requireLogin: 'Yes'
               }).
			   
			   when('/wishlist', {
			      title: 'wishlist',
                  templateUrl: 'wishlist.php',
                  controller: 'HomeController',
				  requireLogin: 'Yes'
               }).
			   
               when('/changepass', {
			      title: 'Change Password',
                  templateUrl: 'changepassword.php',
                  controller: 'HomeController',
				  requireLogin: 'Yes'
               }).
			   when('/profile', {
			      title: 'User Profile',
                  templateUrl: 'profile.php',
                  controller: 'HomeController',
				  requireLogin: 'Yes'
               }).
			   when('/editprofile', {
			      title: 'User Edit Profile',
                  templateUrl: 'edit_profile.php',
                  controller: 'HomeController',
				  requireLogin: 'Yes'
               }).
			   when('/product-detail/:ProductID', {
					title: 'Product Details',
					templateUrl: 'product_detail.php',
					controller: 'HomeController'
			   }).
			   when('/search', {
			      title: 'Search Product',
                  templateUrl: 'user_home.php',
                  controller: 'HomeController'
               }).
               otherwise({
                  redirectTo: '/'
               });
         }]);
         
		 myApp.filter('startFrom', function() {
			return function(input, start) {
				if(input) {
					start = +start; //parse to int
					return input.slice(start);
				}
				return [];
			}
		});
		 
         myApp.controller('HomeController', function($scope, $http, $route, $timeout, $rootScope, $location, $routeParams, services) { 
			
			var Auth = function(){
               services.checksession().then(function(data){
					
					$rootScope.session_id = data.data.loginid;
					$rootScope.session_username = data.data.loginuser;
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
					$scope.currentPage = 1; //current page
					$scope.entryLimit = 6; //max no of items to display in a page
					$scope.filteredItems = $scope.list.length; //Initially for no filter  
					$scope.totalItems = $scope.list.length;
					$scope.inwish = true;
					var d = new Date();
				    $scope.cur = new Date(d.setDate(d.getDate()-2));
				});
				//return obj;
			},
			
			$scope.filter = function() {
				$timeout(function() { 
					$scope.filteredItems = $scope.filtered.length;
				}, 10);
			};
			$scope.sort_by = function(predicate) {
				$scope.predicate = predicate;
				$scope.reverse = !$scope.reverse;
			};
			
			$scope.getnew = function(date) {
			    
				 var d = new Date(date);
				 return d;
			};
			
			$scope.getAllProduct = function() { 
			    services.allproduct().then(function(data){	
					$scope.list = data.data;
					$scope.currentPage = 1; //current page
					$scope.entryLimit = 9; //max no of items to display in a page
					$scope.filteredItems = $scope.list.length; //Initially for no filter  
					$scope.totalItems = $scope.list.length;
				    $scope.inwish = true;
					var d = new Date();
				    $scope.cur = new Date(d.setDate(d.getDate()-2));
				});
			},
			
			$scope.getfeatured = function() { 
			    services.getfeatured().then(function(data){	
					$scope.flist = data.data;
					
				});
			},
			
			$scope.mySplit = function(string, nb) {
				$scope.array = string.split(',');
				return $scope.result = $scope.array[nb];
			},
			
			$scope.explode = function(string) {
				$scope.array = string.split(',');
				return $scope.result = $scope.array;
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
				$http.post('include/user_login.php', form).success(function(data){   
				   if(data.success !=''){
				     $rootScope.session_id = data.loginid;
					 $rootScope.session_email = data.loginemail;
				     $route.reload();
				   }else{
				   //$scope.success = data.success;
				   alert(data.error);
				   //$location.path("user-form");
				   }
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
			
			$scope.UpdateProfile = function(form) {
                services.updateUser(form).then(function(data){	
					//alert(data.data);
					if(data.data.status=='Error'){
					   $scope.error = data.data.msg;
					}else if(data.data.status=='Success'){ 
                       $scope.success = data.data.msg;
					   //$location.path('/login');
					}
				});             
			};
			
			
			
			$scope.addcart = function(proid,user_id) { 
			
				services.addcart(proid).then(function(data){	
					$scope.message = data.data.msg;
					//$(this).addClass('wish_active');
				}); 
			},
			
			$scope.addWishlist = function(proid,user_id) { 
				services.wishlist(proid).then(function(data){	
					$scope.message = data.data.msg;
                    //$(this).addClass('wish_active');
					
				}); 
			},
			
			
			
			$scope.isinwish = function(proid){
				var obj = {inwish:null};
			    services.checkinwish(proid).then(function(data){	
					
					obj.inwish = data.data;
				});
				return obj;
			},
			
			$scope.isincart = function(proid){
				var obj = {incart:null};
			    services.checkincart(proid).then(function(data){	
					obj.incart = data.data;
				});
				return obj;
			},
			
			$scope.mycartlist = function() { 
				services.getmycart().then(function(data){
                    $scope.list = data.data;
					$scope.totalItems = $scope.list.length;
					
				}); 
			},
			
			$scope.userdetail = function() { 
				services.getuserdetail().then(function(data){
				    //alert(data.data.user_id);
                    $scope.form = data.data;
				}); 
			},
			
			$scope.mywishlist = function() { 
				services.getmywishlist().then(function(data){
                    $scope.list = data.data;
					$scope.totalItems = $scope.list.length;
				}); 
			},
			
			$scope.getTotal = function(){
				var total = 0;
				for(var i = 0; i < $scope.list.length; i++){
					var product = $scope.list[i];
					total += (product.product_price * product.quantity);
				}
				return total;
			}
			
			$scope.removeCartItem = function(proid,index){
				services.removecart(proid).then(function(data){	
					$scope.list.splice(index,1);
				}); 
			};
			
			$scope.removeWishItem = function(proid,index){
				services.removewish(proid).then(function(data){	
					$scope.list.splice(index,1);
				}); 
			};
			
			$scope.addtocart = function(proid,index) { 
			
				services.addtocart(proid).then(function(data){	
					$scope.message = data.data.msg;
					
					$scope.list.splice(index,1);
				}); 
			},
			
			
			
			$scope.updatecart = function(proid,qnt) {
                services.updatecart(proid,qnt).then(function(data){	
					//$scope.list.splice(index,1);
				});
			},
			
			
			$scope.changeForm = function(form) {
				services.changepass(form).then(function(data){	
					if(data.data.status=='Error'){
					   $scope.error = data.data.msg;
					}else if(data.data.status=='Success'){ 
					   $scope.success = data.data.msg;
					  
					}
				});    
			};
			
			$scope.productdetail = function() {
                 var ID = $routeParams.ProductID;			
				services.getproductdetail(ID).then(function(data){
				    //alert(data.data.user_id);
                    $scope.product = data.data;
				}); 
			},
			
			$scope.Logout = function() {
				$http.get('include/check_login.php?logout=logout').success(function(data){   
				   
				   if(data.logout !=''){
				     $rootScope.session_id = '';
					 $rootScope.session_email = '';
					 $rootScope.session_username = '';
				     $rootScope.success = 'Logout Successfully'; 
				   }
				});
             
			};
				
         });
		 
		 myApp.directive('starRating',
	function() {
		return {
			restrict : 'A',
			template : '<ul class="rating">'
					 + '	<li ng-repeat="star in stars" ng-class="star" ng-click="toggle($index)">'
					 + '\u2605'
					 + '</li>'
					 + '</ul>',
			scope : {
				ratingValue : '=',
				max : '=',
				onRatingSelected : '&'
			},
			link : function(scope, elem, attrs) {
				var updateStars = function() {
					scope.stars = [];
					for ( var i = 0; i < scope.max; i++) {
						scope.stars.push({
							filled : i < scope.ratingValue
						});
					}
				};
				
				scope.toggle = function(index) {
					scope.ratingValue = index + 1;
					scope.onRatingSelected({
						rating : index + 1
					});
				};
				
				scope.$watch('ratingValue',
					function(oldVal, newVal) {
						if (newVal) {
							updateStars();
						}
					}
				);
			}
		};
	}
);
		 
		 myApp.run(['$location', '$http', '$rootScope', function($location, $http, $rootScope) {
			$rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
				//$rootScope.login = current.$$route.requireLogin;
				//Auth();
				
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
	<script>
		function showPassword() {
    
    var key_attr = $('#key').attr('type');
    
    if(key_attr != 'text') {
        
        $('.checkbox').addClass('show');
        $('#key').attr('type', 'text');
        
    } else {
        
        $('.checkbox').removeClass('show');
        $('#key').attr('type', 'password');
        
    }
    
}
	</script>
  </body>
</html>
