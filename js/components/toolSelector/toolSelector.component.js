function toolSelectorController(){
    var ctrl = this;

    ctrl.tools = [{number: 0}];

    ctrl.decrement = function(index){
        if (ctrl.tools[index].number > 0){
            ctrl.tools[index].number--;
        }
    };

    ctrl.increment = function(index){
        if (ctrl.tools[index].number >= 0){
            ctrl.tools[index].number++;
        }
    };

    ctrl.add = function(){
        ctrl.tools.push({number: 0});
    };

    ctrl.delete = function(tool){
        var index = ctrl.tools.indexOf(tool);

        if (ctrl.tools.length > 1) {
            ctrl.tools.splice(index, 1);
        }else{
            ctrl.tools[index] = {number: 0};
        }
    };
}

angular.module('diyApp').component('toolSelector', {
    templateUrl: './js/components/toolSelector/toolSelector.component.html',
    controller: toolSelectorController,
    transclude: true
});