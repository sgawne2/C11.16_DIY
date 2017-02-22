function viewProjectController($http, $location){
    var ctrl = this;

    ctrl.step_list = [];
    var pid = location.search.split('pid=')[1];
    $http({
        method: 'POST',
        data: {pid: pid},
        url: "./db/project_details.php"
    })
        .then(function(response) {
            ctrl.project_info = response.data.info;
            ctrl.tools = response.data.tools;
            ctrl.steps = response.data.steps;
            // ctrl.comments = response.data.comments;
        });

    /* Gets the average rating of the project */
    $http({
        method: 'post',
        data:   {proj_id:   pid},
        url:    "./db/get_rating.php"
    })
        .then(function(response) {
            // console.log("response.data: ", response.data);
            avg_rating = parseFloat(response.data.avg);
            // console.log("avg_rating: ", avg_rating);

            if (avg_rating < 1 || avg_rating > 5) {
                ctrl.rating = "Not rated yet";
            } else {
                ctrl.rating = response.data.avg;
            }
        })

}

angular.module('diyApp').component('viewProject', {
    templateUrl: './js/components/viewProject/viewProject.component.html',
    controller: viewProjectController,
    bindings: {
        userId: '<',
        userName: '@'
    },
    transclude: true
});