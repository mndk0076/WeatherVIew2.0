let appId = 'd9b1ca45de6cd478f71d696f620e077b';
let units = 'metric';
let url = `http://api.openweathermap.org/data/2.5/weather?q=Paris&units=${units}&APPID=${appId}`;
window.onload = function PageLoad(){
    $('#left-container').hide();
    regionCities();
    search();  
    forecast();
}
function forecast(){
    $(document).ready(function(){
        $("#today-menu").click(function(){
            $("#today").fadeIn(1000);
            $("#forecast").hide();
            $("#today-menu").css("background-color", "coral");
            $("#forecast-menu").css("background-color", "transparent");
        });
    });
    $(document).ready(function(){
        $("#forecast-menu").click(function(){
            $("#forecast").fadeIn(1000);
            $("#today").hide();
            $("#forecast-menu").css("background-color", "coral");
            $("#today-menu").css("background-color", "transparent");
        });
    }); 
    $("#search").on("keydown",function search(e) {
        if(e.keyCode == 13) {
            $('#left-container').hide();
            $('#left-container').fadeIn(1500);
            let searchIn = $(this).val();
            
            fetch(`http://api.openweathermap.org/data/2.5/forecast?q=${searchIn}&cnt=7&units=${units}&APPID=${appId}`).then(result => {
                return result.json();
            }).then(result => {
                init(result);
            })
            function init(resultFromServer){
                for(let i = 0; i < resultFromServer.list.length; i++){
                    let time = resultFromServer.list[i].dt;
                    let desc = resultFromServer.list[i].weather[0].description;  
                    let temp = resultFromServer.list[i].main.temp;  
                    let timeID = 'time'+[i+2];
                    let descID = 'desc'+[i+2];
                    let tempID = 'temp'+[i+2];

                    document.getElementById(timeID).innerHTML = timeFormat(time);   
                    document.getElementById(descID).innerHTML = desc.charAt(0).toUpperCase() + desc.slice(1);   
                    document.getElementById(tempID).innerHTML = temp.toFixed(0) + "&#8451";
                }
            }
        }
    });
}
function search() {
     $("#search").on("keydown",function search(e) {
        if(e.keyCode == 13) {
            $('#left-container').hide();
            $('#left-container').show();
            let searchIn = $(this).val();
            
            fetch(`http://api.openweathermap.org/data/2.5/weather?q=${searchIn}&units=${units}&APPID=${appId}`).then(result => {
                return result.json();
            }).then(result => {
                init(result);
            }) 
            function init(resultFromServer){
                let city = resultFromServer.name;
                let temp = resultFromServer.main.temp;
                let low_temp = resultFromServer.main.temp_min;
                let high_temp = resultFromServer.main.temp_max;
                let humidity = resultFromServer.main.humidity;
                let pressure = resultFromServer.main.pressure;
                let wind_speed = resultFromServer.wind.speed * 1.60934;
                let wind_deg = resultFromServer.wind.deg;
                let lat = resultFromServer.coord.lat;
                let lon = resultFromServer.coord.lon;
                let desc = resultFromServer.weather[0].description;  
                
                
                $(function(){
                    $.get(`http://api.timezonedb.com/v2.1/get-time-zone?key=4DVH3B4RX5SQ&format=json&by=position&lat=${lat}&position&lng=${lon}`)
                    .done(function(json){
                        let time = new Date(json.timestamp);
                        let country = json.countryName;
                        document.getElementById('left-time').innerHTML = timeFormatUTC(time);   
                        document.getElementById('left-city').innerHTML = city + ", " + country;
                    });
                }); 
                console.log(resultFromServer.weather[0].main);
                switch (resultFromServer.weather[0].main){
                    case 'Clear':
                            document.getElementById('left-icon').innerHTML = '<i class="fal fa-sun-cloud"></i>';
                            break;
                    case 'Clouds':
                            document.getElementById('left-icon').innerHTML = '<i class="fal fa-clouds"></i>';
                            break;
                    case 'Thunderstorm':
                            document.getElementById('left-icon').innerHTML = '<i class="fal fa-thunderstorm"></i>';
                            break;
                    case 'Snow':
                            document.getElementById('left-icon').innerHTML = '<i class="fal fa-snowflakes"></i>';
                            break;
                    case 'Rain':
                    case 'Drizzle':
                    case 'Mist':
                            document.getElementById('left-icon').innerHTML = '<i class="fal fa-cloud-rain"></i>';
                            break;
                    default:
                            break;  
                }
                document.getElementById('left-temp').innerHTML = temp.toFixed() + "&#8451";
                document.getElementById('left-date').innerHTML = dateFormat(resultFromServer.dt);
                document.getElementById('high-temp').innerHTML = high_temp.toFixed(0) + "&#8451";
                document.getElementById('low-temp').innerHTML = low_temp.toFixed(0) + "&#8451";
                document.getElementById('humidity').innerHTML = humidity + "%";
                document.getElementById('pressure').innerHTML = pressure + " hPa";
                document.getElementById('wind-speed').innerHTML = wind_speed.toFixed(0) + "km/h";
                document.getElementById('wind-deg').innerHTML = wind_deg.toFixed(0) + "&#xB0";                
                document.getElementById('sunrise').innerHTML = timeFormat(resultFromServer.sys.sunrise);                
                document.getElementById('sunset').innerHTML = timeFormat(resultFromServer.sys.sunset);  
                document.getElementById('time1').innerHTML = 'Now';   
                document.getElementById('desc1').innerHTML = desc.charAt(0).toUpperCase() + desc.slice(1);   
                document.getElementById('temp1').innerHTML = temp.toFixed(0) + "&#8451";
                console.log(resultFromServer.sys.sunrise);
            }
        }
     });
}
function dateFormat(resultFromServer){
    var monthNames = [
    "January", "February", "March",
    "April", "May", "June", "July",
    "August", "September", "October",
    "November", "December"];

    let d = new Date(resultFromServer * 1000);
    let day = d.getDate();
    let monthIndex = d.getMonth();

    return day + ' ' + monthNames[monthIndex]; 
}
function timeFormat(resultFromServer){
        let d = new Date(resultFromServer * 1000), 
        hh = d.getHours(),
        h = hh,
        min = ('0' + d.getMinutes()).slice(-2), 
        ampm = 'AM',
        time;

        if (hh > 12) {
            h = hh - 12;
            ampm = 'PM';
        } else if (hh === 12) {
            h = 12;
            ampm = 'PM';
        } else if (hh == 0) {
            h = 12;
        }

        time = h + ':' + min + ' ' + ampm;
        return time;
}
function timeFormatUTC(resultFromServer){
        let d = new Date(resultFromServer * 1000), 
        hh = d.getUTCHours(),
        h = hh,
        min = ('0' + d.getUTCMinutes()).slice(-2),   
        ampm = 'AM',
        time;

        if (hh > 12) {
            h = hh - 12;
            ampm = 'PM';
        } else if (hh === 12) {
            h = 12;
            ampm = 'PM';
        } else if (hh == 0) {
            h = 12;
        }

        time = h + ':' + min + ' ' + ampm;
        return time;
}
function regionCities(){
    let europe = ["Madrid", "London", "Paris", "Rome", "Moscow"];

    for(let i = 0; i < europe.length; i++){
        fetch(`http://api.openweathermap.org/data/2.5/weather?q=${europe[i]}&units=${units}&APPID=${appId}`).then(result => {
            return result.json();
        }).then(result => {
            init(result);
        })  
        function init(resultFromServer){
            let city = resultFromServer.name;
            let desc = resultFromServer.weather[0].main;
            let temp = resultFromServer.main.temp;
    
            if(city === 'Madrid'){
                document.getElementById('ma').innerHTML = city;
                document.getElementById('ma_desc').innerHTML = desc;
                document.getElementById('ma_temp').innerHTML = temp.toFixed(0) + "&#8451";
            }else if (city === 'London'){
                document.getElementById('lo').innerHTML = city;
                document.getElementById('lo_desc').innerHTML = desc;
                document.getElementById('lo_temp').innerHTML = temp.toFixed(0) + "&#8451";   
            }else if (city === 'Paris'){
                document.getElementById('pr').innerHTML = city;
                document.getElementById('pr_desc').innerHTML = desc;
                document.getElementById('pr_temp').innerHTML = temp.toFixed(0) + "&#8451";  
            }else if (city === 'Rome'){
                document.getElementById('ro').innerHTML = city;
                document.getElementById('ro_desc').innerHTML = desc;
                document.getElementById('ro_temp').innerHTML = temp.toFixed(0) + "&#8451";  
            }else if (city === 'Moscow'){
                document.getElementById('mo').innerHTML = city;
                document.getElementById('mo_desc').innerHTML = desc;
                document.getElementById('mo_temp').innerHTML = temp.toFixed(0) + "&#8451";  
            }
        }
    }
}