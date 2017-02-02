function footerController() {
    var ctrl = this;


}

angular.module('diyApp').component('footer', {
    templateUrl: './js/components/footer/footer.component.html',
    controller: footerController,
    transclude: true
});