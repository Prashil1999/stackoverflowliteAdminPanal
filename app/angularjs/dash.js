var dashApp=angular.module('dashApp',[]);

dashApp.run(function($rootScope,$http){
	$rootScope.adminName='prashil';
	$http({
		method:'GET',
		url:'http://localhost/stackoverflowliteAdminPanal/index.php/welcome/get_session',
		
	}).then(function(response){
		console.log(response);
		$rootScope.adminName=response.data;
		
	});

});

dashApp.controller('dashController',['$scope','$http',function($scope,$http){
	$scope.user=10;
	$scope.question=0;
	$scope.answer=2;
	$scope.report=0;
	$http({
		method:'GET',
		url:'http://localhost/stackoverflowliteAdminPanal/index.php/welcome/getcount',
		
	}).then(function(response){
		$scope.user=response.data.user;
		$scope.question=response.data.question;
		$scope.answer=response.data.answer;
		$scope.report=response.data.report;

		
	});


}]);