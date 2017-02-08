function addCommentController($mdDialog, $animate){
    var ctrl = this;
    ctrl.rating = 0;
    ctrl.redFlag = 0;

    ctrl.stars = [
        {filled: false},
        {filled: false},
        {filled: false},
        {filled: false},
        {filled: false}
    ];

    ctrl.showStars = function(index){

        if (!ctrl.isRated){
            for (var i=0; i<=index; i++){
                ctrl.stars[i].filled = true;
                ctrl.rating = i + 1;
            }

            for (var j=index+1; j<ctrl.stars.length; j++){
                ctrl.stars[j].filled = false;
            }
        }
    };

    ctrl.isRated = false;

    ctrl.stopHovering = function(){
        if (!ctrl.isRated){
            ctrl.rating = 0;
            for (var i=0; ctrl.stars.length; i++){
                ctrl.stars[i].filled = false;
            }
        }
    };

    ctrl.makeRating = function(index){

        if(ctrl.isRated){
            if (index === ctrl.rating - 1){
                ctrl.stars = [
                    {filled: false},
                    {filled: false},
                    {filled: false},
                    {filled: false},
                    {filled: false}
                ];
                ctrl.isRated = false;
            }

            else {
                ctrl.isRated = false;
                ctrl.showStars(index);
                ctrl.isRated = true;
            }
        } else{
            ctrl.isRated = true;
        }

        ctrl.triggerAnimation();

    };

    ctrl.triggerAnimation = function(){

        $animate.on('click', container,
            function callback(element, phase) {
                // cool we detected an enter animation within the container
            });
            console.log('hello');


    };

    ctrl.showConfirm = function(ev) {

        ctrl.confirm = $mdDialog.confirm()
            .title('Are you sure you want to report this project?')
            .ariaLabel('Lucky day')
            .targetEvent(ev)
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(ctrl.confirm).then(function() {
            ctrl.redFlag = 1;
        }, function() {
            ctrl.redFlag = 0;
        });
    };



    ctrl.date = new Date().getTime();

    ctrl.commentsArray = [];

    ctrl.commentsObject = {
        user_id: ctrl.userId,
        comment_text: '',
        comment_date: ctrl.date
    };


    ctrl.submit = function(){

        ctrl.commentsArray.push(ctrl.commentsObject);
        console.log(ctrl.commentsArray);
        ctrl.commentsObject = {
            user_id: ctrl.userId,
            comment_text: '',
            comment_date: ctrl.date
        };
        ctrl.show = true;
    };

    ctrl.pid = location.search.split('pid=')[1];

}

angular.module('diyApp').component('addComment', {
    templateUrl: './js/components/addComment/addComment.component.php',
    controller: addCommentController,
    bindings: {
        userId: '<'
    },
    transclude: true
});