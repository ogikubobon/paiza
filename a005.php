<?php

function magni_cal(){
  global $magni;
  $magniP=1;
    for($i=0;$i<3;$i++){
      if($magni[$i]>0){
        $magni[$i]--;
        $magniP++;
      }
    }

  //echo "bairitu: $magniP\n";
  return $magniP;
}


  $input_lines = fgets(STDIN);
  $input_lines = str_replace("\n","",$input_lines);
  $tmp = explode(" ",$input_lines);

  $thN = (int)$tmp[0];
  $pinN = (int)$tmp[1];
  $n = (int)$tmp[2];

  $input_lines = fgets(STDIN);
  $input_lines = str_replace("\n","",$input_lines);
  $through = explode(" ",$input_lines);
  for($i=0;$i<$n;$i++){
    if(strcmp($through[$i],"G") === 0)
      $through[$i] = 0;
    else
      $through[$i] = (int)$through[$i];
  }

  $f = 0;
  $i1 = 0;
  $score=0;
  $magni = array(0,0,0);

  while($i1<$n){

    $p1 = $through[$i1++];

    //strike
    if($p1===$pinN){
      $p1 *= magni_cal();
      $p2 = 0;
      if($magni[1]===0)
        $magni[1] = 2;
      else
        $magni[2] = 2;
    }
    else{
      $p2 = $through[$i1++];

      //spare
      if(($p1+$p2)===$pinN)
        $spareFlag = true;
      else
        $spareFlag = false;
      $p1 *= magni_cal();
      $p2 *= magni_cal();

      if($spareFlag)
        $magni[0]++;
    }

    $score += ($p1 + $p2);

    if($i1===($n-1)){
      $p1 = $through[$i1];
      $p1 *= magni_cal();
      $score += $p1;
      break;
    }

    //echo "$score\n";
  }

  echo "$score\n";
