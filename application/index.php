<!DOCTYPE html>
<html>
   <head>
      <script>

        function Checking(){

            var time = document.getElementById('time').value;
            var date = document.getElementById('date').value;

            var current_timestamp = date + ' ' + time,
            dArr = current_timestamp.split('-'),
            ts = new Date(dArr[1] + "-" + dArr[0] + "-" + dArr[2]).getTime(); // 1379392680000

            var timestamp = Date.parse(current_timestamp)/1000;

           
            var iss_less60  = timestamp - 60;
            var iss_less50  = timestamp - 50;
            var iss_less40  = timestamp - 40;
            var iss_less30  = timestamp - 30;
            var iss_less20  = timestamp - 20;
            var iss_less10  = timestamp - 10;
            var exact_timestamp  = timestamp;
            var iss_more10  = timestamp + 10;
            var iss_more20  = timestamp + 20;
            var iss_more30  = timestamp + 30;
            var iss_more40  = timestamp + 40;
            var iss_more50  = timestamp + 50;
            var iss_more60  = timestamp + 60;

            var iss_value = iss_less60 + ',' + iss_less50 + ',' + iss_less40 + ',' + iss_less30 + ',' + iss_less20 + ',' + iss_less10 + ',' + exact_timestamp + ',' + iss_more10 + ',' + iss_more20 + ',' + iss_more30 + ',' + iss_more40 + ',' + iss_more50 + ',' + iss_more60;

            //GET API ISS
            var req = new XMLHttpRequest();
            req.open('GET', 'https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps='+iss_value+'&units=miles', false);
            
            req.send(null);
            
            document.getElementById("demo").innerHTML = req.responseText
            //GET API ISS
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
      </style>
   </head>
   <body>

         <div>NeXT Assessment</div>
         <br>
         Please select time and date : <br><br>
         <input style='width:100px' type='time' name='time' id='time'></input>
         <input style='width:100px' type='date' name='date' id='date'></input>
         <input style='width:100px' type='button' name='submit' value='submit' placeholder='Submit' onclick="Checking()"></input>
         <br>
         <br>
         <br>
         <br>
         <div>
             Result : <br> 
             <p id="demo"></p>
             <br>
         </div>

   </body>
</html>   