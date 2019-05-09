var app = angular.module('app', ['smart-table', 'ngResource', 'ngRoute'], [
    '$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
]);
