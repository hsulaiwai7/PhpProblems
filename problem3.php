<!-- ある時刻(0時～23時)が、指定した時間の範囲内に含まれるかどうかを調べるプログラム -->
<?php
    echo "開始時刻を入力してください。\n";
    $start_time = trim(fgets(STDIN));
    echo "終了時刻を入力してください。\n";
    $end_time = trim(fgets(STDIN));
    echo "ある時刻を入力してください。\n";
    $time = trim(fgets(STDIN));

    if( preg_match('/^[0-9]{1,2}$/',$start_time) && preg_match('/^[0-9]{1,2}$/',$start_time) && preg_match('/^[0-9]{1,2}$/',$start_time) ){
        
        if ($start_time <= $end_time) {
            if ($time >= $start_time && $time <= $end_time) {
                echo ("入力された時刻{$time}は範囲内に含まれています。");
            } else {
                echo ("入力された時刻{$time}は範囲内に含まれていません。");
            }
        } else {
            if ($time >= $start_time || ($time < $start_time && $time < $end_time)) {
                echo ("入力された時刻{$time}は範囲内に含まれています。");
            } else {
                echo ("入力された時刻{$time}は範囲内に含まれていません。");
            }
        }
    } else{
        echo "２数字以内で入力してください。\n"; 
    }
?>