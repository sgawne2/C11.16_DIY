function createProfileController($scope){
    var ctrl = this;

    $('#fileUpload').on('change', function(e) {
        var files = e.target.files;
        if (files[0]) {
            ctrl.fileName = files[0].name;
        } else {
            ctrl.fileName = null;
        }

        ctrl.loadedPhoto = ctrl.fileName;
        console.log(ctrl.loadedPhoto);
        console.log(e.target.files);
        $scope.$apply();

        var preview = document.querySelector('img');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            // ctrl.photos[index] = reader.result;
            preview.src = reader.result;
        }, false);

        if (files[0]) {
            reader.readAsDataURL(files[0]);

            ctrl.photos = [];
            ctrl.photos.push(ctrl.fileName);
            console.log("ctrl.photos array: ", ctrl.photos);
        }

    });


}

angular.module('diyApp').component('createProfile', {
    templateUrl: './js/components/createProfile/createProfile.component.html',
    controller: createProfileController,
    transclude: true
});