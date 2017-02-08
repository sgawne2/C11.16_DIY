function addPhotoController(){

    var acc = document.getElementsByClassName("accordion");

    for (var i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + 'px';
            }
        }
    }

}


angular.module('diyApp').component('sidePanel', {
    templateUrl: './js/components/sidePanel/sidePanel.component.html',
    controller: addPhotoController,
    transclude: true
});