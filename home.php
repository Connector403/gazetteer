﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Gazetteer worldwide</title>
    !-- Description -->
    <meta name="description" content="AJAX/PHP/CURL/JSON golocation app">


    <!-- Leaflet -->
    <link rel="stylesheet" href="libs/vendors/leaflet/leaflet.css">



    <!-- Bootstrap core CSS -->
    <link href="libs/vendors/bootstrap-4/css/bootstrap.min.css" rel="stylesheet">
    

    
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="libs/css/styles.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="d-flex wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="sidebar-wraooer">
            <div class="sidebar-header">
                <h3>Gazetteer</h3>
            </div>

            <ul class="list-unstyled components">
                <p>About your country</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Your Country</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">

                        <li>
                            <a href="#"><strong>CountryName: </strong><span class="data" id="countryName"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>Population: </strong><span class="data" id="Population"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>CapitalCity: </strong><span class="data" id="capitalCity"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>continentName: </strong><span class="data" id="continentName"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>Flag: </strong></a><img id="flag" src=""></img></a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Capital Weather right now</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#"><strong>Capital Weather: </strong><span id="weather"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>Feels Like: </strong><span id="feelsLike"></span> &#8451;</a>
                        </li>

                        <li>
                            <a href="#"><strong> Temperature: </strong><span id="weathertemp"></span> &#8451;</a>
                        </li>
                        <li>
                            <a href="#"><strong> Wind: </strong><span id="weatherWind"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong> Humidity: </strong><span id="weatherHumidity"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>Another Name: </strong><span class="data" id="acountryName"></span></a>
                        </li>

                    </ul>


                </li>
                <li class="active">
                    <a href="#covidSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Covid News </a>
                    <ul class="collapse list-unstyled" id="covidSubmenu">
                        <li>
                            <a href="#"><strong>Selected Country: </strong><span id="country"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>Total Population: </strong><span id="totalPop"></span> </a>
                        </li>

                        <li>
                            <a href="#"><strong> Cases: new : </strong><span id="newCases"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong> Cases: Active : </strong><span id="activeCase"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong> Cases: Critical </strong><span id="criticalCases"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>Cases: Recovered </strong><span class="data" id="recovered"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong> Cases: Total </strong><span id="totalCases"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong> Deaths: Total </strong><span id="totalDeaths"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong>  Deaths: New </strong><span id="newDeaths"></span></a>
                        </li>
                        <li>
                            <a href="#"><strong> Data New </strong><span id="date"></span></a>
                        </li>


                    </ul>


                </li>

            </ul>

        </nav>


        <!-- Page Content  -->
        <div id="content">

            <nav id="content-page" class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <select id="selCountry">
                                    <option>Choose a Country</option>
                                    <option disabled>_________</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Antigua-and-Barbuda">Antigua-and-Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia-and-Herzegovina">Bosnia-and-Herzegovina</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina-Faso">Burkina-Faso</option>
                                    <option value="Cabo-Verde">Cabo-Verde</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="CAR">CAR</option>
                                    <option value="Cayman-Islands">Cayman-Islands</option>
                                    <option value="Channel-Islands">Channel-Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Costa-Rica">Costa-Rica</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cura&ccedil;ao">Cura&ccedil;ao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czechia">Czechia</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Diamond-Princess-">Diamond-Princess-</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominican-Republic">Dominican-Republic</option>
                                    <option value="DRC">DRC</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El-Salvador">El-Salvador</option>
                                    <option value="Eritrea">Eritrea </option>
                                    <option value="Estonia"> Estonia</option>
                                    <option value="Eswatini">Eswatini </option>
                                    <option value="Ethiopia">Ethiopia </option>
                                    <option value="Faeroe-Islands">Faeroe-Islands </option>
                                    <option value="Fiji"> Fiji</option>
                                    <option value="Finland">Finland </option>
                                    <option value="France">France </option>
                                    <option value="French-Guiana">French-Guiana </option>
                                    <option value="French-Polynesia">French-Polynesia </option>
                                    <option value="Gabon"> Gabon</option>
                                    <option value="Gambia">Gambia </option>
                                    <option value="Georgia"> Georgia</option>
                                    <option value="Germany">Germany </option>
                                    <option value="Ghana">Ghana </option>
                                    <option value="Gibraltar"> Gibraltar</option>
                                    <option value="Greece"> Greece</option>
                                    <option value="Greenland">Greenland </option>
                                    <option value="Guadeloupe">Guadeloupe </option>
                                    <option value="Guam">Guam </option>
                                    <option value="Guatemala">Guatemala </option>
                                    <option value="Guinea"> Guinea</option>
                                    <option value="Guyana"> Guyana</option>
                                    <option value="Haiti"> Haiti</option>
                                    <option value="Honduras">Honduras </option>
                                    <option value="Hong-Kong">Hong-Kong </option>
                                    <option value="Hungary"> Hungary</option>
                                    <option value="Iceland">Iceland </option>
                                    <option value="India"> India</option>
                                    <option value="Indonesia">Indonesia </option>
                                    <option value="Iran">Iran </option>
                                    <option value="Iraq"> Iraq</option>
                                    <option value="Ireland"> Ireland</option>
                                    <option value="Isle-of-Man">Isle-of-Man </option>
                                    <option value="Israel"> Israel</option>
                                    <option value="Italy"> Italy</option>
                                    <option value="Ivory-Coast">Ivory-Coast </option>
                                    <option value="Jamaica">Jamaica </option>
                                    <option value="Japan">Japan </option>
                                    <option value="Jordan">Jordan </option>
                                    <option value="Kazakhstan">Kazakhstan </option>
                                    <option value="Kenya"> Kenya</option>
                                    <option value="Kuwait"> Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan </option>
                                    <option value="Latvia"> Latvia</option>
                                    <option value="Lebanon"> Lebanon</option>
                                    <option value="Liberia"> Liberia</option>
                                    <option value="Liechtenstein">Liechtenstein </option>
                                    <option value="Lithuania"> Lithuania</option>
                                    <option value="Luxembourg">Luxembourg </option>
                                    <option value="Macao"> Macao</option>
                                    <option value="Madagascar">Madagascar </option>
                                    <option value="Malaysia"> Malaysia</option>
                                    <option value="Maldives">Maldives </option>
                                    <option value="Malta">Malta </option>
                                    <option value="Martinique">Martinique </option>
                                    <option value="Mauritania">Mauritania </option>
                                    <option value="Mauritius"> Mauritius</option>
                                    <option value="Mayotte">Mayotte </option>
                                    <option value="Mexico">Mexico </option>
                                    <option value="Moldova"> Moldova</option>
                                    <option value="Monaco"> Monaco</option>
                                    <option value="Mongolia"> Mongolia</option>
                                    <option value="Montenegro">Montenegro </option>
                                    <option value="Montserrat"> Montserrat</option>
                                    <option value="Morocco"> Morocco</option>
                                    <option value="Namibia">Namibia </option>
                                    <option value="Nepal"> Nepal</option>
                                    <option value="Netherlands">Netherlands </option>
                                    <option value="New-Caledonia"> New-Caledonia</option>
                                    <option value="New-Zealand"> New-Zealand</option>
                                    <option value="Nicaragua">Nicaragua </option>
                                    <option value="Niger"> Niger</option>
                                    <option value="Nigeria"> Nigeria</option>
                                    <option value="North-Macedonia"> </option>
                                    <option value="Norway">Norway </option>
                                    <option value="Oman"> Oman</option>
                                    <option value="Pakistan"> Pakistan</option>
                                    <option value="Palestine"> Palestine</option>
                                    <option value="Panama">Panama </option>
                                    <option value="Papua-New-Guinea">Papua-New-Guinea </option>
                                    <option value="Paraguay">Paraguay </option>
                                    <option value="Peru"> Peru</option>
                                    <option value="Philippines"> Philippines</option>
                                    <option value="Poland"> Poland</option>
                                    <option value="Portugal">Portugal </option>
                                    <option value="Puerto-Rico"> Puerto-Rico</option>
                                    <option value="Qatar">Qatar </option>
                                    <option value="R&eacute;union"> R&eacute;union</option>
                                    <option value="Romania"> Romania</option>
                                    <option value="Russia">v </option>
                                    <option value="Rwanda">Rwanda </option>
                                    <option value="S.-Korea"> S.-Korea</option>
                                    <option value="Saint-Lucia"> Saint-Lucia</option>
                                    <option value="Saint-Martin">Saint-Martin </option>
                                    <option value="San-Marino">San-Marino </option>
                                    <option value="Saudi-Arabia">Saudi-Arabia </option>
                                    <option value="Senegal"> Senegal</option>
                                    <option value="Serbia"> Serbia</option>
                                    <option value="Seychelles">Seychelles </option>
                                    <option value="Singapore">Singapore </option>
                                    <option value="Sint-Maarten"> Sint-Maarten</option>
                                    <option value="Slovakia">Slovakia </option>
                                    <option value="Slovenia"> Slovenia</option>
                                    <option value="Somalia"> Somalia</option>
                                    <option value="South-Africa"> South-Africa</option>
                                    <option value="Spain"> Spain</option>
                                    <option value="Sri-Lanka"> Sri-Lanka</option>
                                    <option value="St.-Barth"> </option>
                                    <option value="St.-Vincent-Grenadines"> St.-Vincent-Grenadines</option>
                                    <option value="Sudan">Sudan </option>
                                    <option value="Suriname"> Suriname</option>
                                    <option value="Sweden">Sweden </option>
                                    <option value="Switzerland"> Switzerland</option>
                                    <option value="Taiwan"> Taiwan</option>
                                    <option value="Tanzania" Tanzania> </option>
                                    <option value="Thailand"> Thailand</option>
                                    <option value="Timor-Leste"> Timor-Leste</option>
                                    <option value="Togo"> Togo</option>
                                    <option value="Trinidad-and-Tobago">Trinidad-and-Tobago </option>
                                    <option value="Tunisia">Tunisia </option>
                                    <option value="Turkey"> Turkey</option>
                                    <option value="U.S.-Virgin-Islands"> U.S.-Virgin-Islands</option>
                                    <option value="UAE">UAE </option>
                                    <option value="Uganda"> Uganda</option>
                                    <option value="uk"> UK</option>
                                    <option value="Ukraine">Ukraine </option>
                                    <option value="Uruguay">Uruguay </option>
                                    <option value="USA"> USA</option>
                                    <option value="Uzbekistan"> Uzbekistan</option>
                                    <option value="Vatican-City"> Vatican-City</option>
                                    <option value="Venezuela">Venezuela </option>
                                    <option value="Vietnam">Vietnam </option>
                                    <option value="Zambia"> Zambia</option>
                                    <option value="Zimbabwe"> Zimbabwe</option>
                                </select>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div id="mapid-001"></div>


        </div>
       


    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="libs/vendors/bootstrap-4/js/bootstrap.min.js"></script>
  
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


   
    <script type="application/javascript" src="libs/vendors/leaflet/leaflet.js"></script>
    <script type="application/application/json" src="countryBorders.geo.json"></script>
    <script type="application/application/json" src="countries.geo.json"></script>
    <script type="module" src="libs/js/fetch-data.js"></script>
    <script type="module" src="libs/js/script.js?newversion"></script>
    <script type="application/javascript" src="libs/js/toggleside.js"></script>

</body>

</html>