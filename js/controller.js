/* ---------Controllers*/

/*Location Controller*/
app.controller('DestinationCtrl',function ($scope,VillaService,$http)
{
    $scope.locations=new Array();
    $scope.villas=[];
    $scope.base_url='';
    $scope.pics=[];
    $scope.facility=[];
    $scope.coverImage='';

    $scope.getVillasWithFilter=function(city)
    {
        $http({
            url: $scope.base_url + "/test",
            method: "POST",
            data:{'city':city,'min_price':$scope.min_price.value,'max_price':$scope.max_price.value}
        }).success(function(data, status, headers, config) {
               $scope.villas=data;
            }).error(function(data, status, headers, config) {
                window.alert(data);
            });
    };

    $scope.setURL=function()
    {
        var hostname=window.location.hostname;
        if(hostname=='localhost')
        {
            $scope.base_url='http://localhost/ezz'
        }
        else
        {
            $scope.base_url=window.location.protocol + '//'+hostname;
        }
    }
    $scope.setURL();
    $scope.getVillas=function(city)
    {
        $http({
            url: $scope.base_url + "/villas/"+city,
            method: "GET"
        }).success(function(data, status, headers, config) {
               $scope.villas=data;
            }).error(function(data, status, headers, config) {
            });
    };
    $scope.getCoverImage=function(villa_id)
    {
        $http({
            url: $scope.base_url + "/villas/getCoverImage",
            method: "POST",
            data:{'villa_id':villa_id}
        }).success(function(data, status, headers, config) {
               $scope.coverImage=data;
            }).error(function(data, status, headers, config) {
            });
    };

    $scope.drawRating=function(rate)
    {
        var html='';
        var count=rate;
        for(var i=0;i<=count;i++)
        {
            html+='<span>&#9733;</span>'
        }

        return html;
    };

    $scope.drawBookingForm=function(name)
    {
        $("#dialog-form").dialog("open");
        $("#dform-villa-name").val(name);
    }

});

app.controller('VillaCtrl',function ($scope,VillaService,$http)
{
    $scope.mins = [];
    $scope.villa=[];
    $scope.base_url='';
    $scope.min_price='';$scope.max_price='';

    $scope.setURL=function()
    {
        var hostname=window.location.hostname;
        if(hostname=='localhost')
        {
            $scope.base_url='http://localhost/ezz'
        }
        else
        {
            $scope.base_url=window.location.protocol + '//'+hostname;
        }
    }
    $scope.setURL();

    $scope.getVillaDetail=function(villa_id)
    {
        $http({
            url: $scope.base_url + "/getVillaDetail",
            method: "POST",
            data:{'villa_id':villa_id}
        }).success(function(data, status, headers, config) {
                $scope.villa=data;
            }).error(function(data, status, headers, config)
            {
                window.alert(data);
            });
    };

    $scope.getImages=function(dest_id)
    {
        $http({
            url: $scope.base_url + "/villas/getImages",
            method: "POST",
            data:{'dest_id':dest_id}
        }).success(function(data, status, headers, config) {
                $scope.pics=data;
            }).error(function(data, status, headers, config) {
            });
    };

    $scope.getFacility=function(dest_id)
    {
        $http({
            url: $scope.base_url + "/getVillaFacility",
            method: "POST",
            data:{'dest_id':dest_id}
        }).success(function(data, status, headers, config) {
                $scope.facility=data;
            }).error(function(data, status, headers, config)
            {

            });
    }

    $scope.drawBookingForm=function()
    {
        $("#dialog-form").dialog("open");
    }
});
