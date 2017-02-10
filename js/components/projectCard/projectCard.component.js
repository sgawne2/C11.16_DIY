function projectCardController(){

}

angular.module('diyApp').component('projectCard', {
    templateUrl: './js/components/projectCard/projectCard.component.html',
    controller: projectCardController,
    bindings: {
        projects: '<',
        isLoading: '<'
    },
    transclude: true
});