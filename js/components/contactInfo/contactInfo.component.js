function contactInfoController(){
    var ctrl = this;

    ctrl.createProfileObject = function() {
        ctrl.profile = {
            username: ctrl.username,
            bio: ctrl.bio,
            hobbies: ctrl.hobbies,
            city: ctrl.city,
            state: ctrl.state
        };

        console.log(ctrl.profile);
    };

    ctrl.states = ('AL AK AZ AR CA CO CT DE FL GA HI ID IL IN IA KS KY LA ME MD MA MI MN MS ' +
    'MO MT NE NV NH NJ NM NY NC ND OH OK OR PA RI SC SD TN TX UT VT VA WA WV WI ' +
    'WY').split(' ').map(function(state) {
        return {abbrev: state};
    });

}

angular.module('diyApp').component('contactInfo', {
    templateUrl: './js/components/contactInfo/contactInfo.component.html',
    controller: contactInfoController,
    transclude: true
});