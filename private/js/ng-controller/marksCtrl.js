app.controller("marksCtrl", ["$scope", "$http", function($scope, $http) {

    $scope.getMarksFn = function() {

        if (typeof $scope.exam_id != 'undefined' && typeof $scope.class_id != 'undefined' && typeof $scope.session != 'undefined') {

            $scope.subjects = [];
            $scope.active = false;

            var whereMarks = {
                table: "tbl_marks",
                cond: { 'exam_id': $scope.exam_id, 'class_id': $scope.class_id, 'session': $scope.session },
            };

            $http({
                method: "POST",
                url: url + "result",
                data: whereMarks
            }).success(function(responseMarks) {
                if (responseMarks.length > 0) {
                    $scope.active = true;
                    $scope.classID = responseMarks[0].class_id;
                    angular.forEach(responseMarks, function(item, index) {
                        var whereItem = {
                            table: "tbl_subject",
                            cond: {
                                class_id: item.class_id,
                                id: item.subject_id
                            },
                            select: ['subject_name']
                        };

                        $http({
                            method: "POST",
                            url: url + "result",
                            data: whereItem
                        }).success(function(responseSubject) {
                            if (responseSubject.length > 0) {
                                item['subject_name'] = responseSubject[0].subject_name;
                            }
                            $scope.subjects.push(item);
                        });
                    });

                } else {

                    var where = {
                        table: "tbl_subject",
                        cond: { 'class_id': $scope.class_id },
                        select: ['id as subject_id', 'subject_code', 'class_id', 'subject_name'],
                        groupBy: 'subject_code',

                    };

                    $http({
                        method: "POST",
                        url: url + "result",
                        data: where
                    }).success(function(response) {
                        if (response.length > 0) {
                            $scope.active = true;
                            $scope.classID = response[0].class_id;
                            $scope.subjects = response;
                        } else {
                            $scope.classID = '';
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No data found!',
                            })
                        }

                    });
                }
            });
        }
    }
}]);