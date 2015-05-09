<?php
include('../include/config.php');
if(($_SESSION['role']!='1') and ($_SESSION['role']!='2') ){
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html ng-app="mainApp" ng-app lang="en">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Eshop Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <link href="../admin_design/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
        <link href="../admin_design/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
		
        <link href="../admin_design/css/admin.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
    ul>li, a{cursor: pointer;}
    </style>
<script src="../admin_design/js/jquery.min.js"></script>

</head>
    <body class="skin-blue">
        
        <header class="header">
            <a href="admin/dashboard" class="logo">
               
                Admin Panel
            </a>
           
            <nav class="navbar navbar-static-top" role="navigation">
               
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
           
                       
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['adminname']; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                
                               
                                <li class="user-body">
                                    <div class="col-xs-7 text-center">
                                        <a href="#changepass">Change Password </a>
                                    </div>
                                   
                                </li>
                               
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
		<div class="wrapper row-offcanvas row-offcanvas-left">
           
            <aside class="left-side sidebar-offcanvas">
               
                <section class="sidebar">
              
                    <ul class="sidebar-menu">
                        <li >
                            <a href="#dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
						
						
                       <?php if($_SESSION['role']==1){ ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>User Module</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#user-list"><i class="fa fa-angle-double-right"></i> User List</a></li>
								<li><a href="#employer-list"><i class="fa fa-angle-double-right"></i> Employer List</a></li>
                            </ul>
                        </li>
						<?php } ?>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Product Module</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#category"><i class="fa fa-angle-double-right"></i> Category</a></li>
								<li><a href="#product"><i class="fa fa-angle-double-right"></i> Product</a></li>
								<li><a href="#rating"><i class="fa fa-angle-double-right"></i> Rate And Review</a></li>
                            </ul>
                        </li>
						
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Order Module</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#orders"><i class="fa fa-angle-double-right"></i> Orders</a></li>
                            </ul>
                        </li>
						
						
                    </ul>
                </section>
               
            </aside>
			
			 
            <aside ng-view="" id="ng-view" class="right-side">
               
                
            </aside>
			
			
        </div>
        <script src="../app/js/angular.min.js"></script>
        <script src="../app/js/angular-route.min.js"></script>
		<script src="../app/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
		<script src="../app/js/angular-file-upload-shim.js"></script> 

        <script src="../app/js/angular-file-upload.js"></script> 
        <script>
      var mainApp = angular.module("mainApp", ['ngRoute','ui.bootstrap','angularFileUpload']);
      
mainApp.factory("services", ['$http', function($http) {
		  var serviceBase = '../services/api.php?x='
			var obj = {};
			
			
			obj.productorders = function(ID){
				return $http.get(serviceBase + 'productorders&id=' + ID);
			}
			
            obj.getcategories = function(){
				return $http.get(serviceBase + 'categories');
			}
			
			obj.getreview = function(){
				return $http.get(serviceBase + 'getreview');
			}
			
			obj.changeStatus = function(id,status){
				return $http.get(serviceBase + 'changeStatus&id='+id+'&status='+status);
			}
			
			obj.updaterating = function(rate,proid){
				return $http.get(serviceBase + 'updaterating?id=' + rate +'&proid=' + proid);
			}
			/*
			obj.updatecart = function (id,qnt) {
				return $http.post(serviceBase + 'updatecart', {id:id, quantity:qnt}).then(function (status) {
					return status.data;
				});
			};
			*/
			obj.changepass = function (user) {
			return $http.post(serviceBase + 'changepass', user).then(function (results) {
				return results;
			});
			};
		
			obj.placeOrder = function (order) {
			return $http.post(serviceBase + 'placeOrder', order).then(function (results) {
				return results;
			});
			};
            
			return obj;   
		}]);


	  
      mainApp.config(['$routeProvider',
         function($routeProvider) {
            $routeProvider.
			   when('/', {
			      title: 'Dashboard',
                  templateUrl: 'home.php',
                  controller: 'DashController'
               }).
               when('/dashboard', {
			      title: 'Dashboard',
                  templateUrl: 'home.php',
                  controller: 'DashController'
               }).
			   when('/signout', {
			      title: 'signout',
                  templateUrl: 'home.php',
                  controller: 'DashController'
               }).
               when('/user-list', {
			      title: 'User List',
                  templateUrl: 'user.php',
                  controller: 'customersCrtl'
               }).
			   when('/user-form', {
			      title: 'User Form',
                  templateUrl: 'user-form.php',
                  controller: 'UserFormController'
               }).
			   when('/edit-user/:UserID', {
				title: 'Edit User Form',
				templateUrl: 'useredit-form.php',
				controller: 'editCtrl'
			   }).
			   when('/employer-list', {
			      title: 'Employer List',
                  templateUrl: 'employer.php',
                  controller: 'empCrtl'
               }).
			   when('/employer-form', {
			      title: 'Employer Form',
                  templateUrl: 'employer-form.php',
                  controller: 'EmpFormController'
               }).
			   when('/edit-employer/:UserID', {
				title: 'Edit Employer Form',
				templateUrl: 'employeredit-form.php',
				controller: 'EmpeditCtrl'
			   }).
			   when('/category', {
			      title: 'Category List',
                  templateUrl: 'category.php',
                  controller: 'CategoryController'
               }).
			   when('/product', {
			      title: 'Product List',
                  templateUrl: 'product.php',
                  controller: 'productController'
               }).
			   when('/product-form', {
			      title: 'Product Form',
                  templateUrl: 'product-form.php',
                  controller: 'productController'
               }).
			   when('/edit-product/:ProductID', {
					title: 'Edit Product Form',
					templateUrl: 'product-form.php',
					controller: 'productController'
			   }).
			   when('/orders', {
			      title: 'Orders Listing',
                  templateUrl: 'order.php',
                  controller: 'orderCrtl'
               }).
			   when('/billing/:OrderID', {
					title: 'Order Billing',
					templateUrl: 'billing.php',
					controller: 'orderCrtl'
			   }).
			   when('/changepass', {
			      title: 'Change Password',
                  templateUrl: 'changepassword.php',
                  controller: 'customersCrtl'
               }).
			   when('/rating', {
			      title: 'Rate & Review List',
                  templateUrl: 'rating.php',
                  controller: 'reviewCrtl'
               }).
               otherwise({
                  redirectTo: '/'
               });
         }]);

         mainApp.controller('DashController', function($scope) {
            $scope.message = "Welcome you are Login Successfully";
         });
		 
         mainApp.controller('UserController', function($scope) {
            $scope.message = "Here is user list";
         });
		 mainApp.controller('editCtrl', function ($scope, $http, $rootScope, $location, $routeParams) {
			var ID = $routeParams.UserID;
			$http.get('getuserdetail.php?name='+ID).success(function(data){
				$scope.form = data;
			});
			$scope.updateForm = function(form) {
				$http.post('submit.php', $scope.form).success(function(data){
				   
				   $scope.success = data.success;
				   $scope.error = data.error;
				   
				   $location.path("edit-user/"+$scope.form.user_id);
				});
             
			};
		});
		 mainApp.controller('UserFormController', function($scope, $http, $location, $route) {
			$scope.submitForm = function(form) {
				$http.post('submit.php', $scope.form).success(function(data){   
				   $scope.success = data.success;
				   $scope.error = data.error;
				   $location.path("user-form");
				});
             
			};
         });
		 
		  mainApp.controller('EmpeditCtrl', function ($scope, $http, $rootScope, $location, $routeParams) {
			var ID = $routeParams.UserID;
			$http.get('getuserdetail.php?name='+ID).success(function(data){
				$scope.form = data;
			});
			$scope.updateForm = function(form) {
				$http.post('empsubmit.php', $scope.form).success(function(data){
				   
				   $scope.success = data.success;
				   $scope.error = data.error;
				   
				   $location.path("edit-employer/"+$scope.form.user_id);
				});
             
			};
		});
		 mainApp.controller('EmpFormController', function($scope, $http, $location, $route) {
			$scope.submitForm = function(form) {
				$http.post('empsubmit.php', $scope.form).success(function(data){   
				   $scope.success = data.success;
				   $scope.error = data.error;
				   $location.path("employer-form");
				});
             
			};
         });
		
mainApp.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});
mainApp.controller('customersCrtl', function ($scope, $http, $location, $route, services, $timeout) {
    $http.get('getuser.php').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
	
	$scope.DeleteData = function(UID,Uname) {
	    if(confirm("Are you sure to delete user: "+Uname)==true)
        $http.get('deleteuser.php?name=' + UID ).success(function(data){
        $route.reload();
    });
    };
	
	$scope.changeForm = function(form) {
		services.changepass(form).then(function(data){	
			if(data.data.status=='Error'){
			   $scope.error = data.data.msg;
			}else if(data.data.status=='Success'){ 
			   $scope.success = data.data.msg;
			  
			}
		});    
	};
});

