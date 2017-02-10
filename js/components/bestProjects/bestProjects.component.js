function bestProjectsController($http){
    var ctrl = this;

    ctrl.featuredData = [];

    // ctrl.getResult = function(string) {
    //     ctrl.loading = true;
        $http({
            method: 'POST',
            url: "./db/get_best.php"
        })
            .then(function(response) {
                console.log(response);
                ctrl.loading = false;
                ctrl.featuredData = response.data;
            });
    // };
}

angular.module('diyApp').component('bestProjects', {
    templateUrl: './js/components/bestProjects/bestProjects.component.html',
    controller: bestProjectsController,
    transclude: true,
    bindings: {
        projects: '<',
        isLoading: '<'
    }
});