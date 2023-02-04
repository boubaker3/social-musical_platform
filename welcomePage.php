
<!DOCTYPE html>
<html>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

<head>            <link rel="stylesheet" href="welcomePage.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="background-color: var(--main-color);
">
    <div class="container p-4">

    <div class="row">

    <div class="col-12" id="logoWelcome">
        <img  src="assets/musiksPng.png" width="120px" height="60px">


    </div>
    <div class="col-12 col-md-6" id="astro">
        <img  src="assets/astronaut.gif"  >
      </div>
    <div class="col-12  col-md-6  d-inline-block" id="welcomeText">
        <h1 id="stream">Meet new friends and float <br>  together in music space</h1>
         <button onclick="getStarted();" id="GetStartedBtn"> Get Started</button>
    </div>

    

    </div>
</div>

    <script>
function getStarted(){
    window.location.replace("registration.php")
}


    </script>
 </body>
 

</html>