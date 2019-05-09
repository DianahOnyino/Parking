var app = angular.module('app', ['smart-table', 'ngResource', 'ngRoute'], [
    '$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
]);

app.factory('TableState', ['$http', function ($http) {

    var state = {};

    state.getPage = function (tableState, url) {
        return $http({
            url: url,
            method: 'GET',
            params: {tableState: tableState},
            paramSerializer: '$httpParamSerializerJQLike'
        });
    };

    return state;
}]);

app.factory('FilteredTableState', ['$http', function ($http) {
    var state = {};

    state.getPage = function (tableState, filters, url) {
        return $http({
            url: url,
            method: 'GET',
            params: {tableState: tableState, filter: filters},
            paramSerializer: '$httpParamSerializerJQLike'
        });
    };

    return state;
}]);

app.factory('ParkingRecords', ['$http', 'FilteredTableState', function ($http, FilteredTableState) {
    var parkingRecords = {};

    parkingRecords.getPage = function (tableState, filterData) {
        return FilteredTableState.getPage(tableState, filterData, '/api/all-available-parking-spots');
    };

    return parkingRecords;
}]);

app.controller('MainController', ['$http', '$scope', '$window', 'ParkingRecords', function ($http, $scope, $window, ParkingRecords) {
    $scope.parking_records = [];

    $scope.itemsByPage = 20;

    $scope.callServer = function callServer(tableState) {
        $scope.tableState = tableState;
        $scope.isLoading = false;
        var pagination = tableState.pagination;
        var start = pagination.start || 0;
        var number = pagination.number || 20;
        $scope.filterData = {};

        $scope.getParkingRecords(tableState, $scope.filterData);
    };

    $scope.getParkingRecords = function (status, filterData) {
        ParkingRecords.getPage($scope.tableState, filterData).then(function (result) {
            tableState = $scope.tableState;
            $scope.parking_records = result.data;
            $scope.meta = result.data.meta;
            tableState.pagination.numberOfPages = result.data.meta.pagination.total_pages;
            $scope.perPage = tableState.pagination.number;
            $scope.isLoading = false;
        });
    };

}]);
