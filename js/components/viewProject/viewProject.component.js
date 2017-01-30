function viewProjectController(){
    var ctrl = this;


}

angular.module('diyApp').component('viewProject', {
    templateUrl: './js/components/viewProject/viewProject.component.html',
    controller: viewProjectController,
    transclude: true
});