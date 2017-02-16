function appController($http) {
    var ctrl = this;

    ctrl.getResult = function(string) {
        ctrl.loading = true;
        $http({
            method: 'POST',
            data: {search: string},
            url: "./db/search_results.php"
        })
            .then(function(response) {
                // console.log(response);
                ctrl.loading = false;
                ctrl.data = response.data;
            });
    };

    ctrl.loading = false;

    ctrl.case = 1;

    ctrl.selection = "Featured Projects";

    ctrl.categories = [
        "Featured Projects",
        "Recent Projects",
        "Best Projects"
    ]
}

angular.module('diyApp').component('app', {
    templateUrl: './js/components/app/app.component.html',
    controller: appController
});