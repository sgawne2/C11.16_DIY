// function addPhotoController($scope){
//     var ctrl = this;
//
//     $('#fileUpload').on('change', function(e) {
//         var files = e.target.files;
//         if (files[0]) {
//             ctrl.fileName = files[0].name;
//         } else {
//             ctrl.fileName = null;
//         }
//
//         ctrl.loadedPhoto = ctrl.fileName;
//         console.log(ctrl.loadedPhoto);
//         console.log(e.target.files);
//         $scope.$apply();
//
//
//         var preview = document.querySelector('img');
//         var file    = document.querySelector('input[type=file]').files[0];
//         var reader  = new FileReader();
//
//         reader.addEventListener("load", function () {
//             // ctrl.photos[index] = reader.result;
//             preview.src = reader.result;
//         }, false);
//
//         if (files[0]) {
//             reader.readAsDataURL(files[0]);
//         }
//
//     });
//
//     ctrl.photos = [];
//
//
// }

function addPhotoController($scope){
    var ctrl = this;

    $('#fileUpload').on('change', function(e) {
        ctrl.files = e.target.files;
        if (ctrl.files[0]) {
            ctrl.fileName = ctrl.files[0].name;
        } else {
            ctrl.fileName = null;
        }

        ctrl.loadedPhoto = ctrl.fileName;
        console.log(ctrl.loadedPhoto);
        console.log(e.target.files);
        $scope.$apply();


        var preview = document.querySelector('img');
        ctrl.file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            // ctrl.photos[index] = reader.result;
            preview.src = reader.result;
        }, false);

        if (ctrl.files[0]) {
            reader.readAsDataURL(ctrl.files[0]);
        }

    });

    ctrl.photos = [];


}

angular.module('diyApp').component('addPhoto', {
    templateUrl: './js/components/addPhoto/addPhoto.component.html',
    controller: addPhotoController,
    transclude: true
});
