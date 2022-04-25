<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>作業一:陣列排序程式</title>
</head>
<body>
<form action="ex1.php" method="post" name="form1" id="form1">
        <p>陣列排序程式:</p>
        <p>亂數產生5000陣列:</p>
        <p>設定排序方式
            <label><input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" checked="checked">由小到大排序</label>
            <label><input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">由大到小排序</label>
        </p>
        <p>
        <input type="hidden" name="MM_form" id="MM_form" value="form1">
        </p>
        <p><input type="submit" name="button" id="button" value="開始排序"></p>
    </form>
    <?php
    ini_set("error_reporting" , "E_ALL & ~E_NOTICE");
    if(isset($_POST['MM_form'])and $_POST['MM_form']=='form1'){
        for($i=0;$i<5000;$i++){
            $data[$i]=rand(1,100000);
        }
        echo "<p>排序前內容: ";
        print_r($data);
        echo "</p>";

        $start = microtime();
        $new = bubble_sort($data,$_POST['RadioGroup1']);
        $end = microtime();
        $showData = $end-$start;

        echo "<p>排序完成內容:";
        print_r($new);
        echo "</p>";
        echo "<p>所需時間:".($showData*1000)."ms</p>";
    }
    function bubble_sort( $arr,$mod=1) {
        $size = count($arr)-1;
        for($i=0; $i<$size;$i++) {
            for ($j=0;$j<$size-$i; $j++) {
                $k=$j+1;
                if($mod==1) {
                    if ($arr[$k] < $arr[$j]) {     //小排到大
                        list($arr[$j] , $arr[$k]) =array($arr[$k], $arr[$j]);
                    }else {
                        if($arr[$k] > $arr[$j]){   //大排到小
                            list($arr[$j] , $arr[$k]) =array($arr[$k],$arr[$j]);
                        }
                    }
                }
            }
            return $arr ;
        }
    }
    ?>
</body>
</html>

