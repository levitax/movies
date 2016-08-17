<!DOCTYPE html>
<html lang="en" ng-app="MoviesAndActorsApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Movies and actors app</title>
    <!-- Bootstrap -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
    <link href="bower_components/bootstrap/dist/css/mystyles.css" rel="stylesheet">
	<link href="bower_components/bootstrap/dist/css/chosen.css" rel="stylesheet">
  	<link href="bower_components/bootstrap/dist/css/chosen-spinner.css" rel="stylesheet">
	
		<!-- Jquery -->
	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Chosen -->
	<script src="bower_components/jquery/dist/chosen.jquery.min.js"></script>	
	<script src="bower_components/jquery/dist/chosen.jquery.js"></script>
    <!-- AngularJS -->
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/app/app.js"></script>
	
	  <style>
    select.localytics-chosen {
      display: block !important;
      position:absolute;
      clip:rect(0,0,0,0);
      height: 29px;
    }
    .border-red {
      border: 1px solid red;
    }
  </style>
</head>
<body>
    <div class="container">
        <div class="row row-content" ng-controller="MenuController"  ng-keydown="keydownevt()" ng-keyup="keyupevt()" ng-keypress="keypressevt()">
			   <h2 class="blog-post-title" align="center">Movies, movies, everywhere</h2>
				<hr/>
            <div class="col-xs-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li ng-class="{active:isSelected(1)}" role="presentation">
                        <a ng-click="select(1)" role="tab">Search movies by actor</a>
                    </li>
                    <li ng-class="{active:isSelected(2)}" role="presentation">
                        <a ng-click="select(2)"  role="tab">Search movies</a>
                    </li>
                  
                </ul>
                <div class="tab-content">	
				<div id="div1"">				
				<form class="form-horizontal">
                    <div class="form-group" >
                        <label for="firstname" class="col-sm-2 control-label">Search Actor</label>
                        <div class="col-sm-4">
						<input placeholder="Type an actor's name" id="name-actor" class="nav-search-input" type="text" style="width:340px;" focus>
                        </div>
                      <div class="col-sm-4">
                            <button type="button" ng-click="searchActors()"  class="btn btn-primary" >Search actor</button>
                        </div>						
                    </div>					
                    <div class="form-group" >
                        <label for="firstname" class="col-sm-2 control-label">Actor's list</label>
                        <div class="col-sm-4">
						<select data-placeholder="Choose an actor" ng-model="actors" id="actor-chosen" class="form-control" chosen="" ng-options="n.name for n in allActors" >
						</select>  	
                        </div>
                      <div class="col-sm-4">
                            <button type="button" ng-click="searchMovie()"  class="btn btn-primary" >Show movies</button>
                        </div>						
                    </div>					
					</form>
					<div class="table-responsive">
					<div class="panel panel-primary">
					  <div class="panel-heading">List of movies
						  <div class="sw-search" >
								<div class="nav-search" id="nav-search">
										<span class="input-icon">
										</span>
								</div>
							</div>
						</div>
					  <div class="panel-body">
						<table class="table table-striped">
					
						
						<tr><th ng-repeat="c in columns">{{c.text}}</th></tr>

						<tr ng-repeat="m in movies | orderBy:'-release_date':true">
							<td><img src="http://image.tmdb.org/t/p/w45{{m.poster_path}}"></td><td>{{m.id}}</td><td>{{m.title}}</td><td>{{m.original_language}}</td><td>{{m.release_date}}</td>
							
						
						</tr>
						</table>
					</div>
					</div>
					</div>
				</div>
				
				<div id="div2" style="display: none;">
				<div class="table-responsive">
					<div class="panel panel-primary">
					  <div class="panel-heading">List of popular movies
						  <div class="sw-search" >
								<div class="nav-search" id="nav-search">
										<span class="input-icon">
										</span>
								</div>
							</div>
						</div>
					  <div class="panel-body">
						<table class="table table-striped">
					
						
						<tr><th ng-repeat="c in columns">{{c.text}}</th></tr>

						<tr ng-repeat="m in popularMovies | orderBy:'-release_date':true">
							<td><img src="http://image.tmdb.org/t/p/w45{{m.poster_path}}"></td><td>{{m.id}}</td><td>{{m.title}}</td><td>{{m.original_language}}</td><td>{{m.release_date}}</td>
							
						
						</tr>
						</table>
					</div>
					</div>
					</div>
				</div>
                </div>
            </div>
        </div>
    </div>
	
</body>
</html>