function projectCardController(){
    var ctrl = this;

    // (function() {
    //     ctrl.projects = [{
    //         project_name: 'CPU Drone',
    //         project_photo: 'images/drone.jpg',
    //         project_description: 'This is a drone.',
    //         owned_tools: null,
    //         req_count: null,
    //         own_count: null,
    //         score: null
    //     },
    //         {
    //             project_name: 'Industrial Pipe Lamp',
    //             project_photo: 'images/lamp.jpg',
    //             project_description: 'This is a pipe lamp thing.',
    //             owned_tools: null,
    //             req_count: null,
    //             own_count: null,
    //             score: null
    //         },
    //         {
    //             project_name: 'Homemade Lava Lamp',
    //             project_photo: 'images/lava_lamp.jpg',
    //             project_description: 'Aww yeaaa.',
    //             owned_tools: null,
    //             req_count: null,
    //             own_count: null,
    //             score: null
    //         },
    //         {
    //             project_name: 'Broken Glass Project',
    //             project_photo: 'images/broken_glass.jpg',
    //             project_description: 'This project uses broken glass.',
    //             owned_tools: null,
    //             req_count: null,
    //             own_count: null,
    //             score: null
    //         }];
    // })();
    //
    //
    //     $http.get("search_results.php")
    //         .then(function(response) {
    //             ctrl.projects = response.data;
    //         });
    //

}

angular.module('diyApp').component('projectCard', {
    templateUrl: './js/components/projectCard/projectCard.component.html',
    controller: projectCardController,
    bindings: {
        projects: '<'
    },
    transclude: true
});