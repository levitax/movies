'use strict';

angular.module('MoviesAndActorsApp', [])
    .controller('MenuController', ['$scope','$http', function($scope,$http) {
		
		 $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
		 
        $scope.tab = 1;
        $scope.filtText = '';
        $scope.showDetails = false;


        $scope.isSelected = function (checkTab) {
            return ($scope.tab === checkTab);
        };

		
		$scope.select = function (sel) {
		
            if(sel == 1){
				$('#div1').show();
				$('#div2').hide();
			}
           if(sel == 2){
				$('#div1').hide();
				$('#div2').show();
				searchPopularMovies();
			}			
        };
		
			
		//
		$scope.searchMovie = function() {
            
				$scope.url = './server/scripts/movies.php';
				
				var dataObj = {
				idPerson : $scope.actors.id
				};

				$http.post($scope.url,dataObj).success(function(data) {
						   $scope.movies = data;
                        });
			
        };
		
		$scope.searchActors = function() {
            
				$scope.url = './server/scripts/actors.php';
						
				var dataObj = {
				name : $('#name-actor').val()
				};
				
				$http.post($scope.url,dataObj).success(function(data) {
						   $scope.allActors = data;
							$scope.actors =  $scope.allActors[0];	
                        });
			
        };
		
		function searchPopularMovies() {
            
				$scope.url = './server/scripts/popular.php';
				
				$http.post($scope.url).success(function(data) {
						   $scope.popularMovies = data;
                        });
			
        };
		
				$scope.columns = [
                    {text:"Poster",predicate:"poster",sortable:true,dataType:"number"},
                    {text:"ID",predicate:"id",sortable:true},
                    {text:"Tittle",predicate:"tittle",sortable:true},
                    {text:"Language",predicate:"language",sortable:true},
                    {text:"Release date",predicate:"release_date",reverse:true,sortable:true,dataType:"number"}
                ];
			
					
    }]).directive('chosen', function() {
  var linker = function(scope, element, attr) {
        
        scope.$watch(attr.chosen, function(oldVal, newVal) {
            element.trigger('chosen:updated');
        });

        
        scope.$watch(attr.ngModel, function() {
            element.trigger('chosen:updated');
        });
        
        element.chosen();
    };

    return {
        restrict: 'A',
        link: linker
    };
});