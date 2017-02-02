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
    };

    ctrl.insert = function(step){
        var index = ctrl.steps.indexOf(step);
        var end = ctrl.steps.splice(index, ctrl.steps.length);

        ctrl.steps.push({});
        ctrl.steps = ctrl.steps.concat(end);
    };

    // $('.inputPhoto').on('change', function(e) {
    //     var files = e.target.files;
    //     if (files[0]) {
    //         var fileName = files[0].name;
    //     } else {
    //         fileName = null;
    //     }
    //
    //     ctrl.loadedPhoto = fileName;
    //     console.log(ctrl.loadedPhoto);
    //
    //     $scope.$apply();
    //
    // });
}

angular.module('diyApp').component('addSteps', {
    templateUrl: './js/components/addStep/addStep.component.html',
    controller: addStepController,
    transclude: true
});