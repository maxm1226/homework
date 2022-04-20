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
<?php
$a = 123456789;
$b = 123456;
$c = 1500;
echo $a." = ".num2cht($a)."\n";
echo $b." = ".num2cht($b)."\n";
echo $c." = ".num2cht($c)."\n";
?>
</body>

</html>