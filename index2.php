<?php 
$siu=[4,9];
        $bo=array();
        for($i=0;$i<7;$i++){
            $bo[$i]=[0,0,0,0,0,0,0,0,0,0,0,0,0];
            for($j=0;$j<13;$j++){
                if(isset($siu[$j])){
                        $bo[$i][$siu[$j]]=$siu[$j];                
                        }else{
                                break;
                        }
                }
                

        }
        
     for($x=0;$x<7;$x++){
             echo '<br>';
        for($y=0;$y<13;$y++){
             echo $bo[$x][$y];
     }
}
    
?>

