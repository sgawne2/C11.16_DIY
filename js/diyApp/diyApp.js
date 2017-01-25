angular.module('diyApp', ['ngMaterial'])
    .controller('AppCtrl', function ($scope, $timeout, $mdSidenav) {
        $scope.toggleLeft = buildToggler('left');
        $scope.toggleRight = buildToggler('right');

        function buildToggler(componentId) {
            return function() {
                $mdSidenav(componentId).toggle();
            }
        }
    })
    .controller('checkBoxController', checkBoxController)
    .controller('GridCtrl', ['$scope', function ($scope) {
        $scope.grid = [[1,2,3],[4,5,6],[7,8,9]];
    }]);

function checkBoxController ($scope) {
}
