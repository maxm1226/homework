<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>阿拉伯數字轉成國字</title>
</head>

<body>
    <?php
    if(isset($_POST['number01'])){
        $default_val=$_POST['number01'];
    }else{
        $default_val="";
    }
    ?>
    <form action="ex2.php" method="post" name="form1" id="form1">
    <p>阿拉伯數字轉成國字程式</p>
    <p>
        <label for="">請輸入要轉換的阿拉伯數字：<br>
            <input type="text" name="number01" value="<?php echo $default_val; ?>" id="number01">
        </label>
    </p>
    <input type="hidden" name="MM_form" id="MM_form" value="form1" >
    <p>
        <input type="submit" name="button" id="button" value="開始轉換" >
    </p>
</form>


<?php
/**
*數字金額轉換成中文大寫金額的函式
*String Int $num 要轉換的小寫數字或小寫字串
*return 大寫字母
*小數位為兩位
**/
function num_to_rmb($num){
    $c1 = "零壹貳叄肆伍陸柒捌玖";
    $c2 = "分角元拾佰仟萬拾佰仟億";
    //精確到分後面就不要了，所以只留兩個小數位
    $num = round($num, 2); 
    //將數字轉化為整數
    $num = $num * 100;
    if (strlen($num) > 15) {
    return "金額太大，請檢查";
    } 
    $i = 0;
    $c = "";
    while (1) {
    if ($i == 0) {
    //獲取最後一位數字
    $n = substr($num, strlen($num)-1, 1);
    } else {
    $n = $num % 10;
    }
    //每次將最後一位數字轉化為中文
    $p1 = substr($c1, 3 * $n, 3);
    $p2 = substr($c2, 3 * $i, 3);
    if ($n != '0' || ($n == '0' && ($p2 == '億' || $p2 == '萬' || $p2 == '元'))) {
    $c = $p1 . $p2 . $c;
    } else {
    $c = $p1 . $c;
    }
    $i = $i +  1;
    //去掉數字最後一位了
    $num = $num / 10;
    $num = (int)$num;
    //結束迴圈
    if ($num == 0) {
    break;
    } 
    }
    $j = 0;
    $slen = strlen($c);
    while ($j < $slen) {
    //utf8一個漢字相當3個字元
    $m = substr($c, $j, 6);
    //處理數字中很多0的情況,每次迴圈去掉一個漢字“零”
    if ($m == '零元' || $m == '零萬' || $m == '零億' || $m == '零零') {
    $left = substr($c, 0, $j);
    $right = substr($c, $j +  3);
    $c = $left . $right;
    $j = $j-3;
    $slen = $slen-3;
    } 
    $j = $j + 3;
    } 
    //這個是為了去掉類似23.0中最後一個“零”字
    if (substr($c, strlen($c)-3, 3) == '零') {
    $c = substr($c, 0, strlen($c)-3);
    }
    //將處理的漢字加上“整”
    if (empty($c)) {
    return "零元整";
    }else{
    return $c . "整";
    }
    }
?>
<?php
function num2cht($num){


    $numc ="零,壹,貳,參,肆,伍,陸,柒,捌,玖";
    $unic = ",拾,佰,仟";
    $unic1 = "元整,萬,億,兆,京";
    $numc_arr = explode(",", $numc);
    $unic_arr = explode(",", $unic);
    $unic1_arr = explode(",", $unic1);
    $i = str_replace(",", "", $num);
    $c0 = 0;
    $str = array();
    do{
        $aa = 0;
        $c1 = 0;
        $s = "";
        $lan = (strlen($i) >= 4) ? 4 : strlen($i);
        $j = substr($i, -$lan);
        while($j > 0){
            $k = $j % 10;
            if($k > 0) {
                $aa = 1;
                $s = $numc_arr[$k].$unic_arr[$c1].$s;
            }elseif($k == 0) {
                if($aa == 1) $s = "0".$s;
            }
            $j = intval($j / 10);
            $c1 += 1;
        }
        $str[$c0] = ($s == '') ? '' : $s.$unic1_arr[$c0];
        $count_len = strlen($i) - 4;
        $i = ($count_len > 0) ? substr($i, 0, $count_len) : '';
        $c0 += 1;
    }while($i != '');
    $string="";
    foreach($str as $v) $string .= array_pop($str);
    $string = preg_replace('/0+/', '零', $string);
    return $string;
}
?>
<!-- ----------------------- -->
<?php
function ch_num($num,$mode=true) {
    $char = array("零","壹","貳","叄","肆","伍","陸","柒","捌","玖");
    $dw = array("","拾","佰","仟","","萬","億","兆");
    $dec = "點";
    $retval = "";
    if($mode)
      preg_match_all("/^0*(\d*)\.?(\d*)/",$num, $ar);
    else
      preg_match_all("/(\d*)\.?(\d*)/",$num, $ar);
    if($ar[2][0] != "")
      $retval = $dec . ch_num($ar[2][0],false); //如果有小數,先遞迴處理小數
    if($ar[1][0] != "") {
      $str = strrev($ar[1][0]);
      for($i=0;$i<strlen($str);$i++) {
        $out[$i] = $char[$str[$i]];
        if($mode) {
          $out[$i] .= $str[$i] != "0"? $dw[$i%4] : "";
          if($str[$i]+$str[$i-1] == 0)
            $out[$i] = "";
          if($i%4 == 0)
            $out[$i] .= $dw[4+floor($i/4)];
        }
      }
      $retval = join("",array_reverse($out)) . $retval;
    }
    // if (substr($retval,0,2) === "壹拾"){
        // str_replace("壹拾","拾",substr($retval,0,2);
    // }
    return $retval;
    // substr_replace($retval,'1',0,strlen($retval));
  }
?>
<!-- --------------------------- -->
<?php
    // if(isset($_POST['MM_form']) and $_POST['MM_form']=='form1'){
    //     $enum=strlen($_POST['number01']);
    // }
// $a = 123456789;
// $b = 123456;
// $c = 1500;
// echo ch_num($default_val)."\n";
// echo substr_replace(ch_num($default_val),'拾',0,2)."\n";

if (((strlen($default_val) == 6) || (strlen($default_val) == 10)) && (mb_substr(ch_num($default_val),0,2) == "壹拾")){
    $fxan=substr(num2cht($default_val),3);
}else{
    $fxan=num2cht($default_val);
}
echo $fxan;
if (substr($default_val,strlen($default_val)-4) == "0000"){
    echo "元整";
}

    // $fxan=substr_replace($fxan," ",((strlen($default_val)*4)-5),-1);

    // echo num_to_rmb($default_val)."<br>";

    // echo num2cht($default_val);  

// echo $default_val."<br>";
// echo substr($fxan,-1)."<br>";
// echo mb_substr(ch_num($default_val),-1);

?>
</body>

</html>