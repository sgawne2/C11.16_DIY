function addStepController(){
    var ctrl = this;
    ctrl.steps = [{}];

    ctrl.add = function(){
        ctrl.steps.push({});

        ctrl.scrollToStep();
    };

    ctrl.delete = function(step){
        var index = ctrl.steps.indexOf(step);

        if (ctrl.steps.length > 1) {
            ctrl.steps.splice(index, 1);
        }else{
            ctrl.steps[index] = {};
        }
    };

    ctrl.insert = function(step){
        var index = ctrl.steps.indexOf(step);
        var end = ctrl.steps.splice(index, ctrl.steps.length);

        ctrl.steps.push({});
        ctrl.steps = ctrl.steps.concat(end);
    };
}

angular.module('diyApp').component('addSteps', {
    templateUrl: './js/components/addStep/addStep.component.html',
    controller: addStepController,
    transclude: true
});