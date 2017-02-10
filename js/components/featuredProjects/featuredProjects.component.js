function featuredProjectsController($http){
    var ctrl = this;

    ctrl.featuredData = [{
            project_id: 4,
            project_name: 'CPU Fan Drone',
            project_photo: 'images/drone.jpg',
            project_description: 'seems legit',
            owned_tools: null,
            own_count: 4,
            req_count: 7,
            score: null
        },
        {
            project_id: 5,
            project_name: 'Industrial Pipe Lamp',
            project_photo: 'images/lamp.jpg',
            project_description: 'This is a pipe lamp thing.',
            owned_tools: null,
            own_count: 5,
            req_count: 10,
            score: null
        },
        {
            project_id: 6,
            project_name: 'Homemade Lava Lamp',
            project_photo: 'images/lava_lamp.jpg',
            project_description: 'Aww yeaaa.',
            owned_tools: null,
            own_count: 1,
            req_count: 5,
            score: null
        },
        {
            project_id: 7,
            project_name: 'Broken Glass Project',
            project_photo: 'images/broken_glass.jpg',
            project_description: 'This project uses broken glass.',
            owned_tools: null,
            own_count: 2,
            req_count: 3,
            score: null
        }];

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