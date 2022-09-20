<!-- X に入る数字を計算するプログラム -->
<?php
echo "行数を入力してください。\n";
$input_line = trim(fgets(STDIN));
if( preg_match('/^[0-9]$/',$input_line) ){
    $Xs = array();
    for ($i = 0; $i < $input_line; $i++) {
        $input_value = trim(fgets(STDIN));
        $input_value = str_replace(array("\r\n","\r","\n"), '', $input_value);
        if(strlen($input_value) == 16 && preg_match('/^[0-9]{15}X$/',$input_value)){
            $even_values = 0;
            $odd_values = 0;
            
            for ($j = 0; $j <15; $j++) {
                $digit = $input_value[$j];
                if ($j % 2 == 0) {
                    $digit = $digit * 2;
                    if ($digit > 9) {
                        $first_digit = $digit - 10;
                        $second_digit = explode('.', $digit / 10);
                        $digit =  $first_digit + $second_digit[0];
                    }
                    $even_values += $digit;
                }
                else{
                    $odd_values += $digit;
                }
            }
            $Xs[] = (10 - ($even_values + $odd_values) % 10) % 10;
        
        } else{
            echo "000000000000000Xフォーマットで入力してください。\n"; 
        }
    }
    foreach($Xs as $X){
        echo "Xの値は  $X\n";
    }
}else{
    echo "数字で入力してください。\n"; 
}

?>