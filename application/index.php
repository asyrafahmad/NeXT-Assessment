<!DOCTYPE html>
<html>
   <head>
       
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <script type="text/javascript">

        function Checking(){

            var time = document.getElementById('time').value;
            var date = document.getElementById('date').value;

            var current_timestamp = date + ' ' + time,
            dArr = current_timestamp.split('-'),
            ts = new Date(dArr[1] + "-" + dArr[0] + "-" + dArr[2]).getTime(); // 1379392680000

            var timestamp = Date.parse(current_timestamp)/1000;

           
            var iss_less60  = timestamp - 3600;
            var iss_less50  = timestamp - 3000;
            var iss_less40  = timestamp - 2400;
            var iss_less30  = timestamp - 1800;
            var iss_less20  = timestamp - 1200;
            var iss_less10  = timestamp - 600;
            var exact_timestamp  = timestamp;
            var iss_more10  = timestamp + 600;
            var iss_more20  = timestamp + 1200;
            var iss_more30  = timestamp + 1800;
            var iss_more40  = timestamp + 2400;
            var iss_more50  = timestamp + 3000;
            var iss_more60  = timestamp + 3600;

            var iss_value = iss_less60 + ',' + iss_less50 + ',' + iss_less40 + ',' + iss_less30 + ',' + iss_less20 + ',' + iss_less10 + ',' + exact_timestamp + ',' + iss_more10 + ',' + iss_more20 + ',' + iss_more30 + ',' + iss_more40 + ',' + iss_more50 + ',' + iss_more60;

            //GET API ISS
            // var req = new XMLHttpRequest();
            // req.open('GET', 'https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='+iss_value+'&units=miles', false);
            
            // req.send(null);
            
            // document.getElementById("demo").innerHTML = req.responseText
            // //GET API ISS

            // var result = req.responseText;

            $( document ).ready(function() {
                $.ajax({
                    'url': 'https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='+iss_value+'&units=miles',
                    'type': 'GET',
                    'dataType': 'json',
                    'success': function(response) {
                        
                        // Timestamp
                        document.getElementById("result1").innerHTML = JSON.stringify(response[0]['timestamp'])
                        document.getElementById("result2").innerHTML = JSON.stringify(response[1]['timestamp'])
                        document.getElementById("result3").innerHTML = JSON.stringify(response[2]['timestamp'])
                        document.getElementById("result4").innerHTML = JSON.stringify(response[3]['timestamp'])
                        document.getElementById("result5").innerHTML = JSON.stringify(response[4]['timestamp'])
                        document.getElementById("result6").innerHTML = JSON.stringify(response[5]['timestamp'])
                        document.getElementById("result7").innerHTML = JSON.stringify(response[6]['timestamp'])
                        document.getElementById("result8").innerHTML = JSON.stringify(response[7]['timestamp'])
                        document.getElementById("result9").innerHTML = JSON.stringify(response[8]['timestamp'])
                        document.getElementById("result10").innerHTML = JSON.stringify(response[9]['timestamp'])
                        document.getElementById("result11").innerHTML = JSON.stringify(response[10]['timestamp'])
                        document.getElementById("result12").innerHTML = JSON.stringify(response[11]['timestamp'])

                        // Datetime
                        document.getElementById("datetime1").innerHTML = new Date(JSON.stringify(response[0]['timestamp'])*1000)
                        document.getElementById("datetime2").innerHTML = new Date(JSON.stringify(response[1]['timestamp'])*1000)
                        document.getElementById("datetime3").innerHTML = new Date(JSON.stringify(response[2]['timestamp'])*1000)
                        document.getElementById("datetime4").innerHTML = new Date(JSON.stringify(response[3]['timestamp'])*1000)
                        document.getElementById("datetime5").innerHTML = new Date(JSON.stringify(response[4]['timestamp'])*1000)
                        document.getElementById("datetime6").innerHTML = new Date(JSON.stringify(response[5]['timestamp'])*1000)
                        document.getElementById("datetime7").innerHTML = new Date(JSON.stringify(response[6]['timestamp'])*1000)
                        document.getElementById("datetime8").innerHTML = new Date(JSON.stringify(response[7]['timestamp'])*1000)
                        document.getElementById("datetime9").innerHTML = new Date(JSON.stringify(response[8]['timestamp'])*1000)
                        document.getElementById("datetime10").innerHTML = new Date(JSON.stringify(response[9]['timestamp'])*1000)
                        document.getElementById("datetime11").innerHTML = new Date(JSON.stringify(response[10]['timestamp'])*1000)
                        document.getElementById("datetime12").innerHTML = new Date(JSON.stringify(response[11]['timestamp'])*1000)
                        
                        // Location (Latitude, Longitude)
                        document.getElementById("location1").innerHTML = 'Latitude: '+JSON.stringify(response[0]['latitude'])+'<br> Longitude: '+JSON.stringify(response[0]['longitude'])
                        document.getElementById("location2").innerHTML = 'Latitude: '+JSON.stringify(response[1]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[1]['longitude'])
                        document.getElementById("location3").innerHTML = 'Latitude: '+JSON.stringify(response[2]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[2]['longitude'])
                        document.getElementById("location4").innerHTML = 'Latitude: '+JSON.stringify(response[3]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[3]['longitude'])
                        document.getElementById("location5").innerHTML = 'Latitude: '+JSON.stringify(response[4]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[4]['longitude'])
                        document.getElementById("location6").innerHTML = 'Latitude: '+JSON.stringify(response[5]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[5]['longitude'])
                        document.getElementById("location7").innerHTML = 'Latitude: '+JSON.stringify(response[6]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[6]['longitude'])
                        document.getElementById("location8").innerHTML = 'Latitude: '+JSON.stringify(response[7]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[7]['longitude'])
                        document.getElementById("location9").innerHTML = 'Latitude: '+JSON.stringify(response[8]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[8]['longitude'])
                        document.getElementById("location10").innerHTML = 'Latitude: '+JSON.stringify(response[9]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[9]['longitude'])
                        document.getElementById("location11").innerHTML = 'Latitude: '+JSON.stringify(response[10]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[10]['longitude'])
                        document.getElementById("location12").innerHTML = 'Latitude: '+JSON.stringify(response[11]['timestamp'])+'<br> Longitude: '+JSON.stringify(response[11]['longitude'])

                        // Weather
                        document.getElementById("weather1").innerHTML = JSON.stringify(response[0]['visibility'])
                        document.getElementById("weather2").innerHTML = JSON.stringify(response[1]['visibility'])
                        document.getElementById("weather3").innerHTML = JSON.stringify(response[2]['visibility'])
                        document.getElementById("weather4").innerHTML = JSON.stringify(response[3]['visibility'])
                        document.getElementById("weather5").innerHTML = JSON.stringify(response[4]['visibility'])
                        document.getElementById("weather6").innerHTML = JSON.stringify(response[5]['visibility'])
                        document.getElementById("weather7").innerHTML = JSON.stringify(response[6]['visibility'])
                        document.getElementById("weather8").innerHTML = JSON.stringify(response[7]['visibility'])
                        document.getElementById("weather9").innerHTML = JSON.stringify(response[8]['visibility'])
                        document.getElementById("weather10").innerHTML = JSON.stringify(response[9]['visibility'])
                        document.getElementById("weather11").innerHTML = JSON.stringify(response[10]['visibility'])
                        document.getElementById("weather12").innerHTML = JSON.stringify(response[11]['visibility'])


                        var latitude1 = response[0]['latitude']
                        var longitude1 = response[0]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude1+','+longitude1,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res1) {
                                
                                document.getElementById("display_location1").innerHTML = JSON.stringify(res1.map_url)
                                document.getElementById("country1").innerHTML = JSON.stringify(res1.country_code)
                                
                            }
                        });
                        
                        var latitude2 = response[1]['latitude']
                        var longitude2 = response[1]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude2+','+longitude2,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res2) {
                                
                                document.getElementById("display_location2").innerHTML = JSON.stringify(res2.map_url)
                                document.getElementById("country2").innerHTML = JSON.stringify(res2.country_code)

                               
                            }
                        });
                        var latitude3 = response[2]['latitude']
                        var longitude3 = response[2]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude3+','+longitude3,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res3) {
                                
                                document.getElementById("display_location3").innerHTML = JSON.stringify(res3.map_url)
                                document.getElementById("country3").innerHTML = JSON.stringify(res3.country_code)

                               
                            }
                        });

                        var latitude4 = response[3]['latitude']
                        var longitude4 = response[3]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude4+','+longitude4,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res4) {
                                
                                document.getElementById("display_location4").innerHTML = JSON.stringify(res4.map_url)
                                document.getElementById("country4").innerHTML = JSON.stringify(res4.country_code)

                               
                            }
                        });
                        var latitude5 = response[4]['latitude']
                        var longitude5 = response[4]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude5+','+longitude5,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res5) {
                                
                                document.getElementById("display_location5").innerHTML = JSON.stringify(res5.map_url)
                                document.getElementById("country5").innerHTML = JSON.stringify(res5.country_code)

                               
                            }
                        });

                        var latitude6 = response[5]['latitude']
                        var longitude6 = response[5]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude6+','+longitude6,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res6) {
                                
                                document.getElementById("display_location6").innerHTML = JSON.stringify(res6.map_url)
                                document.getElementById("country6").innerHTML = JSON.stringify(res6.country_code)

                               
                            }
                        });
                        var latitude7 = response[6]['latitude']
                        var longitude7 = response[6]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude7+','+longitude7,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res7) {
                                
                                document.getElementById("display_location7").innerHTML = JSON.stringify(res7.map_url)
                                document.getElementById("country7").innerHTML = JSON.stringify(res7.country_code)

                               
                            }
                        });

                        var latitude8 = response[7]['latitude']
                        var longitude8 = response[7]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude8+','+longitude8,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res8) {
                                
                                document.getElementById("display_location8").innerHTML = JSON.stringify(res8.map_url)
                                document.getElementById("country8").innerHTML = JSON.stringify(res8.country_code)

                               
                            }
                        });
                        var latitude9 = response[8]['latitude']
                        var longitude9 = response[8]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude9+','+longitude9,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res9) {
                                
                                document.getElementById("display_location9").innerHTML = JSON.stringify(res9.map_url)
                                document.getElementById("country9").innerHTML = JSON.stringify(res9.country_code)

                               
                            }
                        });

                        var latitude10 = response[9]['latitude']
                        var longitude10 = response[9]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude10+','+longitude10,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res10) {
                                
                                document.getElementById("display_location10").innerHTML = JSON.stringify(res10.map_url)
                                document.getElementById("country10").innerHTML = JSON.stringify(res10.country_code)

                               
                            }
                        });
                        var latitude11 = response[10]['latitude']
                        var longitude11 = response[10]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude11+','+longitude11,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res11) {
                                
                                document.getElementById("display_location11").innerHTML = JSON.stringify(res11.map_url)
                                document.getElementById("country11").innerHTML = JSON.stringify(res11.country_code)

                               
                            }
                        });

                        var latitude12 = response[11]['latitude']
                        var longitude12 = response[11]['longitude']

                        $.ajax({
                            'url': 'https://api.wheretheiss.at/v1/coordinates/'+latitude12+','+longitude12,
                            'type': 'GET',
                            'dataType': 'json',
                            'success': function(res12) {
                                
                                document.getElementById("display_location12").innerHTML = JSON.stringify(res12.map_url)
                                document.getElementById("country12").innerHTML = JSON.stringify(res12.country_code)

                               
                            }
                        });


                        var date1 = new Date(JSON.stringify(response[0]['timestamp'])*1000)
                        var date2 = new Date(JSON.stringify(response[1]['timestamp'])*1000)
                        var date3 = new Date(JSON.stringify(response[2]['timestamp'])*1000)
                        var date4 = new Date(JSON.stringify(response[3]['timestamp'])*1000)
                        var date5 = new Date(JSON.stringify(response[4]['timestamp'])*1000)
                        var date6 = new Date(JSON.stringify(response[5]['timestamp'])*1000)
                        var date7 = new Date(JSON.stringify(response[6]['timestamp'])*1000)
                        var date8 = new Date(JSON.stringify(response[7]['timestamp'])*1000)
                        var date9 = new Date(JSON.stringify(response[8]['timestamp'])*1000)
                        var date10 = new Date(JSON.stringify(response[9]['timestamp'])*1000)
                        var date11 = new Date(JSON.stringify(response[10]['timestamp'])*1000)
                        var date12 = new Date(JSON.stringify(response[11]['timestamp'])*1000)

                       
                        var time = date1.slice(-8);

                        console.log(time);


                        google.charts.load('current', {packages: ['corechart', 'line']});
                        google.charts.setOnLoadCallback(drawCrosshairs);

                        function drawCrosshairs() {
                            var data = new google.visualization.DataTable();
                            data.addColumn('number', 'X');
                            data.addColumn('number', 'Time');

                            data.addRows([

                                // for($i = 0; $i )
                                [0, 0],   
                                [1, 10],   
                                [2, 2], 
                            ]);

                            var options = {
                                hAxis: {
                                    title: 'Time'
                                },
                                vAxis: {
                                    title: 'Popularity'
                                },
                                colors: ['#a52714', '#097138'],
                                crosshair: {
                                    color: '#000',
                                    trigger: 'selection'
                                }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                            chart.draw(data, options);
                            chart.setSelection([{row: 38, column: 1}]);

                            }












                    }
                });
            });

            

          

            

            
        }

           

      </script>
      <style>

        .title{
         margin-bottom: 10px;
         text-align:center;
         width: 210px;
         color:green;
         border: solid black 2px;
         }
  
         input[type="button"]
         {
         background-color:green;
         color: black;
         border: solid black 2px;
         width:100%
         }
  
         input[type="text"]
         {
         background-color:white;
         border: solid black 2px;
         width:100%
         }

         table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
      </style>
   </head>
   <body>

         <div><h1><b>NeXT Assessment</b></h1></div>
         <h4>Please select time and date : </h4>
         <input style='width:100px' type='time' name='time' id='time'></input>
         <input style='width:100px' type='date' name='date' id='date'></input>
         <input style='width:100px' type='button' name='submit' value='submit' placeholder='Submit' onclick="Checking()"></input>
         <br>
         <br>
         <div>
             Main Task : <br><br>

             <table>
                <tr>
                    <th>No.</th>
                    <th>Timestamp</th>
                    <th>Datetime (Malaysia Time - GMT+0800)</th>
                    <th>Location</th>
                    <th>Country Code</th>
                    <th>URL location (Google Map)</th>
                    <th>Weather</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><p id="result1"></p></td>
                    <td><p id="datetime1"></p></td>
                    <td><p id="location1"></p></td>
                    <td><p id="country1"></p></td>
                    <td><p id="display_location1"></p></td>
                    <td><p id="weather1"></p></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><p id="result2"></p></td>
                    <td><p id="datetime2"></p></td>
                    <td><p id="location2"></p></td>
                    <td><p id="country2"></p></td>
                    <td><p id="display_location2"></p></td>
                    <td><p id="weather2"></p></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><p id="result3"></p></td>
                    <td><p id="datetime3"></p></td>
                    <td><p id="location3"></p></td>
                    <td><p id="country3"></p></td>
                    <td><p id="display_location3"></p></td>
                    <td><p id="weather3"></p></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><p id="result4"></p></td>
                    <td><p id="datetime4"></p></td>
                    <td><p id="location4"></p></td>
                    <td><p id="country4"></p></td>
                    <td><p id="display_location4"></p></td>
                    <td><p id="weather4"></p></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><p id="result5"></p></td>
                    <td><p id="datetime5"></p></td>
                    <td><p id="location5"></p></td>
                    <td><p id="country5"></p></td>
                    <td><p id="display_location5"></p></td>
                    <td><p id="weather5"></p></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><p id="result6"></p></td>
                    <td><p id="datetime6"></p></td>
                    <td><p id="location6"></p></td>
                    <td><p id="country6"></p></td>
                    <td><p id="display_location6"></p></td>
                    <td><p id="weather6"></p></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><p id="result7"></p></td>
                    <td><p id="datetime7"></p></td>
                    <td><p id="location7"></p></td>
                    <td><p id="country7"></p></td>
                    <td><p id="display_location7"></p></td>
                    <td><p id="weather7"></p></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><p id="result8"></p></td>
                    <td><p id="datetime8"></p></td>
                    <td><p id="location8"></p></td>
                    <td><p id="country8"></p></td>
                    <td><p id="display_location8"></p></td>
                    <td><p id="weather8"></p></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td><p id="result9"></p></td>
                    <td><p id="datetime9"></p></td>
                    <td><p id="location9"></p></td>
                    <td><p id="country9"></p></td>
                    <td><p id="display_location9"></p></td>
                    <td><p id="weather9"></p></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><p id="result10"></p></td>
                    <td><p id="datetime10"></p></td>
                    <td><p id="location10"></p></td>
                    <td><p id="country10"></p></td>
                    <td><p id="display_location10"></p></td>
                    <td><p id="weather10"></p></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td><p id="result11"></p></td>
                    <td><p id="datetime11"></p></td>
                    <td><p id="location11"></p></td>
                    <td><p id="country11"></p></td>
                    <td><p id="display_location11"></p></td>
                    <td><p id="weather11"></p></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td><p id="result12"></p></td>
                    <td><p id="datetime12"></p></td>
                    <td><p id="location12"></p></td>
                    <td><p id="country12"></p></td>
                    <td><p id="display_location12"></p></td>
                    <td><p id="weather12"></p></td>
                </tr>
                </table>
         </div>
         
         <br>
         <br>
            Extension A: Visualisation : <br>
           <div id="chart_div"></div>
   </body>
</html>   