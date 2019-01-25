window.onload = PageLoad;

function PageLoad(){
    let appId = 'd9b1ca45de6cd478f71d696f620e077b';
    let units = 'metric';
    let url = `http://api.openweathermap.org/data/2.5/weather?q=Paris&units=${units}&APPID=${appId}`;

    let europe = ["Madrid", "London", "Paris", "Rome", "Moscow"];

    for(let i = 0; i < europe.length; i++){
        fetch(`http://api.openweathermap.org/data/2.5/weather?q=${europe[i]}&units=${units}&APPID=${appId}`).then(result => {
            return result.json();
        }).then(result => {
            init(result);
        })  
        function init(resultFromServer){
            console.log(resultFromServer.name);
            console.log(resultFromServer.weather[0].main);
            console.log(resultFromServer.main.temp);

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

