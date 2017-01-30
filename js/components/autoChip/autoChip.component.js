function chipController() {
    var ctrl = this;
    ctrl.readonly = false;
    ctrl.tags = [];
    ctrl.toolObjs = [];
    ctrl.newTool = function(chip) {
        alert(chip);
        return {
            name: chip,
            type: 'unknown'
        };
    };
}

angular.module('diyApp').component('autoChip', {
    templateUrl: './js/components/autoChip/autoChip.component.html',
    controller: chipController
});