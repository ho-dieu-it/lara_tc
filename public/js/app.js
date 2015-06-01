/**
 * 27-05-2015
 */
var app=angular.module('laraApp',['ui.bootstrap','dialogs'],function($interpolateProvider){
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
app.controller('categoryController',function($scope,$http,$dialogs){
	$scope.categories=[];
	$scope.loading=false;
	$scope.cateId=0;
	$scope.getCategories=function(){
		$scope.loading=true;
		$http.get('category/list').
		success(function(data,status,headers,config){
			$scope.categories=data;
			$scope.loading=false;
		});
	};
	$scope.deleteCategory=function(){
		index=$scope.index;
		$scope.loading=true;
		var category=$scope.categories[index];
		$http.get('category/delete/'+category.id).
		success(function(data,status,headers,config){
			console.log(data);
			$scope.categories.splice(index,1);
			$scope.loading=false;
		});
		$('#myModal').modal('hide');
	};
	
	$scope.confirm=function(index){
		$('#myModal').modal('show');
		$scope.index=index;
	};
	
	$scope.launch=function(which){
		var dialog=null;
		switch(which){
			case 'delete':
				dialog = $dialogs.confirm('Please Confirm','Is this awesome or what?');
				dialog.result.then(function(btn){
		          $scope.confirmed = 'You thought this quite awesome!';
		        },function(btn){
		          $scope.confirmed = 'Shame on you for not thinking this is awesome!';
		        });
			break;
		}
	};
	$scope.getCategories();
});

