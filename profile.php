<div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info" ng-init="userdetail()">
            <div class="panel-heading">
              <h3 class="panel-title">{{ form.user_name }} Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                
       
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>{{ form.user_name }}</td>
                      </tr>
					  
					  <tr>
                        <td>Email</td>
                        <td><a href="mailto:{{ form.user_email }}">{{ form.user_email }}</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>{{ form.user_phone }}
                        </td>
                           
                      </tr>
                      
                      <tr>
                        <td>User Address</td>
                        <td>{{ form.user_address }}</td>
                      </tr>
					  
					  <tr>
                        <td>User City</td>
                        <td>{{ form.user_city }}</td>
                      </tr>
					  
					  <tr>
                        <td>User State</td>
                        <td>{{ form.user_state }}</td>
                      </tr>
					  
					  <tr>
                        <td>User Zipcode</td>
                        <td>{{ form.user_zipcode }}</td>
                      </tr>
                   
                        
                        
                      
                     
                    </tbody>
                  </table>
                
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        
                        <span class="pull-right">
                            <a href="#editprofile" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>