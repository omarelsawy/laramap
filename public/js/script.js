
var myLatLng;
var map;
$(document).ready(function () {
geoLocationInit();
    function geoLocationInit() {
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success , fail);
        }else {
            alert("Browser not supported");
        }
    }
    
    function success(position) {

        var latVal = position.coords.latitude;
        var lngVal = position.coords.longitude;
        //console.log([latVal,lngVal]);
        myLatLng = new google.maps.LatLng(latVal,lngVal);
        createMap(myLatLng);
       // nearBySearch(myLatLng , "school");
        searchGirls(latVal,lngVal);
    }

    function fail() {
        alert("it fails");
    }

    //create map
    function createMap(myLatLng) {
         map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng ,
            zoom: 15
        });

         var marker = new google.maps.Marker({
             position: myLatLng,
             map: map
         });

    }

//marker
    function createMarker(latlng , icn , name) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon:icn,
            title: name
        });
    }

//nearby search
    /*function nearBySearch(myLatLng , type) {
        var request = {
            location: myLatLng ,
            radius: '500',
            type: [type]
        };

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);

        function callback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                    console.log(place);
                    latlng = place.geometry.location;
                    icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                    name = place.name;

                    createMarker(latlng,icn,name);
                }
            }
        }
    }*/
    
function searchGirls(lat,lng) {

    $.post('/api/searchGirls',{lat:lat,lng:lng},function(match){
        //console.log(match);
        $('#girlsResult').html('');
        $.each(match , function(i , val){
            var glatval = val.lat;
            var glngval = val.lng;
            var gname = val.name;
            var gLatLng = new google.maps.LatLng(glatval,glngval);
            var gicn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
            createMarker(gLatLng , gicn , gname);
            var html= '<h5><li>'+gname+'</li></h5>';
            $('#girlsResult').append(html);
        });
    });
}

$('#searchGirls').submit(function (e) {
       e.preventDefault();
       var distVal = $('#district').val();
       var cityVal = $('#cityLocation').val();
       $.post('/api/getLocationCoords' , {distVal:distVal,cityVal:cityVal} , function (match) {
           myLatLng = new google.maps.LatLng(match[0],match[1]);
           createMap(myLatLng);
           searchGirls(match[0] , match[1]);
       });
    });

});






