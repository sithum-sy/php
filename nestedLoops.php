<?php

for($y=0; $y<=5; $y++){
    for($x=0; $x<=5; $x++){
        if($y==2 && $x==2) 
        break; //only exists the inner loop when y=2 & x=2 & continues with y=3 loop
        echo "Values: y = $y, x = $x<br>";
    }
}
echo "<br>------------------------------------------------ <br>";

for($y=0; $y<=5; $y++){ // loop 2
    for($x=0; $x<=5; $x++){ //loop 1
        if($y==2 && $x==2) 
        break 2; //exists loop 2
        echo "Values: y = $y, x = $x<br>";
    }
}

?>