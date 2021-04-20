app.controller("subjectController", ["$scope", "$http", function($scope, $http) {
    
    $scope.subjects = [];
    
    // get all subject in class wise
    $scope.$watch('class_id', function (class_id) {
        
        console.log();
        
        var where = {
            table: "tbl_subject",
            cond: { 
                class_id : class_id,
                trash    : 0
            },
        };

        $http({
            method: "POST",
            url: url + "result",
            data: where
        }).success(function(response) {
            if (response.length > 0) {
                if($scope.action == 'add'){
                    $scope.sortNo = response.length+1;
                }
                $scope.subjects = response;
            }else{
                $scope.sortNo = 1;
            }

        });
        
        $scope.subject_relation = {id: 31};
    });

}]);