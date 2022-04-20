<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php流程控制</title>
    <style>
        .fc {
            color: red;
            font-family: "標楷體";
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
        function zerof($zero){
          $temzero=($zero<10)?"0$zero":$zero;
          return $temzero;  
        };
    ?>
    <?php

        $hour=zerof(rand(0,23));
        $min=zerof(rand(0,59));
        $sec=zerof(rand(0,59));

        $str= ($hour>=12)?" PM":" AM";
        $hour= ($hour>=12)?$hour-12:$hour;
        if ($hour<10 || $min<10 || $sec<10){
            $hour=($hour==0 && $str==" PM")?$hour=12:$hour;
            // $hour=($hour<10)?"0$hour":$hour;
            // $min=($min<10)?"0$min":$min;
            // $sec=($sec<10)?"0$sec":$sec;
        };
        echo "目前時間為:$hour:$min:$sec $str";
    ?>
    <hr><hr>
    <?php
        $hour= 18;
        $str= ($hour>=12)?"PM":"AM";
        $hour= ($hour>=12)?$hour-12:$hour;
        echo "目前時間為:".$hour.$str
    ?>

    <hr><hr>
    <form name="rwf" method="get" action="try006.php" target="resault">
        <div><select name="reward" id="reward">
            <option value="A">獎品A</option>
            <option value="B">獎品B</option>
            <option value="C">獎品C</option>
            <option value="D">獎品D</option>
            <option value="E">獎品E</option>
        </select>
        <input type="submit" name="enter" id="enter" value="送出">
        </div>
    </form>
    <iframe src="try006.php" frameborder="1" name="resault" id="resault"></iframe>
    <hr>
    <hr>
    <form name="rwf1" method="get" action="try005.php" target="resault1">
        <div><select name="reward1" id="reward1">
            <option value="A">獎品A</option>
            <option value="B">獎品B</option>
            <option value="C">獎品C</option>
            <option value="D">獎品D</option>
            <option value="E">獎品E</option>
        </select>
        <input type="submit" name="enter1" id="enter1" value="送出">
        </div>
        <textarea name="resault1" id="resault1" cols="30" rows="10" readonly >
            <?php
            if(isset($_GET['reward1'])){
                $gift1=$_GET['reward1'];
                switch($gift1){
                    case 'A':
                            echo "獎品A：鉛筆五支";
                            break;
                    case 'B':
                            echo "獎品B：鉛筆四支";
                            break;
                    case 'C':
                            echo "獎品C：鉛筆三支";
                            break;
                    case 'D':
                            echo "獎品D：鉛筆二支";
                            break;
                    case 'E':
                            echo "獎品E：鉛筆一支";
                            break;
                    default:
                            echo "一團空氣";
                            break;
                    }
                }

            ?>
        </textarea>
    </form>
    <hr>
    <hr>
    <?php
    // switch($reward){
    //     case '獎品A':
    //             echo "傳入獎品A<br>鉛筆五支";
    //             break;
    //     case '獎品B':
    //             echo "傳入獎品A<br>鉛筆四支";
    //             break;
    //     case '獎品C':
    //             echo "傳入獎品A<br>鉛筆三支";
    //             break;
    //     case '獎品D':
    //             echo "傳入獎品A<br>鉛筆二支";
    //             break;
    //     case '獎品E':
    //             echo "傳入獎品A<br>鉛筆一支";
    //             break;
    //     default:
    //             echo "一團空氣";
    //             break;
     ?>

    <?php
    $GPA = 'B';
    echo "學生成績:$GPA<br>";
    switch($GPA){
        case 'A':
                echo "學生成績超過80<br>";
                break;
        case 'B':
                echo "學生成績超過70,低於80<br>";
                break;
        case 'C':
                echo "學生成績超過60,低於70<br>";
                break;
        default:
                echo "學生成績不及格<br>";
                break;
    }
    ?>
    <hr>
    <hr>
    <?php
    $age = rand(4, 80);
    if ($age < 12) {
        echo "年齡:$age 歲" . "須購買兒童票";
    } elseif ($age >= 12 && $age < 66) {
        echo "年齡:$age 歲" . "須購買成人票";
    } else {
        echo "年齡:$age 歲" . "須購買敬老票";
    };
    ?>
    <hr>
    <hr>
    <?php
    //echo '$A='.$A.'<br>'.'$B='.$B.'<br>'.'$C='.$C.'<br>';
    $A = rand(1, 9);
    $B = rand(1, 9);
    $C = rand(1, 9);
    echo "\$A=$A <br>\$B=$B <br>\$C=$C <br>";

    // if ($A==$B && $B==$C) echo "\$A=\$B=\$C";
    // if($A<$B && $B>$C && $A!=$C) echo "\$A<\$B>\$C";
    // if($A>$B && $B<$C && $A!=$C) echo "\$A>\$B<\$C";
    // if($A<$B && $B<$C) echo "\$A<\$B<\$C";
    // if($A>$B && $B>$C) echo "\$A>\$B>\$C";
    // if($A==$B && $B<$C) echo "\$A=\$B<\$C";
    // if($A==$B && $B>$C) echo "\$A=\$B>\$C";
    // if($A<$B && $B==$C) echo "\$A<\$B=\$C";
    // if($A>$B && $B==$C) echo "\$A<\$B=\$C";
    // if($A==$C && $C>$B) echo "\$A=\$C>\$B";
    // if($A==$C && $C<$B) echo "\$A=\$C<\$B";

    // function cp($a,$b,$c){

    // }
    // ------------------------------------------------
    if ($A == $B || $B == $C || $A == $C) echo '<h1 class="fc">有$A==$B，$B==$C， $A==$C相等情形，不做順序判斷。<h1>';
    // if ($A == $B && $B == $C) echo "\$A=\$B=\$C";
    // if ($A == $B) {
    //     echo '$A=$B';
    //     if ($A > $C) {
    //         echo '>$C';
    //     } else {
    //         echo '<$C';
    //     }
    // };
    // if ($A == $C) {
    //     echo '$A=$C';
    //     if ($A > $B) {
    //         echo '>$B';
    //     } else {
    //         echo '<$B';
    //     }
    // };
    // if ($B == $C) {
    //     echo '$B=$C';
    //     if ($A > $C) {
    //         echo '<$A';
    //     } else {
    //         echo '>$A';
    //     }
    // };
    if ($A > $B && $A != $C && $B != $C) {
        if ($B > $C && $A != $C) {
            echo '$A>$B>$C';
        } else {
            if ($A > $C && $A != $C && $B != $C) {
                echo '$A>$C>$B';
            } else {
                echo '$C>$A>$B';
            };
        };
    };
    if ($A < $B && $A != $C && $B != $C) {
        if ($B > $C && $A < $C && $A != $B) {
            echo '$B>$C>$A';
        } else {
            if ($C > $B && $A != $C && $A != $B) {
                echo '$C>$B>$A';
            } else {
                echo '$B>$A>$C';
            };
        };
    };

    ?>
    <hr>
    <hr>
    <?php
    $name = "Kanen";
    $height = rand(100, 200);
    if ($height > 120) echo $name . "購買全票!!<br>";
    else echo $name . "購買半票!!";
    ?>
    <hr>
    <hr>
    <?php
    $grade = rand(0, 100);
    $name = "Kanen";

    if ($grade < 60) {
        echo $name . "成績:  " . $grade . "  不及格!<br>";
    } else {
        echo "學生:" . $name . "  成績: " . $grade . "<br>";
    };
    ?>

</body>

</html>