var onloadCallback = function () {
	widgetId1 = grecaptcha.render('example1', {
		'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
		'theme': 'light'
	});
};

var app = angular.module('app',[]);

var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('CategoryCRUDCtrl', ['$scope', 'CategoryCRUDService', function ($scope, CategoryCRUDService) {
	  
    $scope.updateCategory = function () {
        CategoryCRUDService.updateCategory($scope.categorie.id, $scope.categorie.category)
          .then(function success(response){
              $scope.message = 'Category data updated!';
              $scope.errorMessage = '';
			  $scope.getAllCategories();
          },
				function error(response){
					$scope.errorMessage = 'Error updating Category!';
					$scope.message = '';
          });
    }
    
    $scope.getCategory = function (id) {
//		var id = $scope.category.id;
        CategoryCRUDService.getCategory(id)
          .then(function success(response){
              $scope.categorie = response.data.categorie;
              $scope.categorie.id = id;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response){
              $scope.message = '';
              if (response.status === 404){
                  $scope.errorMessage = 'Category not found!';
              }
              else {
                  $scope.errorMessage = "Error getting Category!";
              }
          });
    }
    
    $scope.addCategory = function () {
        if ($scope.categorie != null && $scope.categorie.category) {
            CategoryCRUDService.addCategory($scope.categorie.category)
              .then (function success(response){
                  $scope.message = 'Category added!';
                  $scope.errorMessage = '';
				  $scope.getAllCategories();
              },
              function error(response){
                  $scope.errorMessage = 'Error adding Category!';
                  $scope.message = '';
            });
        }
        else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
    }
    
    $scope.deleteCategory = function () {
        CategoryCRUDService.deleteCategory($scope.categorie.id)
          .then (function success(response){
              $scope.message = 'Category deleted!';
              $scope.categorie = null;
              $scope.errorMessage='';
			  $scope.getAllCategories();
          },
          function error(response){
              $scope.errorMessage = 'Error deleting Category!';
              $scope.message='';
          })
    }
	
	$scope.login = function () {
		if (grecaptcha.getResponse(widgetId1) == '') {
			$scope.captcha_status = 'Please verify captcha.';
			return;
		}
		
		if ($scope.user != null && $scope.user.username) {
			CategoryCRUDService.login($scope.user)
				.then(function success(response) {
					$scope.message = $scope.user.username + ' en session';
					$scope.errorMessage = '';
					localStorage.setItem('token', response.data.data.token);
					localStorage.setItem('user_id', response.data.data.id);
				},
					function error(response) {
						$scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide';
						$scope.message = '';
					});
		} else {
			$scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
			$scope.message = '';
		}
	}
	
	$scope.logout = function() {
		localStorage.setItem('token', "no token");
		localStorage.setItem('user', "no user");
		$scope.message = '';
		$scope.errorMessage = 'Utilisateur déconnecté';
	}
	
	$scope.changePassword = function() {
		CategoryCRUDService.changePassword($scope.user.password)
			.then(function success(response) {
				$scope.message = 'Mot de passe mis à jour';
				$scope.errorMessage = '';
			},
				function error(response) {
					$scope.errorMessage = 'Mot de passe inchangé';
					$scope.message = '';
				});
	}
    
    $scope.getAllCategories = function () {
        CategoryCRUDService.getAllCategories()
          .then(function success(response){
              $scope.categories = response.data.categories;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response ){
              $scope.message='';
              $scope.errorMessage = 'Error getting Categories!';
          });
    }

}]);

app.service('CategoryCRUDService',['$http', function ($http) {
	
    this.getCategory = function getCategory(CategoryId){
        return $http({
          method: 'GET',
          url: urlToRestApi + '/' + CategoryId,
		  headers: { 'X-Requested-With' : 'XMLHttpRequest',
            'Accept' : 'application/json'}
        });
	}
	
    this.addCategory = function addCategory(category){
        return $http({
          method: 'POST',
          url: urlToRestApi,
          data: {category: category},
		  headers: { 'X-Requested-With' : 'XMLHttpRequest',
            'Accept' : 'application/json',
			'Authorization': 'Bearer ' + localStorage.getItem("token")}
        });
    }
	
    this.deleteCategory = function deleteCategory(id){
        return $http({
          method: 'DELETE',
          url: urlToRestApi + '/' + id,
		  headers: { 'X-Requested-With' : 'XMLHttpRequest',
            'Accept' : 'application/json'}
        });
    }
	
    this.updateCategory = function updateCategory(id, categorie){
        return $http({
          method: 'PATCH',
          url: urlToRestApi + '/' + id,
          data: {category: categorie},
		  headers: { 'X-Requested-With' : 'XMLHttpRequest',
            'Accept' : 'application/json',
			'Authorization': 'Bearer ' + localStorage.getItem("token")}
        });
    }
	
    this.getAllCategories = function getAllCategories(){
        return $http({
          method: 'GET',
          url: urlToRestApi,
		  headers: { 'X-Requested-With' : 'XMLHttpRequest',
            'Accept' : 'application/json'}
        });
    }
	
	this.login = function login(user) {
		return $http({
			method: 'POST',
			url: urlToRestApiUsers + '/token',
			data: {username: user.username, password: user.password},
			headers: {'X-Requested-With': 'XMLHttpRequest',
				'Accept': 'application/json'}
		});
	}
	
	this.changePassword = function changePassword(password) {
		return $http({
			method: 'PATCH',
			url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
			data: {password: password},
			headers: {'X-Requested-With': 'XMLHttpRequest',
				'Accept': 'application/json',
				'Authorization': 'Bearer ' + localStorage.getItem("token")
			}
		})
	
	}

}]);