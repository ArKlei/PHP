<html lang="en">
<head>
    <title>Orai Jūsų mieste</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootsrap 4 links -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <!-- Bootsrap 3 links -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color:white; color:darkgreen">
<div class="container">
    <h2 style="text-align:center; padding:5px; font-size:50px">🆃🅷🅴 🆆🅴🅰🆃🅷🅴🆁 🅱🆈 <br>🆃🅷🅴 🅲🅸🆃🅸🅴🆂<br><br></h2>
    <h4 style="text-align:left; font-size:30px">🅒🅗🅞🅞🅢🅔 🅣🅗🅔 🅒🅘🅣🅨:<br><br></h4>
    <form method="post">
        <input type="text" class="form-control" name="city" placeholder="𝒞𝒾𝓉𝓎 - 𝒦𝓁𝒶𝒾𝓅𝑒𝒹𝒶, 𝐿𝑜𝓃𝒹𝑜𝓃 ..." style="width:250px" required /><br>
        <input type="text" class="form-control" name="country" placeholder="𝒞𝑜𝓊𝓃𝓉𝓇𝓎 𝒸𝑜𝒹𝑒 - 𝓁𝓉, 𝓊𝓀, 𝒹𝓀" style="width:250px" required /><br>
        <input type="submit" class="btn btn-danger" value="🅶🅴🆃 🆆🅴🅰🆃🅷🅴🆁">
        </form>
<?php
    if (isset($_POST['city']) && isset($_POST['country'])) {
    $city = $_POST['city'];
    $country = $_POST['country'];
    $json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$city.','.$country.'uk&APPID=5a781dacdcb0f674f483c730fd575e91');
    $masyvas = json_decode($json);
    //°C = K - 273.15
        $temp = ($masyvas->main->temp) - 273.15;
        $description = ($masyvas->weather[0]->description);
        $wind = ($masyvas->wind->speed);
        $clouds = ($masyvas->clouds->all);
        $pressure = ($masyvas->main->pressure);
    } ?>
    <br>
    <?php

    switch ($description) {
    case "clear sky":
        echo '<img src="sun.png" style="width:50px">';
        break;
    case "light snow":
        echo '<img src="lightsnow.png"  style="width:50px"';
        break;
    case "overcast clouds":
        echo '<img src="clouds.png"  style="width:50px">';
        break;
    case "broken clouds":
            echo '<img src="clouds.png"  style="width:50px">';
            break;
    case "fog":
            echo '<img src="fog.png"  style="width:50px">';
            break;
        case "mist":
            echo '<img src="fog.png"  style="width:50px">';
            break;
    default:
        echo ' ';
}
?>
    <h4 style="text-align:left"><?php echo
            '<div style="background-color:darkgrey; color:white; font-weight:bold; border-radius:10px; border:0px solid darkgrey; text-align:center; width:150px; padding:5px;">
            '.$city.', <span style="text-transform: uppercase">'.$country.'</span></div></h4><p style="font-weight:bold; color:black">Temperature: '.(int)$temp.' C°, '.$description.', wind '.$wind.' m/s. clouds '.$clouds.' %, '.$pressure.' hpa' ?></p><br>
        <p class="text-center" style="font-size: 8px; color:grey">ᑕᖇEᗩTEᗪ ᗷY ᗩᖇKᒪEI ᗪEᘔIGᑎ © 2019 EᑕO ᑎT. ᗩᒪᒪ ᖇIGᕼTS ᖇESEᖇᐯEᗪ.</p>

</div>
</body>
</html>