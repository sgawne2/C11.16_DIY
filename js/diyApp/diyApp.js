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
    .controller('checkBoxController', checkBoxController);

function checkBoxController ($scope) {
}
