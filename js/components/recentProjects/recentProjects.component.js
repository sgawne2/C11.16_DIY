function recentProjectsController($http){
    var ctrl = this;

    ctrl.featuredData = [];

    // ctrl.getResult = function(string) {
    //     ctrl.loading = true;
        $http({
            method: 'POST',
            url: "./db/get_recent.php"
        })
            .then(function(response) {
                console.log(response);
                ctrl.loading = false;
                ctrl.featuredData = response.data;
            });
    // };
}

angular.module('diyApp').component('recentProjects', {
    templateUrl: './js/components/recentProjects/recentProjects.component.html',
    controller: recentProjectsController,
    transclude: true,
    bindings: {
        projects: '<',
        isLoading: '<'
    }
});