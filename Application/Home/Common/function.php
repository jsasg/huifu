<?php
function randomDivInt($div,$total){
    	$remain=$total;
    	$max_sum=($div-1)*$div/4;
    	$p=$div; $min=0;
    	$a=array();
    	for($i=0; $i<$div-1; $i++){
       	 	$max=($remain-$max_sum)/($div-$i);
       	 	$e=rand($min,$max);    
       	 	$min=$e+1; $max_sum-=$p;
        		$remain-=$e;
        		$a[$e]=true;
    	}
    	$a=array_keys($a);
    	$a[]=$remain;
   	return $a;
}

/**
 * 验证手机格式
 * @param  int  $tel 手机号
 * @return boolean           格式正确return true 否则return fasle
 */
function isMobile($tel){
    	$RegExp = '/^(?:13|15|18|14)[0-9]{9}$/';
   	return preg_match($RegExp, $tel) ? true : false;
}