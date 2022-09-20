<!--ボードに黒コインがいくつあるかを計算するプログラム -->
<?php
    echo "ボードの横の長さを入力してください。\n";
    $board_length = trim(fgets(STDIN));
    if( preg_match('/^[0-9]$/',$board_length) ){
        $input_value = trim(fgets(STDIN));
        if( strlen($input_value) == $board_length && preg_match('/^[b|w]+$/',$input_value) ){
            $b = "b";
            $w = "w";
            $num_black = 0; 

            if (strcmp($input_value, str_repeat($w,$board_length)) === 0) {
                $num_black = 0;
            }else if ( strcmp($input_value, str_repeat($b,$board_length)) === 0 ){
                $num_black  = strlen($input_value);
            } else{ 
                if ( $input_value[0] == $b ) { 
                    $first_flip_index = stripos($input_value, $w);
                    $last_flip_index =  strripos($input_value, $b);
                    $input_value = filp_board( $input_value, $b, $w, $first_flip_index, $last_flip_index );
                    $num_black = substr_count($input_value, $b);
                }
                else 
                {  
                    $first_flip_index = stripos($input_value, $b);
                    $last_flip_index =  strripos($input_value, $w);
                    $input_value = filp_board( $input_value, $w, $b, $first_flip_index, $last_flip_index );       
                    $num_black = substr_count($input_value, $b);
                }
            }
            echo "黒コインの個数は  $num_black  \n ";
        }else{
            echo "b又はw又はbwの数をボードの横の長さと同じで入力してください。\n"; 
        }
    }else{
        echo "数字で入力してください。\n"; 
    }
    function filp_board($input_value, $w, $b, $first_flip_index, $last_flip_index){
        $last_index = 0;
        $temp_index = $last_flip_index;
        if ($temp_index == strlen($input_value)-1 ){
            $last_index = $temp_index -1 ;
        }
        else{
            $last_index = $temp_index;
        }
        if ($first_flip_index == $last_index){
            if($input_value[$first_flip_index] == "w"){
                $input_value[$first_flip_index] = "b";
            }else {
                $input_value[$first_flip_index] = "w";
            }
            return $input_value;
        }else{
            while ($first_flip_index < $last_index) {
                for ($j = $first_flip_index; $j <= $last_index; $j++){
                    if($input_value[$j] == "w"){
                       $input_value[$j] = "b";
                    }else {
                       $input_value[$j] = "w";
                    }
                } 
                    $first_flip_index = stripos($input_value, $b);
                    $last_index =  strripos($input_value, $w);
            }
            return $input_value;
        }
    }
   
?>