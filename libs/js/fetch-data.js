
function resetMap() {
    let container = L.DomUtil.get('mapid-001');
    if (container != null) {
        container._leaflet_id = null;
    }
}

function restCountry(countryName) {
    return $.ajax({
        url: "libs/php/rest-country.php",
        type: "POST",
        dataType: 'json',
        data: {
            countryName: countryName
        },
        success: function (data1) {
            return data1;
        }
    });
};


function reverseOpenCage(lat, lng) {
    return $.ajax({
        url: "libs/php/openCage.php",
        type: "POST",
        dataType: 'json',
        data: {
            lat: lat,
            lng: lng
        },
        success: function (data2) {
            return data2;
        }
    });
};

function openWeather(capital) {
    return $.ajax({
        url: "libs/php/open-weather.php",
        type: "POST",
        dataType: 'json',
        data: {
            capital: capital
        },
        success: function (data3) {
            return data3;
        }
    });

};


function returnName(countryISO) {
    return $.ajax({
        url: "libs/php/return-name.php",
        type: "POST",
        dataType: "json",
        data: {
            countryIS0: countryISO
        },
        success: function (data4) {
            return data4;
        }

    })
}


function covidNews(countryISO) {
    return $.ajax({
        url: "libs/php/corno.php",
        type: "POST",
        dataType: 'json',
        data: {
            country: countryISO
        },
        success: function (data5) {
            return data5;
        }
    })
 
}



function countryBordergeo(iso2) {
    return $.ajax({
        type: "Get",
        url: "countryBorders.geo.json",
        dataType: 'json'

    }).then(data6 => [iso2, data5]);
}


function geocountryCode(lat, lng) {
    return $.ajax({
        url: "libs/php/geoCountryCode.php",
        type: "POST",
        dataType: "json",
        data: {
            lat: lat,
            lng: lng
        },
        success: function (data6) {
            return data6;
        }
    })
}


function geoCountryInfo(countryCode) {
    return $.ajax({
        type: "POST",
        url: "libs/php/geoCountryInfo.php",
        dataType: "JSON",
        data: {
            countryCode: countryCode
        },
        success: function (data7) {
            return data7;
        }
    })
}


function getData() {
    return $.ajax({
        url: "libs/php/getAll.php",
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data)
            return data;
        }
    });
};


export { getData, resetMap, restCountry, reverseOpenCage, openWeather, returnName, covidNews, countryBordergeo, geocountryCode, geoCountryInfo };