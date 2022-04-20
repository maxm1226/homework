<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- 目前年齡為A歲剛好X月整，計算Y月後為Z歲又C個月 -->
    <?php
        $age=rand(1,50);
    ?>
    <?php
    function ct ($age,$x,$y){
    $my=floor(($x+$y)/12);
    $ml=($x+$y)%12;
    $aftAge=$age+$my;
    return "目前年齡為".$age."歲又".$x."個月整，計算".$y."月後為".$aftAge."歲又".$ml."個月。";
}
?>
    <!-- $ppn=rand(1,30); -->

<!-- 排列亂數座號(1-30)並對應座位1排8個 第17號不能坐人-->
<?php  
    $ppn=1;
    function calf ($ppn,$broken,$colpp){  
        $lifed=$ppn; 
    if($lifed>=$broken){
        $lifed++;
    };
    $row=ceil($lifed/$colpp);
    if(($lifed%$colpp)==0){
        $col=$colpp;
    }else{
        $col=($lifed%$colpp);
    };
        return "座號：".$ppn."號同學，坐在第".($row)."排第".($col)."個位置";
};
?>




</head>
<body>
    <table border=1>
        <tr>
            <td><?php echo ct($age,6,27);?></td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo calf($ppn,17,8);?></td>
            <td></td>
        </tr>
    </table>
 <!-- 迴圈test -->
 <?php
    for ( $i=1 ; $i<=30 ; $i++ && $ppn++ ) {

    echo calf($ppn,17,8).'<br>';
    }; 
?>
</body>
</html>

