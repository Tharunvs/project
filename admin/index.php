<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Eshop Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../admin_design/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../admin_design/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../admin_design/css/admin.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
             <form action="" method="post">
                <div class="body bg-gray">
				   <?php 
				        include('../include/config.php');
                        if(isset($_POST['submit'])){
						$query="select * from tbl_user where user_name='".$_POST['username']."' and user_password='".md5($_POST['password'])."'";
						$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

						
						if($result->num_rows > 0) {
							$row = $result->fetch_array();
							$_SESSION["userid"] = $row['user_id'];
                            $_SESSION["username"] = $row['user_name'];
							$_SESSION["role"] = $row['user_role'];
							header('Location: dashboard.php');
						}else{ ?>
						    <div class="alert alert-danger alert-dismissable">
						<i class="fa fa-ban"></i>
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<b>Alert!</b>
					</div> <?php 
						}
				        }
				   ?>
					
                                  
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="User ID" required="required"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"  id="password" class="form-control" placeholder="Password" required="required"/>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" name="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    
                </div>
            </form>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../admin_design/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>