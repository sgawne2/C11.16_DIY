function addStepController(){
    var ctrl = this;
    ctrl.steps = [{}];

    ctrl.add = function(){
        ctrl.steps.push({});
    };

    ctrl.delete = function(step){
        var index = ctrl.steps.indexOf(step);

        if (ctrl.steps.length > 1) {
            ctrl.steps.splice(index, 1);
        }else{
            ctrl.steps[index] = {};
        }

    }
}

angular.module('diyApp').component('addSteps', {
    templateUrl: './js/components/addStep/addStep.component.html',
    controller: addStepController,
    transclude: true
});