<?php
$obj=new MergeSort();
$obj->main();
class MergeSort{
  function main(){
    $x=5;
    $arr=array(7,4,8,10,5,0);
    // echo "count=".count($arr);
    $this->sort($arr,0,$x);
    foreach ($arr as $value) {
      echo $value." ";
    }
    echo "<br>";
  }
  private function sort(&$arr,$st,$end){
    // echo $st."---".$end;
    if($st<$end){
      $mid=intval(($st+$end)/2);
      $this->sort($arr,$st,$mid);
      $this->sort($arr,$mid+1,$end);
      $this->merge($arr,$st,$end,$mid);
    }
  }
  private function merge(&$arr,$l,$r,$m){
    $len1=$m-$l+1;
    $len2=$r-$m;
    $L=array();
    $R=array();
    for($i=0;$i<$len1;$i++){
      $L[$i]=$arr[$i+$l];
    }
    for($i=0;$i<$len2;$i++){
      $R[$i]=$arr[$m+$i+1];
    }
    $i=$j=0;
    $k=$l;
    while ($i<$len1 && $j<$len2) {
      if($L[$i]<$R[$j])
        $arr[$k++]=$L[$i++];
      else
        $arr[$k++]=$R[$j++];
    }
    while($i<$len1){
      $arr[$k++]=$L[$i++];
    }
    while($j<$len2){
      $arr[$k++]=$R[$j++];
    }
  }
}
 ?>
