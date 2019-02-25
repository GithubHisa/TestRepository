<?php
$wetherUrl  = "http://weather.livedoor.com/forecast/webservice/json/v1?city=130010";
$wetherData = file_get_contents($wetherUrl, true);
$data = json_decode($wetherData);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<title>天気予報</title>
<meta name="keywords" content="">
<meta name="description" content="">
<style>
#content {
    color: #666;
}
li {
    list-style: none;
    margin-bottom: 20px;
}
</style>
</head>
<body>
<div id="content">
    <h1>天気予報</h1>
    <div>
        <ul>
            <?php foreach ($data->forecasts as $data): ?>
                <li>
                    <?php echo preg_replace('#-#', '/', $data->date); ?>
                    <img src="<?php echo $data->image->url; ?>" />
                    <?php echo $data->telop; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>