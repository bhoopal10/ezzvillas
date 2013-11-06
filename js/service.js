app.service('VillaService', function ($http)
{
    this.getVillas=function(city,callBack)
    {

        return $http.get('http://localhost/villa/public/villas/'.city)
            .success()
            .error(callBack);

    };

});