<section class="content-header">
	<h1>{{ title }}<small>Preview</small>                    </h1>
	<ol class="breadcrumb">
		<li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#rating"> Review List</a></li>
		<li class="active"> Review</li>
	</ol>
</section>
<section class="content">
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
        <div class="col-md-3">Filter:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        </div>
        <div class="col-md-4">
            <h4>Filtered {{ filtered.length }} of {{ totalItems}} total Result</h5>
        </div>
		<div class="col-md-3"> 
		 
		</div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
            <thead>
            <th>Product Title&nbsp;<a ng-click="sort_by('product_title');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>User Name&nbsp;<a ng-click="sort_by('user_name');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Review&nbsp;<a ng-click="sort_by('review');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Rating&nbsp;<a ng-click="sort_by('rating');"><i class="glyphicon glyphicon-sort"></i></a></th>
			
			<!--<th>Action</th>-->
			</thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td>{{data.product_title}}</td>
                    <td>{{data.user_name}}</td>
                    <td>{{data.review}}</td>
                    <td>{{data.rating}}</td>
					<!--
                   <td><button ng-click="DeleteProduct(data.product_id,data.product_title)" class="btn btn-warning">Delete</button>
					<a href="#/edit-product/{{data.product_id}}" class="btn btn-success">Edit</a>
					
					</td>-->
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No Product Found</h4>
            </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems > 0">  

            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
            
            
        </div>
    </div>
</section>