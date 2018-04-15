(function(){
    'use strict';
    angular
        // .module('pulsarApp',[])
        .module('pulsarApp',['ui.router', 'ngSanitize', 'ui.bootstrap'])
        .config(Config)
        .controller('MainCtrl', MainCtrl)

        Config.$inject = ['$stateProvider', '$urlRouterProvider', '$locationProvider', '$controllerProvider', '$compileProvider', '$filterProvider', '$provide', '$interpolateProvider']
        function Config($stateProvider, $urlRouterProvider, $locationProvider, $controllerProvider, $compileProvider, $filterProvider, $provide, $interpolateProvider){
            console.log("App here!");
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
            
            $locationProvider.html5Mode(true);

            var main = {
                url: '/index',
                // controller: 'OperationCtrl as oc',
                templateUrl: 'main.view'
            };
            
            $stateProvider
            .state('main-view', main)
            .state('operation', {
                url: '/maintenance/operation',
                controller: 'OperationCtrl as oc',
                templateUrl: 'operation.view'
            })
            .state('operation-create', {
                url: '/maintenance/new',
                controller: 'OperationCtrl as oc',
                templateUrl: 'operation.create.view'
            })
            .state('list-operating', {
                url: '/maintenance/list-operating',
                controller: 'ListOperatingCtrl as loc',
                templateUrl: 'list.operating.view'
            })
            .state('list-monitoring', {
                url: '/maintenance/list-monitoring',
                controller: 'ListMonitoringCtrl as lmc',
                templateUrl: 'list.monitoring.view'
            })
            .state('asset-create', {
                url: '/asset/new',
                controller: 'AssetsAddCtrl as ac',
                templateUrl: 'asset.create.view'
            })
            .state('asset-list-equipments', {
                url: '/asset/list-equipments',
                controller: 'AssetsCtrl as ac',
                templateUrl: 'asset.list.equipments.view',
            })
            .state('asset-list-equipmentsCopy', {
                url: '/asset/list-equipments/:assetTag',
                controller: 'AssetsCtrl as ac',
                templateUrl: 'asset.list.equipments.view'
            })
            .state('asset-more-details', {
                url: '/asset/more-details/:assetTag',
                controller: 'AssetMoreDetailsCtrl as amdc',
                templateUrl: 'asset.more.details.view',
            })

            // .state('asset-list-equipments.asset', {
            //     url: '/:assetTag',
            //     controller: 'AssetsCtrl as ac',
            //     // templateUrl: 'asset.list.equipments.view'
            // })

            // .state('asset', {
            //     url: '/project/new/:assetTag',
            //     controller: 'AssetsCtrl as ac',
            //     // templateUrl: 'asset.list.equipments.view'
            // })
            //Projects//
            .state('project-create', {
                url: '/project/new',
                controller: 'ProjectsCtrl as pc',
                templateUrl: 'project.create.view'
            })
            .state('list-projects', {
                url: '/projects/list',
                controller: 'ProjectsCtrl as pc',
                templateUrl: 'project.list.projects.view'
            })
            .state('list-projectsCopy', {
                url: '/projects/list/:projectCode',
                controller: 'ProjectsCtrl as pc',
                templateUrl: 'project.list.projects.view'
            })
            //Projects//
            .state('jo-create', {
                url: '/job-order/new/:assetTag',
                controller: 'JobOrdersCtrl as joc',
                templateUrl: 'jo.create.view'
            })
            .state('list-jo', {
                url: '/job-order/list',
                controller: 'JobOrdersCtrl as joc',
                templateUrl: 'jo.list.view'
            })
            .state('list-jo.jo', {
                url: '/:joCode',
                controller: 'JobOrdersCtrl as joc'
            })
            .state('requesition-asset-create', {
                url: '/requisition-issue-slip/asset/new/:jobOrderCode',
                controller: 'RequisitionAssetCtrl as rac',
                templateUrl: 'ris.create.asset.view'
            })
            .state('requesition-project-create', {
                url: '/requisition-issue-slip/project/new/:projectCode',
                controller: 'RequisitionProjectCtrl as rpc',
                templateUrl: 'ris.create.project.view'
            })
            .state('list-requesition', {
                url: '/requisition/list',
                controller: 'RequisitionCtrl as rc',
                templateUrl: 'ris.list.view'
            })
            .state('list-employees', {
                url: '/employee/list',
                controller: 'EmployeesCtrl as ec',
                templateUrl: 'employee.list.view'
            })
            .state('receipt-create', {
                url: '/receipt/new',
                controller: 'ReceiptsCtrl as rc',
                templateUrl: 'receipt.create.view'
            })
            .state('list-receipt', {
                url: '/receipt/list',
                controller: 'ReceiptsCtrl as rc',
                templateUrl: 'receipt.list.view'
            })
            .state('list-receiptCopy', {
                url: '/receipt/list/:receiptCode',
                controller: 'ReceiptsCtrl as rc',
                templateUrl: 'receipt.list.view'
            })
            .state('supply-create', {
                url: '/supply/new',
                controller: 'SuppliesCtrl as sc',
                templateUrl: 'supply.create.view'
            })
            .state('list-supply', {
                url: '/supply/list',
                controller: 'SuppliesCtrl as sc',
                templateUrl: 'supply.list.view'
            })
            .state('list-supplyCopy', {
                url: '/supply/list/:supplyCode',
                controller: 'SuppliesCtrl as sc',
                templateUrl: 'supply.list.view'
            })
            .state('org-deparment-create', {
                url: '/organization/department/new',
                controller: 'OrganizationsCtrl as oc',
                templateUrl: 'organization.create.department.view'
            })
            .state('org-division-create', {
                url: '/organization/division/new',
                controller: 'DivisionsCtrl as dc',
                templateUrl: 'organization.create.division.view'
            })
            .state('org-unit-create', {
                url: '/organization/unit/new',
                controller: 'UnitsCtrl as uc',
                templateUrl: 'organization.create.unit.view'
            })
            .state('org-office-create', {
                url: '/organizations',
                controller: 'OfficesCtrl as oc',
                templateUrl: 'organization.create.office.view'
            })

            $urlRouterProvider.otherwise('/index');

        }

        MainCtrl.$inject = ['$window','$http'];
        function MainCtrl($window, $http) {
            var vm = this;
            vm.routeTo = function(route){
                $window.location.href = route;
            };
        };
})();