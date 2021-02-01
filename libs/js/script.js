import { restCountry, reverseOpenCage, openWeather, returnName, covidNews, countryBordergeo, geocountryCode, geoCountryInfo }from './fetch-data.js';


$(document).ready(function () {
    let lat, lng, countryISO, capitalCity, initalMap, satallite;

    initalMap = L.map('mapid-001').setView([51.505, -0.09], 3);

    satallite = 


    navigator.geolocation.getCurrentPosition(success);

    function success(pos) {
        lat = pos.coords.latitude;
        lng = pos.coords.longitude;

        

        reverseOpenCage(lat, lng).then(function (data1) {
            console.log(data1['results'][0]['components']['country']);
            countryISO = (data1['results'][0]['components']['country']);
           

            $('#countryName').html(data1['results'][0]['components']['country']);
            $('#currency').html(data1['results'][0]['annotations']['currency']['name']);



            restCountry(countryISO).then(function (data2) { // Get information about countries via a RESTful API
                //console.log(data2);
                capitalCity = data2[0]['capital'];
                $('#capitalCity').html(capitalCity);
                $('#Population').html(data2[0]['population']);
                return capitalCity;


            }).then(function (capital) {
                
                openWeather(capital).then(function (result) { // current weather data for any location on Earth including over 200,000 cities! 
                 //   console.log(result);
                   // console.log(Math.floor(result['main']['temp'] / 100));
                    $('#weather').html(result['weather'][0]['description']);
                    $('#weatherWind').html(result['wind']['speed']);
                    $('#weathertemp').html(Math.floor(result['main']['temp'] / 100));
                    $('#weatherHumidity').html(result['main']['humidity']);
                });
            });
        }); // reverseOpencage 


    }; // navigator function success 


    $('#selCountry').change(function () {
        let countryISO = $('#selCountry').val();
        //console.log(countryISO);
        console.log(covidNews(countryISO));
       covidNews(countryISO).then(function (covidArr) {
           //console.log(covidArr['response'][0]['population'] + " HEYEYEYEY");
           $('#country').html(covidArr['parameters']['country']);
           $('#totalPop').html(covidArr['response'][0]['population']);
           $('#activeCase').html(covidArr['response'][0]['cases']['active']);
           $('#permillionaffected').html(covidArr['response'][0]['cases']['recovered']);
           $('#caseRecovered').html(covidArr['response'][0]['cases']['1M_pop']);
           $('#caseNew').html(covidArr['response'][0]['deaths']['new']);
           $('#PEM').html(covidArr['response'][0]['deaths']['1M_pop']);
           $('#deathTotal').html(covidArr['response'][0]['deaths']['total']);
           $('#day').html(covidArr['response'][0]['time']);

        });
    });





   
});