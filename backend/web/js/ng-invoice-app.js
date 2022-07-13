angular.module("republic-invoice", ["republic"])
.value('customerId', '')
.value('invoiceId', '')
.value('csrfToken', '')
.value('baseUrl', '')
.config(["$httpProvider", function ($httpProvider) {
	$httpProvider.interceptors.push('httpInterceptor');
}])
.service('httpInterceptor', ["baseUrl", function (baseUrl) {
	return {
		request : function (config) {
			if (config.url.substr(0, 4) != 'http') {
				config.url = [baseUrl, config.url].join('/');
			}
			return config;
		}
	}
}])
.directive("rpDate", [function () {
	return {
		require  : 'ngModel',
		restrict : "A",
		link     : link
	}

	function link(scope, element, attrs, ctrl) {
		element.datepicker({
			format: "yyyy-mm-dd",
			todayHighlight: true,
		});
		element.on("dp.change", dpUpdate(scope, ctrl));
	}

	function dpUpdate(scope, ctrl) {
		return function (e) {
			ctrl.$setViewValue(e.date.format("YYYY-MM-DD"));
		}
	}
}])
.controller("MainCtrl", ["$rootScope", "$scope", "$http", "csrfToken", "customerId", function ($rootScope, $scope, $http, csrfToken, customerId) {
	var $ctrl = this;

	$scope.model = {};
	$scope.invoiceItems = [];

	$scope.model.item_per_page = 10;

	$scope.submitForm    = submitForm;
	$scope.deleteItem    = deleteItem;
	$scope.duplicateItem = duplicateItem;

	$ctrl.$onInit = init;

	function deleteItem(item) {
		if (confirm("Are you sure you want to delete?")) {
			_.pull($scope.invoiceItems, item);
		}
	}

	function duplicateItem() {
		var first = _.first($scope.invoiceItems);
		var data  = {};
		angular.copy(first);
		$scope.invoiceItems.push(data);
	}

	function init() {
		duplicateItem();
	}

	function submitForm(form, redirect) {
		form.$setSubmitted();

		if (form.$valid) {
			// submitAll().catch(stdErrHandler);
			return submitAll().then(redirectToList).catch(stdErrHandler);
		}

		function submitAll() {
			return $http.post('customer/generate-invoice', {
				"Info"          : $scope.model,
				"Detail"        : $scope.invoiceItems,
				"customer_id"   : customerId,
				"redirect"      : redirect,
				"_csrf-backend" : csrfToken,
			})
			.then(function (resp) {
				var data  = resp.data;
				if (data.error.status == 1) {
					throw new Error("Error 1-1, kindly contact admin.");
				}
				return data;
			});
		}

		function redirectToList(data) {
			if (data.redirect == 'customer') {
				window.location.href = '../customer/list?created=true';
			} else {
				window.location.href = '../invoice/list?created=true';
			}
		}
	}
}])
.controller("InvoiceItemCtrl", ["$scope", function ($scope) {
	$scope.model = {};

	$scope.init = init;

	function init(item) {
		$scope.model = item;
	}
}])
.controller("ViewInvoiceCtrl", ["$rootScope", "$scope", "$http", function ($rootScope, $scope, $http) {
	var elm = $("#viewInvoiceModal");

	$scope.invoiceInfo     = [];
	$scope.invoiceItemInfo = [];

	$scope.fetchInfo    = fetchInfo;
	$scope.grandTotal   = grandTotal;

	function fetchInfo(id) {
		$http.get('invoice/view', {
			params: {
				id: id
			}
		})
		.then(function (resp) {
			var data = resp.data;
			console.log(data);
			if (data.error.status == 1) {
				throw new Error("Error 1-1, kindly contact admin.");
			} else {
				$scope.invoiceInfo     = data.invoiceInfo;
				$scope.invoiceItemInfo = data.invoiceItemInfo;
			}
		})
		.catch(stdErrHandler);
		elm.modal("show");
	}

	function grandTotal() {
		var total = 0;
		for(var i = 0; i < $scope.invoiceItemInfo.length; i++){
			var item = $scope.invoiceItemInfo[i];
			total += item.price;
		}
		return total;
	}
}])
.controller("EditInvoiceCtrl", ["$scope", "$http", "csrfToken", "invoiceId", function ($scope, $http, csrfToken, invoiceId) {
	var $ctrl = this;

	$scope.invoiceItems = [];

	$scope.submitItems   = submitItems;
	$scope.deleteItem    = deleteItem;
	$scope.duplicateItem = duplicateItem;

	$ctrl.$onInit = init;

	function deleteItem(item) {
		if (confirm("Are you sure you want to delete?")) {
			_.pull($scope.invoiceItems, item);
		}
	}

	function duplicateItem() {
		var first = _.first($scope.invoiceItems);
		var data  = {};
		angular.copy(first);
		$scope.invoiceItems.push(data);
	}

	function init() {
		duplicateItem();
	}

	function submitItems(form) {
		form.$setSubmitted();

		if (form.$valid) {
			// submitAll().catch(stdErrHandler);
			return submitAll().then(redirectToList).catch(stdErrHandler);
		}

		function submitAll() {
			return $http.post('invoice/add-item', {
				"Detail"        : $scope.invoiceItems,
				"invoice_id"    : invoiceId,
				"_csrf-backend" : csrfToken,
			})
			.then(function (resp) {
				var data  = resp.data;
				console.log(data);
				if (data.error.status == 1) {
					throw new Error("Error 1-1, kindly contact admin.");
				}
				return data;
			});
		}

		function redirectToList(data) {
			window.location.href = '../invoice/edit?id='+invoiceId+'&created=true';
		}
	}
}]);

function stdErrHandler(err) {
	console.error(err);
	if (err instanceof Error) {
		alert(err.message);
	} else {
		alert("Something went wrong");
	}
}


