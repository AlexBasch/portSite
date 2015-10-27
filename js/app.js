(function (){
	var app = angular.module("Portfolio",[]);
	
	app.controller("PortfolioController",['$http', function($http){
		var storage = this;
					
		$http.get('http://alexanderbasch.herokuapp.com/portfolio.php/projects').success(function(data){
			storage.info = data;
		});
	}]);	
})();