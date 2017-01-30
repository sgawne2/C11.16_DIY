function chipController() {
    var ctrl = this;
    ctrl.readonly = false;
    ctrl.toolObjs = [];
    ctrl.newTool = function(chip) {
        var current =  {
            name: chip,
            type: 'unknown'
        };
        ctrl.toolObjs.push(current);
        var queryStr = '"' + ctrl.toolObjs[0].name + '"';
        for (var i = 1; i < ctrl.toolObjs.length; i++) {
            queryStr += ', "' + ctrl.toolObjs[i].name + '"';
        }
        ctrl.onResult({str: queryStr});
        return current;
    };
}

angular.module('diyApp').component('autoChip', {
    templateUrl: './js/components/autoChip/autoChip.component.html',
    controller: chipController,
    bindings: {
        onResult: '&'
    }
});