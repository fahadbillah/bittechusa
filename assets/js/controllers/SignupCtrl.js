angular.module('FLYERBD')
.controller('SignupCtrl', ['$rootScope','$scope','$http','$cookies','UserService','Toaster','$location', function ($rootScope,$scope,$http,$cookies,UserService,Toaster,$location) {
	$rootScope.toaster = Toaster;

	$scope.registration = {
		user_name: '',
		user_email: '',
		user_phone: '',
		user_password: '',
	};

	$scope.registrationSubmit = function(registrationData) {
		console.log('form submitted!!!');

		console.log(registrationData);

		$http({
			method: 'post',
			data: $.param(registrationData),
			url: 'api/registration/create_user',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		})
		.success(function(data) {
			console.log(data);

			if (data.success === true) {
				$scope.registration = {
					user_name: '',
					user_email: '',
					user_phone: '',
					user_password: '',
				};

				$scope.registrationForm.$setPristine();
			}
			
			$rootScope.toaster.setAlert({
				type: data.success ? 'success' : 'error',
				title: data.message.title,
				description: data.message.description
			});
		})
		.error(function(data) {
			console.log(data);

			$rootScope.toaster.setAlert({
				type: 'error',
				title: 'Registration Failed!',
				description: 'Try again later.'
			});
		});

	};
}]);