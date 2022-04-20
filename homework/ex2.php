<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>威力彩電腦選號小程式</title>
</head>

<body>
    <?php 
        $startBall=1;
        $endBall=49;
        $getBall=6;
        $startBall2=1;
        $endBall2=8;
        if(isset($_POST['chk'])){
            $startBall=$_POST['startBall'];
            $endBall=$_POST['endBall'];
            $getBall=$_POST['getBall'];
            $startBall2=$_POST['startBall2'];
            $endBall2=$_POST['endBall2'];
        };
    ?>
    <h3>威力彩電腦選號-php產生小程式</h3>
    <!-- form>(p+p>input[type="number" name="startBall" id="startBall"]*3)*2 -->
    <form name="form1" method="post" action="try004.php">
        <p>第一區範圍：</p>
        <p>起始數：
            <input type="number" name="startBall" id="startBall" value="<?php echo $startBall; ?>">
            結束數：
            <input type="number" name="endBall" id="endBall" value="<?php echo $endBall; ?>">
            產生球數：
            <input type="number" name="getBall" id="getBall" value="<?php echo $getBall; ?>">
        </p>
        <p>第二區範圍：</p>
        <p> 起始數：
            <input type="number" name="startBall2" id="startBall2" value="<?php echo $startBall2; ?>">
            結束數：
            <input type="number" name="endBall2" id="endBall2" value="<?php echo $endBall2; ?>">
            
            <input type="hidden" name="chk" id="chk" value="form1">
        </p>
        <p><input type="submit" name="button" id="button" value="產生電腦選號">
        </p>
    </form>
    <hr>
    <?php 
    // -----------------初版------------------
        // if(isset($_POST['chk'])){
        // for($i=0;$i<$getBall;$i++){
        //     $Ball[]=rand($startBall,$endBall);
        // }
        // $Ball2=rand($startBall2,$endBall2);
   ?>
       <?php
    if(isset($_POST['chk'])){
        $append=true;
        $Ball=[];
        for($i=0;$i<$getBall;$i++){
            $chkData=rand($startBall,$endBall);
            for($j=0;$j<$i;$j++){
                if($Ball[$j]==$chkData){
                $i--;
                $append=false;
                break;
            }
        }
        if($append){
            $Ball[]=$chkData;
        }
        $append=true;
    }
    $Ball2=rand($startBall2,$endBall2);
    ?>
    <h1>威力採電腦選號產生結果</h1>
    <h2>第一區：<?php for($i=0;$i<$getBall;$i++){echo $Ball[$i]." , ";};?></h2>
    <h2>第二區：<?php echo $Ball2; ?></h2>
    <?php }?>

    <h1>測試亂數</h1>

</body>

</html>