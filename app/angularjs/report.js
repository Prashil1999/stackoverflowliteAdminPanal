var reportApp=angular.module('reportApp',[]);
reportApp.controller('reportController',['$scope','$http',function($scope,$http){
	
	$scope.isDisabled=[];
	$scope.cardcss=[];
	
	$scope.disablecard = function(reportid ,index){
		$scope.isDisabled[index]=true;
		$scope.cardcss[index]='cardviewclassdisabled';
	
		$http({
			method : 'POST',
			url    :'http://localhost/stackoverflowliteAdminPanal/index.php/welcome/ingnorereport', 
			data   :{reportId:reportid},
			dtatype:'JSON'

		});
	};


	$scope.blocked=function(report){
		$http({
			method : 'POST',
			url    :'http://localhost/stackoverflowliteAdminPanal/index.php/welcome/blockeddata', 
			data   :{report:report},
			dtatype:'JSON'

		}).then(function(){
			alert("success");
		});
	};



	$http({
		method : 'GET',
		url :'http://localhost/stackoverflowliteAdminPanal/index.php/welcome/getreports' 
	}).then(function(res){
		console.log(res.data);
		$scope.reports=res.data;	
		for(var i=0;i<res.data.length;i++){
			$scope.isDisabled[res.data[i]['index']]=false;
			if(res.data[i]['view']==true){
				$scope.cardcss[res.data[i]['index']]='cardviewclassdisabled';
			}else{
				$scope.cardcss[res.data[i]['index']]='cardviewclass';
			}
		}
	});



}]);
reportApp.directive('cardview',function(){
	return{
		templateUrl:'http://localhost/stackoverflowliteAdminPanal/app/views/reportcardview.html'
	}
});