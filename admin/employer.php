<section class="content-header">
	<h1>{{ title }}<small>Preview</small>                    </h1>
	<ol class="breadcrumb">
		<li><a href="#dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#employer-list"> Employer List</a></li>
		<li class="active"> User</li>
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
            <h4>Filtered {{ filtered.length }} of {{ totalItems}} total User</h5>
        </div>
		<div class="col-md-3"> 
		 <a href="#employer-form" class="btn btn-primary pull-right"> Add New Employer</a>
		 
		</div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
            <thead>
            <th>User Name&nbsp;<a ng-click="sort_by('user_name');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Address&nbsp;<a ng-click="sort_by('user_address');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Phone&nbsp;<a ng-click="sort_by('user_phone');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Email&nbsp;<a ng-click="sort_by('user_email');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Action</th>
			</thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td>{{data.user_name}}</td>
                    <td>{{data.user_address}}</td>
                    <td>{{data.user_phone}}</td>
                    <td>{{data.user_email}}</td>

					<td><button ng-click="DeleteEmp(data.user_id,data.user_name)" class="btn btn-warning">Delete</button>
					<a href="#/edit-employer/{{data.user_id}}" class="btn btn-success">Edit</a>
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