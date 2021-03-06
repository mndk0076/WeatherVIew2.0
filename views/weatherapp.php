<?php
session_start();

if(!isset($_SESSION['access_token'])){
	header("Location:../index.php");
	exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>WeatherView</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" href="../css/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/fontawesome-pro-5.6.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:300" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <div id="overlay">
        <div class="spinner"></div>
    </div>
    <div id="container">
        <div id="top-section">
            <div id="top-wrapper">
                <div id="box-container">
                    <div class="box-ma">
                        <div class="content-container">
                            <span class="city" id="ma"></span>
                            <span class="desc" id="ma_desc"></span>
                            <span class="temp" id="ma_temp"></span>
                        </div>
                    </div>
                    <div class="box-lo">
                        <div class="content-container">
                            <span class="city" id="lo"></span>
                            <span class="desc" id="lo_desc"></span>
                            <span class="temp" id="lo_temp"></span>
                        </div>
                    </div>
                    <div class="box-pr">
                        <div class="content-container">
                            <span class="city" id="pr"></span>
                            <span class="desc" id="pr_desc"></span>
                            <span class="temp" id="pr_temp"></span>
                        </div>
                    </div>
                    <div class="box-ro">
                        <div class="content-container">
                            <span class="city" id="ro"></span>
                            <span class="desc" id="ro_desc"></span>
                            <span class="temp" id="ro_temp"></span>
                        </div>
                    </div>
                    <div class="box-mo">
                        <div class="content-container">
                            <span class="city" id="mo"></span>
                            <span class="desc" id="mo_desc"></span>
                            <span class="temp" id="mo_temp"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="top-bot-wrapper">
                <div class="region">
                    <span id="region-title" data-toggle="modal" data-target="#exampleModalCenter">Add a City to Favorite <i class="fas fa-plus"></i></span>
                    <input type="text" placeholder="Search" id="search" />
                </div>
            </div>
        </div>
        <div id="left-section">
            <div id="left-container">
                <div id="left-maininfo">
                    <span id="left-city"></span><br>
                    <span id="left-date"></span><br>
                    <span id="left-time"></span><br>
                    <span id="left-icon"></span><br>
                    <span id="left-temp"></span><br>
                </div>
                <div class="left-info">
                    <div class="left-box">
                        <span></span>
                        <span class="spacing" id="high-temp"></span>
                    </div>
                    <div class="right-box">
                        <span></span>
                        <span class="spacing" id="low-temp"></span>
                    </div>
                </div>
                <div class="left-info">
                    <div class="left-box">
                        <span></span>
                        <span class="spacing" id="sunrise"></span>
                    </div>
                    <div class="right-box">
                        <span></span>
                        <span class="spacing" id="sunset"></span>
                    </div>
                </div>
                <div class="left-info">
                    <div class="left-box">
                        <span></span>
                        <span class="spacing" id="humidity"></span>
                    </div>
                    <div class="right-box">
                        <span></span>
                        <span class="spacing" id="pressure"></span>
                    </div>
                </div>
                <div class="left-info">
                    <div class="left-box">
                        <span></span>
                        <span class="spacing" id="wind-speed"></span>
                    </div>
                    <div class="right-box">
                        <span></span>
                        <span class="spacing" id="wind-deg"></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="right-section">
            <div id="right-menu">
                <span id="today-menu">Today</span>
                <span id="forecast-menu">Forecast</span>
            </div>
            <div id="right-container">
                <div id="today">
                    <div class="right-left-col">
                        <span class="right-time" id="time1"></span>
                        <span class="right-time" id="time2"></span>
                        <span class="right-time" id="time3"></span>
                        <span class="right-time" id="time4"></span>
                        <span class="right-time" id="time5"></span>
                        <span class="right-time" id="time6"></span>
                        <span class="right-time" id="time7"></span>
                        <span class="right-time" id="time8"></span>
                    </div>
                    <div class="right-center-col">
                        <span class="right-temp" id="temp1"></span>
                        <span class="right-temp" id="temp2"></span>
                        <span class="right-temp" id="temp3"></span>
                        <span class="right-temp" id="temp4"></span>
                        <span class="right-temp" id="temp5"></span>
                        <span class="right-temp" id="temp6"></span>
                        <span class="right-temp" id="temp7"></span>
                        <span class="right-temp" id="temp8"></span>
                    </div>
                    <div class="right-right-col">
                        <span class="right-desc" id="desc1"></span>
                        <span class="right-desc" id="desc2"></span>
                        <span class="right-desc" id="desc3"></span>
                        <span class="right-desc" id="desc4"></span>
                        <span class="right-desc" id="desc5"></span>
                        <span class="right-desc" id="desc6"></span>
                        <span class="right-desc" id="desc7"></span>
                        <span class="right-desc" id="desc8"></span>
                    </div>
                </div>
                <div id="forecast">
                    <div class="forecast-top">
                        <div class="forecast-container">
                            <div class="forecast-box">
                                <span class="forecast-date" id="date1"></span>
                                <span class="forecast-icon" id="icon1"></span>
                                <span class="forecast-temp" id="ftemp1"></span>
                            </div>
                            <div class="forecast-box">
                                <span class="forecast-date" id="date2"></span>
                                <span class="forecast-icon" id="icon2"></span>
                                <span class="forecast-temp" id="ftemp2"></span>
                            </div>
                            <div class="forecast-box">
                                <span class="forecast-date" id="date3"></span>
                                <span class="forecast-icon" id="icon3"></span>
                                <span class="forecast-temp" id="ftemp3"></span>
                            </div>
                            <div class="forecast-box">
                                <span class="forecast-date" id="date4"></span>
                                <span class="forecast-icon" id="icon4"></span>
                                <span class="forecast-temp" id="ftemp4"></span>
                            </div>
                        </div>
                    </div>
                    <div class="forecast-bottom">
                        <div class="forecast-container">
                            <div class="forecast-box">
                                <span class="forecast-date" id="date5"></span>
                                <span class="forecast-icon" id="icon5"></span>
                                <span class="forecast-temp" id="ftemp5"></span>
                            </div>
                            <div class="forecast-box">
                                <span class="forecast-date" id="date6"></span>
                                <span class="forecast-icon" id="icon6"></span>
                                <span class="forecast-temp" id="ftemp6"></span>
                            </div>
                            <div class="forecast-box">
                                <span class="forecast-date" id="date7"></span>
                                <span class="forecast-icon" id="icon7"></span>
                                <span class="forecast-temp" id="ftemp7"></span>
                            </div>
                            <div class="forecast-box">
                                <span class="forecast-date" id="date8"></span>
                                <span class="forecast-icon" id="icon8"></span>
                                <span class="forecast-temp" id="ftemp8"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalCenterTitle">Add City</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="addCity">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">City</span>
                            </div>
                            <input type="text" name="city" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger sm" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="add_city" value="Add City">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../javascript/weatherscript.js"></script>
    <script src="../javascript/jquery-3.3.1.min.js"></script>
    <script src="../javascript/popper.min.js"></script>
	<script src="../javascript/bootstrap-4.3.1/js/bootstrap.min.js"></script>
	<script src="../javascript/bootstrap-4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="../js/addCity.js"></script>
</body>

</html>