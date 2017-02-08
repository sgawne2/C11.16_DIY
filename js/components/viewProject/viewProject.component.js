function viewProjectController($http, $location){
    var ctrl = this;

    // ctrl.project_info = {
    //     project_name: 'CPU Drone',
    //     project_photo: 'images/drone.jpg',
    //     project_description: 'This is a drone.'
    // };
    //
    // ctrl.tools = [
    //     {name: "Hammer"},
    //     {name:"Nails"},
    //     {name:"Self Respect (optional)"}
    //     ];
    //
    // ctrl.steps = [{
    //     step_number: 1,
    //     description: "My grandma used to make these all the time. Steal CPUS fans from where ever",
    //     step_photo: 'images/fan.jpg'
    //     },
    //     {
    //     step_number: 2,
    //     description: "Your drone is now complete. Nice job",
    //     step_photo: 'images/drone.jpg'
    //     }];

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
            console.log(response.data);
            ctrl.rating = response.data.avg;
        })

}


angular.module('diyApp').component('viewProject', {
    templateUrl: './js/components/viewProject/viewProject.component.html',
    controller: viewProjectController,
    transclude: true
});