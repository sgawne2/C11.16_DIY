function featuredProjectsController($http){
    var ctrl = this;

    ctrl.featuredData = [];

    // ctrl.getResult = function(string) {
    //     ctrl.loading = true;
        $http({
            method: 'POST',
            url: "./db/get_featured.php"
        })
            .then(function(response) {
                console.log(response);
                ctrl.loading = false;
                ctrl.featuredData = response.data;
            });
    // };
}

angular.module('diyApp').component('featuredProjects', {
    templateUrl: './js/components/featuredProjects/featuredProjects.component.html',
    controller: featuredProjectsController,
    transclude: true,
    bindings: {
        projects: '<',
        isLoading: '<'
    }
});