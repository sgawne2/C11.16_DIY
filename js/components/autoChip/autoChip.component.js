function chipController($q, $http, $timeout) {
    var ctrl = this;
    ctrl.readonly = false;
    ctrl.toolObjs = [];
    ctrl.newTool = function(chip) {
        var current =  {
            name: chip,
            type: 'unknown'
        };
        ctrl.toolObjs.push(current);
        var queryStr = '"' + ctrl.toolObjs[0].name + '"';
        for (var i = 1; i < ctrl.toolObjs.length; i++) {
            queryStr += ', "' + ctrl.toolObjs[i].name + '"';
        }
        ctrl.onResult({str: queryStr});
        return current;
    };
    ctrl.remove = function() {
        if (ctrl.toolObjs.length === 0) {
            var queryStr = "";
        } else {
            queryStr = '"' + ctrl.toolObjs[0].name + '"';
            for (var i = 1; i < ctrl.toolObjs.length; i++) {
                queryStr += ', "' + ctrl.toolObjs[i].name + '"';
            }
        }
        ctrl.onResult({str: queryStr});
    };

    ctrl.selectedItem = null;
    ctrl.searchText = null;
    ctrl.selectedTags = [];

    ctrl.querySearch = function(query) {
        var results = query ? ctrl.hashtags.filter(ctrl.createFilterFor(query)) : query;
        return results.map(function (hash) {
            hash = hash._lowername;
            return hash;
        });
    };

    ctrl.createFilterFor = function (query) {
        console.log(ctrl.hashtags);
        var lowercaseQuery = angular.lowercase(query);
        return function filterFn(hashtag) {
            return (hashtag._lowername.indexOf(lowercaseQuery) === 0)
        };
    };

    // ctrl.hashtags = [
    //     {
    //         'name': 'ice'
    //     },
    //     {
    //         'name': 'cream'
    //     },
    //     {
    //         'name': 'tissue'
    //     },
    //     {
    //         'name': 'marker'
    //     },
    //     {
    //         'name': 'string'
    //     },
    //     {
    //         'name': 'paper plate'
    //     },
    //     {
    //         'name': 'cpu fan'
    //     },
    //     {
    //         'name': 'pipe'
    //     },
    //     {
    //         'name': 'light bulb'
    //     },
    //     {
    //         'name': 'wax'
    //     },
    //     {
    //         'name': 'oil'
    //     },
    //     {
    //         'name': 'broken glass'
    //     },
    //     {
    //         'name': 'picture frame'
    //     },
    //     {
    //         'name': 'jar'
    //     }
    // ];

    ctrl.loadHashtags = function() {
        var defer = $q.defer();
        $http({
            method: 'GET',
            url: "./db/autocomplete.php"
        })
            .then(function(response) {
                // console.log(response.data);
                ctrl.hashtags = response.data;
                console.log(ctrl.hashtags);
                defer.resolve(ctrl.hashtags.map(function (hash) {
                    hash._lowername = hash.name.toLowerCase();
                    return hash;
                }));
            });
        return defer.promise;
    };
    //zz. Init
    var init = function () {ctrl.hashtags = ctrl.loadHashtags();};
    $timeout(function () {init();}, 300);
}

angular.module('diyApp').component('autoChip', {
    templateUrl: './js/components/autoChip/autoChip.component.html',
    controller: chipController,
    bindings: {
        onResult: '&'
    }
});