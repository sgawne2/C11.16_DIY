function addCommentController($mdDialog, $animate, $http){
    var ctrl = this;
    ctrl.rating = 0;
    ctrl.redFlag = 0;

    /* method for incrementing proj_red_flag by 1 in "projects" table -VL */
    ctrl.increment_flag = function() {
        $http({
            method: 'POST',
            data:   {proj_id:   ctrl.pid},
            url:    "./db/project_flag.php"
        })
            .then(function(response) {
                // console.log("response: ", response);
            });
    };

    /* method for inserting rating into "p_ratings" table -VL */
    ctrl.insert_rating = function() {
        $http({
            method: "POST",
            data:   {
                        proj_id:        ctrl.pid,
                        user_id:        ctrl.userId,
                        proj_rating:    ctrl.rating
                    },
            url:    "./db/rating_insert.php"
        })
            .then(function(response) {
                // console.log("response: ", response);
            });
    };

    /* method for inserting comment into "p_comments" table -VL */
    ctrl.insert_comment = function() {
        $http({
            method: "post",
            data:   {
                proj_id:        ctrl.pid,
                proj_comment:   ctrl.commentsObject.comment_text,
                user_id:        ctrl.userId
            },
            url:    "./db/comment_insert.php"
        })
            .then(function(response) {
                // console.log("response: ", response);
            });
    };

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

    ctrl.isRated = false;       // isRated denotes whether the project has received a rating or not -VL

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
                ctrl.insert_rating();
            }
        } else{
            ctrl.isRated = true;
            ctrl.insert_rating();   // insert rating into database -VL
        }

        ctrl.triggerAnimation();

    };

    ctrl.triggerAnimation = function(){

        $animate.on('click', container,
            function callback(element, phase) {
                // cool we detected an enter animation within the container
            });
            // console.log('hello');


    };

    ctrl.showConfirm = function(ev) {

        ctrl.confirm = $mdDialog.confirm()
            .title('Are you sure you want to report this project?')
            .ariaLabel('Lucky day')
            .targetEvent(ev)
            .ok('Yes')
            .cancel('No');

        $mdDialog.show(ctrl.confirm).then(function() {
            ctrl.redFlag = 1;       // if you click "Yes" -VL
            ctrl.increment_flag();
        }, function() {             // if you click "No" -VL
            ctrl.redFlag = 0;
        });
    };

    ctrl.date = new Date().getTime();

    ctrl.commentsArray = [];

    ctrl.commentsObject = {
        user_id: ctrl.userId,
        user_name: ctrl.userName,
        comment_text: '',
        comment_date: ctrl.date
    };

    ctrl.submit = function(){
        ctrl.insert_comment();
    // console.log(ctrl.commentsObject);
        ctrl.commentsArray.unshift(ctrl.commentsObject);
        // console.log(ctrl.commentsArray);

        ctrl.commentsObject = {
            user_id: ctrl.userId,
            user_name: ctrl.userName,
            comment_text: '',
            comment_date: ctrl.date
        };
        ctrl.show = true;
    };

    ctrl.pid = location.search.split('pid=')[1];

    /* this method loads all comments, if any, from the database for the given project -VL */
    ctrl.load_comments = function() {
        // var defer = $q.defer();
        $http({
            method: 'post',
            data:   {proj_id:   ctrl.pid},
            url:    "./db/comments_select.php"
        })
            .then(function(response) {
                if(response) {
                    ctrl.commentsArray = response.data;
                    // console.log("commentsArray: ");
                    // console.log(ctrl.commentsArray);
                    ctrl.show = true;
                // defer.resolve((function (hash) {
                        //
                        //     return hash;
                        // }));
                } else {
                    console.log("There was an error in getting the response")
                }
            });
        // return defer.promise;
    };

    ctrl.load_comments();
}


angular.module('diyApp').component('addComment', {
    templateUrl: './js/components/addComment/addComment.component.php',
    controller: addCommentController,
    bindings: {
        userId: '<',
        userName: '<'
    },
    transclude: true
});