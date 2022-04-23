<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ex3.css">
    <title>尋找質數PHP程式</title>
</head>
<body>
    <?php
    if(isset($_POST['numder01'])){
        $default_val=$_POST['numder01'];
    }else{
        $default_val="";
    }
    ?>
    <form action="ex3.php" method="post" name="form1" id="form1">
        <h1 class="t1">尋找質數PHP程式</h1>
        <p class="t2"><label>請輸入要尋找多少個質數:<br><input type="text" name="numder01" value="<?php echo $default_val;?>" id="numder01"></label></p>
        <input type="hidden" name="MM_form" id="MM_form" value="form1">
        <p><input type="submit" name="button" id="button" value="開始找尋"></p>
    </form>
    <?php
    ini_set("error_reporting","E_ALL & ~E_NOTICE");
    if(isset($_POST['MM_form']) and $_POST['MM_form']=='form1'){
        $start=microtime();
        $numder01=$_POST['numder01'];
        $gen=3;
        $i=2;
        echo "<p class='t4'>尋找到第1個質數:2</p>";
        while($i<=$numder01){
            if(chk_prime($gen)){
                echo "<p class='t4'>尋找到第".$i."個質數:".$gen."</p>";
                $i++;
                $gen+=2;
            }else{$gen+=2;}}
        $end=microtime();
        echo "<p class='t3'>所需時間:".(($end-$start)*1000)."ms</p>";}
    function chk_prime($intnumber){
        $chkRange=$intnumber;
        for($i=2;$i<$chkRange;$i=$i+1){
            if($intnumber%$i==00){
                return false;}}
        return true;}
    ?>
</body>
</html>