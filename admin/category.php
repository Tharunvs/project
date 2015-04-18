<section class="content-header">
	<h1>Category                   </h1>
	<ol class="breadcrumb">
		<li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#category"> Category List</a></li>
		<li class="active"> Category</li>
	</ol>
</section>
<section class="content">
        <div class="row">
		<form role="form" method="post" enctype="multipart/form-data" name="myForm" ng-submit="submitForm(form)" novalidate> 
						
		<div class="col-md-6">
        <div class="form-group">
		   <label>Category</label>
		   
				<input type="text" class="form-control" name="category_title" ng-model="form.category_title" required>
			  <span style="color:red" ng-show="myForm.category_title.$dirty && myForm.category_title.$invalid">
			  <span ng-show="myForm.category_title.$error.required">Category is required.</span>
			  </span>
		 
		   </div>
		   <button type="submit" class="btn btn-primary" name="cat_button" value="" ng-disabled="myForm.$invalid">Submit</button>

		   </div>
		   <div class="col-md-6">
		    <div class="alert alert-danger alert-dismissable" ng-show="err.length > 0">
				<i class="fa fa-ban"></i>
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<b>Alert!</b>{{ err }}
			</div>
		   
			<div class="alert alert-success alert-dismissable" ng-show="succ.length > 0">
				<i class="fa fa-check"></i>
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<b>Alert!</b>{{ succ }}
			</div>
		   </div>
		
		</form>
    </div>
	<br />
    <div class="row">
        <div class="col-md-2">PageSize:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        
		
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
            <thead>
            <th>Category&nbsp;<a ng-click="sort_by('category_title');"></i></a></th>
            <th>Status&nbsp;<a ng-click="sort_by('status');"></i></a></th>
            <th>Action</th>
			</thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td>{{data.category_title}}</td>
                    <td>{{data.status}}</td>
                    

					<td><button ng-click="DeleteCategory(data.category_id,data.category_title)" class="btn btn-warning">Delete</button>
					<button ng-click="EditCategory(data.category_id)" class="btn btn-success">Edit</button>
					</td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No customers found</h4>
            </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems > 0">  

            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
            
            
        </div>
    </div>
</section>