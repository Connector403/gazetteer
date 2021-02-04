import { getData, resetMap, restCountry, reverseOpenCage, openWeather, returnName, covidNews, countryBordergeo, geocountryCode, geoCountryInfo }from './fetch-data.js';


$(document).ready(function () {

    // Access TOken mapbox leaflet api : pk.eyJ1Ijoic2hlcmF6emk0MDMiLCJhIjoiY2tqd3hxMHRzMGo5eTJvbWxlZ3YxaWduciJ9.PeHvYuh7IIjyfK6L38ApaA

    let lat, lng, countryISO, capitalCity, iconMap, satellite, darktheme, initalMap;
    
    var mymap = L.map('mapid-001').setView([51.505, -0.09], 13);


    // setting up the tile layers

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1Ijoic2hlcmF6emk0MDMiLCJhIjoiY2tqd3hxMHRzMGo5eTJvbWxlZ3YxaWduciJ9.PeHvYuh7IIjyfK6L38ApaA'
    }).addTo(mymap);

    //**********************************************************************************************************************

    navigator.geolocation.getCurrentPosition(success);

    function success(pos) {
        lat = pos.coords.latitude;
        lng = pos.coords.longitude;

        reverseOpenCage(lat, lng).then(function (data) {
            //console.log(data);
            let countryISO = (data['results'][0]['components']['ISO_3166-1_alpha-2']);
            //console.log(countryISO);
            //console.log(geoCountryInfo(countryISO));
            return geoCountryInfo(countryISO);
            countryBordergeo(countryISO).then(result => {
                let country = iso2;
                let Obj = result[1];
                let jsonObj = Obj['features'];

                for (let i = 0; i < jsonObj.length; i++) {

                    if (country === jsonObj[i]['id']) {

                        let geoData = jsonObj[i];

                        L.geoJSON(geoData, {

                            style: function (feature) {
                                return {
                                    "color": "blue",
                                    "weight": 5,
                                    "opacity": 0
                                }
                            }
                        }).addTo(mymap);
                    }
                }
            })
        }).then(function (data1) {
            //console.log(data1);
            $('#countryName').html(data1['data'][0]['countryName']);
            $('#Population').html(data1['data'][0]['population']);
            $('#capitalCity').html(data1['data'][0]['capital']);
            $('#continentName').html(data1['data'][0]['continentName']);
            //console.log(data1['data'][0]['population']);
            $('#flag').attr('src', "https://www.countryflags.io/" + data1['data'][0]['countryCode'] + "/shiny/64.png");

            capitalCity = data1['data'][0]['capital'];


            covidNews(data1['data'][0]['countryName']).then(function (covidResult) {
                $('#country').html(covidResult['parameters']['country']);
                $('#totalPop').html(covidResult['response'][0]['population']);
                $('#activeCase').html(covidResult['response'][0]['cases']['active']);
                $('#criticalCases').html(covidResult['response'][0]['cases']['critical']);
                $('#newCases').html(covidResult['response'][0]['cases']['new']);
                $('#recovered').html(covidResult['response'][0]['cases']['recovered']);
                $('#totalCases').html(covidResult['response'][0]['cases']['total']);
                $('#totalDeaths').html(covidResult['response'][0]['deaths']['total']);
                $('#newDeaths').html(covidResult['response'][0]['deaths']['new']);

                $('#date').html(covidResult['response'][0]['day']);
                
            });
            //console.log(capitalCity);
            return openWeather(capitalCity);

        }).then(function (result) {
            //console.log(result );
            //openWeather for capital city 
            $('#feelsLike').html(Math.round(result['main']['feels_like'] / 100));

            $('#weather').html(result['weather'][0]['description']);
            $('#weatherWind').html(result['wind']['speed']);
            $('#weathertemp').html(Math.floor(result['main']['temp'] / 100));
            $('#weatherHumidity').html(result['main']['humidity']);
        });
     
    }; // navigator succes function

  
    // **********************************************************************************************************************

    $('#selCountry').click(function () {
        getData()
        let countryName = $('#selCountry').val();
        //console.log(countryISO);
        console.log(covidNews(countryISO));

        restCountry(countryName).then(function (data1) {
            //console.log(data1[0]['alpha2Code']);

            let countryISO2 = data1[0]['alpha2Code'];
            //console.log(countryISO2);
            return geoCountryInfo(countryISO2);





        }).then(function (data2) {
            //console.log(data2['data'][0]['capital']);
            $('#Population').html(data2['data'][0]['population']);
            $('#countryName').html(data2['data'][0]['countryName']);
            $('#capitalCity').html(data2['data'][0]['capital']);
            $('#continentName').html(data2['data'][0]['continentName']);
            $('#flag').attr('src', "https://www.countryflags.io/" + data2['data'][0]['countryCode'] + "/shiny/64.png");
            return openWeather(data2['data'][0]['capital']);
        }).then(function (weatherResult) {
            //console.log(weatherResult);
            $('#feelsLike').html(Math.round(weatherResult['main']['feels_like'] / 100));

            $('#weather').html(weatherResult['weather'][0]['description']);
            $('#weatherWind').html(weatherResult['wind']['speed']);
            $('#weathertemp').html(Math.floor(weatherResult['main']['temp'] / 100));
            $('#weatherHumidity').html(weatherResult['main']['humidity']);

        })


        covidNews(countryName).then(function (covidArr) {
            //console.log(covidArr['response'][0]['population'] + " HEYEYEYEY");
            //console.log(covidArr);
           $('#country').html(covidArr['parameters']['country']);
           $('#totalPop').html(covidArr['response'][0]['population']);
            $('#activeCase').html(covidArr['response'][0]['cases']['active']);
            $('#criticalCases').html(covidArr['response'][0]['cases']['critical']);
            $('#newCases').html(covidArr['response'][0]['cases']['new']);
            $('#recovered').html(covidArr['response'][0]['cases']['recovered']);
           $('#totalCases').html(covidArr['response'][0]['cases']['total']);
            $('#totalDeaths').html(covidArr['response'][0]['deaths']['total']);
            $('#newDeaths').html(covidArr['response'][0]['deaths']['new']);
        
            $('#date').html(covidArr['response'][0]['day']);


        });
    });





   
});