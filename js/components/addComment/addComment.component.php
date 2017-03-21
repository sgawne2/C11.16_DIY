<div layout="column" style="height:5%;"></div>

<form id="comment_project">

    <input type="text" name="proj_red_flag" ng-model="$ctrl.redFlag" ng-hide="true"><br>
    <input type="text" name="proj_rating" ng-model="$ctrl.rating" ng-hide="true">
    <input type="text" name="p_id" ng-model="$ctrl.pid" ng-hide="true">

<!--Rate this project-->
<div flex="70" flex-offset="15" layout-align="end">
    <div class="button-row" layout="row">

        <p><b>How was this project?</b></p>

        <div ng-mouseleave="$ctrl.stopHovering()" class="rateProject">
            <i class="material-icons"
               ng-mouseover="$ctrl.showStars($index)"
               ng-click="$ctrl.makeRating($index)"
               ng-repeat="empty_star in $ctrl.stars">
                {{ empty_star.filled ? 'star' : 'star_border' }}
            </i>
        </div>

        <span flex=""></span>

        <!--Flag as inappropriate-->
        <p><b>Flag as inappropriate</b></p>
        <md-button class="md-fab md-warn md-mini"
                   ng-hide="editing"
                   ng-click="$ctrl.showConfirm($event)">
            <md-icon md-font-set="material-icons">flag</md-icon>
            <md-tooltip md-direction="top">
                Report
            </md-tooltip>
        </md-button>

    </div>
</div>

<!--Submit a comment-->
<div layout="column" style="height:5%;"></div>
<md-list-item>

    <md-input-container flex="65" flex-offset="15">
        <label>Comments</label>
<!--        <textarea ng-model="project.description" name="proj_comment"></textarea>-->
        <textarea ng-model="$ctrl.commentsObject.comment_text" name="proj_comment"></textarea>
    </md-input-container>
    <md-button class="md-raised md-warn" flex="5" layout-align="right end" style="background-color: #00BFA5" ng-click="$ctrl.submit()" ng-disabled="!$ctrl.commentsObject.comment_text">Submit</md-button>
</md-list-item>
</form>

<!--posted comments section-->
<md-card flex="70" flex-offset="15" style="max-height:none">
    <div style="background-color: #00BFA5; color:white; width:100%">
        <h2>Comments</h2>
    </div>

    <md-card-content>

<!--        <p style="line-height: 140%" ng-if="$ctrl.show">{{ project.description }}</p>-->
        <div ng-repeat="comment in $ctrl.commentsArray" class="postedComments">
            <p style="line-height: 140%; padding-left:15px" ng-if="$ctrl.show"><b>{{ comment.user_name }}</b></p>
            <p style="line-height: 140%; padding-left:15px" ng-if="$ctrl.show">{{ comment.comment_text }}</p>
            <div layout="row" layout-align="end end">
                <p style="line-height: 140%; font-size:14px; padding-right:15px" ng-if="$ctrl.show">Posted {{ comment.comment_date | date: 'medium' }}</p>
            </div>
            <md-divider></md-divider>
        </div>
    </md-card-content>
</md-card>