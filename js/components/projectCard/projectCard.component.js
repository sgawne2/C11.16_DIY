function projectCardController(){
    var ctrl = this;
}

angular.module('diyApp').component('projectCard', {
    templateUrl: './js/components/projectCard/projectCard.component.html',
    controller: projectCardController,
    bindings: {
        projects: '<'
    },
    transclude: true
});