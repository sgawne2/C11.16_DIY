function toolSelectorController(){
    var ctrl = this;

    ctrl.fruitNames = ['Apple', 'Banana', 'Orange'];
    ctrl.roFruitNames = angular.copy(self.fruitNames);
    ctrl.editableFruitNames = angular.copy(self.fruitNames);



}

angular.module('diyApp').component('toolSelector', {
    templateUrl: './js/components/toolSelector/toolSelector.component.html',
    controller: toolSelectorController,
    transclude: true
});