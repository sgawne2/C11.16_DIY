function contactInfoController(){
    var ctrl = this;

    ctrl.createProfileObject = function() {
        ctrl.profile = {
            username: ctrl.username,
            bio: ctrl.bio,
            hobbies: ctrl.hobbies,
            location: ctrl.location
        };

        console.log(ctrl.profile);
    }

}

angular.module('diyApp').component('contactInfo', {
    templateUrl: './js/components/contactInfo/contactInfo.component.html',
    controller: contactInfoController,
    transclude: true
});