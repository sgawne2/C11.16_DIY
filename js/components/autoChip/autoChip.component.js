function DemoCtrl ($timeout, $q) {
    var ctrl = this;

    ctrl.readonly = false;
    ctrl.selectedItem = null;
    ctrl.searchText = null;
    ctrl.querySearch = ctrl.querySearchF();
    ctrl.vegetables = ctrl.loadVegetables();
    ctrl.selectedVegetables = [];
    ctrl.numberChips = [];
    ctrl.numberChips2 = [];
    ctrl.numberBuffer = '';

    /**
     * Search for vegetables.
     */
    ctrl.querySearchF = function(query) {
        var results = query ? ctrl.vegetables.filter(createFilterFor(query)) : [];
        return results;
    };

    /**
     * Create filter function for a query string
     */
    ctrl.createFilterFor = function(query) {
        var lowercaseQuery = angular.lowercase(query);

        return function filterFn(vegetable) {
            return (vegetable.toLowerCase().indexOf(lowercaseQuery) === 0);
        };

    };

    ctrl.loadVegetables = function() {
        var veggies = ['Broccoli','Cabbage','Carrot', 'Lettuce','Spinach'];
        return veggies;
    }
}

angular.module('diyApp').component('autoChip', {
    templateUrl: './js/components/autoChip/autoChip.component.html',
    controller: DemoCtrl
});

