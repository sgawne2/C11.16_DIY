



<div layout="column" style="height:5%;"></div>

<form id="comment_project">

    <input type="text" name="proj_red_flag" ng-model="$ctrl.redFlag" ng-hide="true"><br>
    <input type="text" name="proj_rating" ng-model="$ctrl.rating" ng-hide="true">
<!--    <input type="text" value="--><?php //print($_GET["pid"]); ?><!--" name="p_id" ng-hide="true">-->

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
        <textarea ng-model="$ctrl.comments[0].comment_text" name="proj_comment"></textarea>
    </md-input-container>
    <md-button class="md-raised md-warn" flex="5" layout-align="right end" style="background-color: #00BFA5" ng-click="$ctrl.submit()">Submit</md-button>
</md-list-item>
</form>

<!--posted comments section-->
<md-card flex="70" flex-offset="15" style="max-height:none">
    <div style="background-color: #00BFA5; color:white; width:100%">
        <h2>Comments</h2>
    </div>

    <md-card-content>

<!--        <p style="line-height: 140%" ng-if="$ctrl.show">{{ project.description }}</p>-->
        <p style="line-height: 140%" ng-if="$ctrl.show">{{ $ctrl.comments[0].user_id }}</p>
        <p style="line-height: 140%" ng-if="$ctrl.show">{{ $ctrl.comments[0].comment_text }}</p>
        <p style="line-height: 140%" ng-if="$ctrl.show">{{ $ctrl.comments[0].comment_date }}</p>
        <md-divider></md-divider>

    </md-card-content>
</md-card>





























<!--<form id="comment_project">-->
<!--    <!-- checking the box will increment proj_red_flag by 1 upon hitting the submit button -VL -->-->
<!---->
<!--    <input type="checkbox" name="proj_red_flag" value=1> Check this box if there are any issues with this project <br>-->
<!--    Please rate project (1 = bad, 5= good):-->
<!--    <input type="number" name="proj_rating" min="1" max="5">-->
<!---->
<!--    this is needed to pass the project id into insert_comment.php -VL go ahead and hide this, but don't delete-->
<!--    <input type="text" value="--><?php //print($_GET["pid"]); ?><!--" name="p_id">-->
<!---->
<!--    <md-input-container flex="40" flex-offset="30" layout="row">-->
<!--        <label>Comments</label>-->
<!--        <textarea ng-model="project.description" name="proj_comment" ></textarea>-->
<!---->
<!--        <div layout="row" layout-align="end start" flex="90">-->
<!--            <md-button class="md-raised md-warn" layout-align="right" style="background-color: #00BFA5">Submit</md-button>-->
<!--        </div>-->
<!--    </md-input-container>-->
<!---->
<!--</form>-->



<!--working original!-->

<!--<div layout="column" style="height:5%;"></div>-->
<!---->
<!---->
<!--    <div flex="70" flex-offset="15" layout-align="end">-->
<!--        <div class="button-row" layout="row">-->
<!--            <p><b>How was this project?</b></p>-->
<!---->
<!--            <div ng-mouseleave="$ctrl.stopHovering()" class="rateProject">-->
<!--                <i class="material-icons" ng-mouseover="$ctrl.showStars($index)" ng-click="$ctrl.makeRating($index)" ng-repeat="empty_star in $ctrl.stars">{{ empty_star.filled ? 'star' : 'star_border' }}</i>-->
<!--            </div>-->
<!---->
<!--            <span flex=""></span>-->
<!--            <p><b>Flag as inappropriate</b></p>-->
<!--            <md-button class="md-fab md-warn md-mini"-->
<!--                       ng-hide="editing"-->
<!--                       ng-click="$ctrl.add()">-->
<!--                <md-icon md-font-set="material-icons">flag</md-icon>-->
<!--                <md-tooltip md-direction="top">-->
<!--                    Report-->
<!--                </md-tooltip>-->
<!--            </md-button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div layout="column" style="height:5%;"></div>-->
<!--    <md-list-item>-->
<!---->
<!--        <md-input-container flex="65" flex-offset="15">-->
<!--            <label>Comments</label>-->
<!--            <textarea ng-model="project.description" name="proj_comment"></textarea>-->
<!--        </md-input-container>-->
<!--        <md-button class="md-raised md-warn" flex="5" layout-align="right end" style="background-color: #00BFA5" ng-click="$ctrl.submit">Submit</md-button>-->
<!--    </md-list-item>-->