mainApp.controller('CategoryController', function ($scope, $http, $location, $route, services, $timeout) {
    
	var catlist = function(){
	services.getcategories().then(function(data){
		$scope.list = data.data;
		$scope.currentPage = 1; //current page
		$scope.entryLimit = 5; //max no of items to display in a page
		$scope.filteredItems = $scope.list.length; //Initially for no filter  
		$scope.totalItems = $scope.list.length;
	});
	
	};
	catlist();
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
	$scope.submitForm = function(form) {
		$http.post('submitcategory.php', $scope.form).success(function(data){	
		   $scope.succ = data.success;
		   $scope.err = data.error;
		   catlist();
		});
	 
	};
	
	$scope.EditCategory = function(ID) {
		$http.get('getuserdetail.php?category='+ID).success(function(data){
			$scope.form = data;
			catlist();
		});
	};
	
	$scope.DeleteCategory = function(UID,Uname) {
	    if(confirm("Are you sure to delete Category: "+Uname)==true)
        $http.get('deleteuser.php?category=' + UID ).success(function(data){
		$scope.succ = data.success;
		$scope.err = data.error;
        catlist();
    });
    };
});

mainApp.controller('productController', function ($scope, $http, $location, $upload, $rootScope,$routeParams,services, $route, $timeout) {
    
	var productlist = function(){
	$http.get('getproduct.php').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
	};
	productlist();
	
	var catlist = function(){
	$http.get('getcategory.php').success(function(data){
        $scope.catoption = data;
    });
	};
	catlist();
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
	
	$scope.submitForm = function(form) {
		$http.post('saveproduct.php', $scope.form).success(function(data){	
		   
		   $scope.success = data.success;
		   $scope.error = data.error;
		});
	 
	};
	$scope.upsuccess = '';
	$scope.uperror = '';
	$scope.onFileSelect = function($files) {
    for (var i = 0; i < $files.length; i++) {
      var file = $files[i];
      $scope.upload = $upload.upload({
        url: 'upload.php', //upload.php script, node.js route, or servlet url
        data: {myObj: $scope.myModelObj},
        file: file,
      }).progress(function(evt) {
        console.log('percent: ' + parseInt(100.0 * evt.loaded / evt.total));
      }).success(function(data, status, headers, config) {
	     
		$scope.upsuccess =  $scope.upsuccess + ' , ' + data.success;
		//$scope.uperror =  $scope.uperror + data.error;
	    //$scope.uperror = data.error;
	    $scope.form.product_image.push(data.image);
      });
    }
  };
	
   /*
	var edit = function(){
	    var ID = $routeParams.ProductID;
		catlist();
		$http.get('getuserdetail.php?product='+ID).success(function(data){
			$scope.form = data;
			$scope.form.old_image = data.product_image;
			$scope.imgs = data.product_image.split(",");
		});
	};
	*/
	
	$scope.edit = function(){
	    var ID = $routeParams.ProductID;
		
		catlist();
		if(ID > 0){
		$http.get('getuserdetail.php?product='+ID).success(function(data){
			$scope.form = data;
			$scope.form.product_price = parseInt(data.product_price);
			$scope.form.product_quantity = parseInt(data.product_quantity);
			$scope.form.old_image = data.product_image;
			$scope.imgs = data.product_image.split(",");
		});
		}
	};
	
	//edit();
	
	$scope.DeleteProduct = function(UID,Uname) {
	    if(confirm("Are you sure to delete Product: "+Uname)==true)
        $http.get('deleteuser.php?product=' + UID ).success(function(data){
		$scope.succ = data.success;
		$scope.err = data.error;
        productlist();
    });
    };
	
	$scope.featured = function(id,status) {
		services.changeStatus(id,status).then(function(data){	
			$route.reload();
		});    
	};
	
});



mainApp.controller('empCrtl', function ($scope, $http, $location, $route, $timeout) {
    $http.get('getemployer.php').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
	
	$scope.DeleteEmp = function(UID,Uname) {
	    if(confirm("Are you sure to delete Employer: "+Uname)==true)
        $http.get('deleteuser.php?name=' + UID ).success(function(data){
        $route.reload();
    });
    };
});

mainApp.controller('orderCrtl', function ($scope, $http, $location, $route, $routeParams, services, $timeout) {
    $http.get('getorder.php').success(function(data){
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
	
	$scope.ChangeStatus = function(UID,Uname) {
        $http.get('deleteuser.php?id=' + UID + '&status=' + Uname ).success(function(data){
        $route.reload();
        });
    };
	
	$scope.getOrder = function() {
	    var ID = $routeParams.OrderID;
		$http.get('getuserdetail.php?order_id='+ID).success(function(data){
			$scope.order = data;
		});
    };
	
	$scope.productorders = function() { 
	    var ID = $routeParams.OrderID;
		var obj = {product:null};
		services.productorders(ID).then(function(data){
			obj.product = data.data;
		}); 
		return obj;
	};
});

mainApp.controller('reviewCrtl', function ($scope, $http, $location, $route, $routeParams, services, $timeout) {
    services.getreview().then(function(data){
			$scope.list = data.data;
			$scope.currentPage = 1; //current page
			$scope.entryLimit = 5; //max no of items to display in a page
			$scope.filteredItems = $scope.list.length; //Initially for no filter  
			$scope.totalItems = $scope.list.length;
		});

    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
	
	$scope.ChangeStatus = function(UID,Uname) {
        $http.get('deleteuser.php?id=' + UID + '&status=' + Uname ).success(function(data){
        $route.reload();
        });
    };
	
	$scope.getOrder = function() {
	    var ID = $routeParams.OrderID;
		$http.get('getuserdetail.php?order_id='+ID).success(function(data){
			$scope.order = data;
		});
    };
	
	$scope.productorders = function() { 
	    var ID = $routeParams.OrderID;
		var obj = {product:null};
		services.productorders(ID).then(function(data){
			obj.product = data.data;
		}); 
		return obj;
	};
});

mainApp.run(['$location', '$rootScope', function($location, $rootScope) {
    $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
        $rootScope.title = current.$$route.title;
    });
}]);

   </script>
        <script src="../admin_design/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../admin_design/js/bootstrap.min.js" type="text/javascript"></script>
		
        
        <script src="../admin_design/js/admin/app.js" type="text/javascript"></script>

    </body>
</html>