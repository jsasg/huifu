<?php
// 递归
function recursive($_data,$pid=0,$field='parent_id'){
    $array = array();
    foreach($_data as $key=>$val){
        if($pid == $val[$field]){
            $array[$key] = $val;
            $recur = recursive($_data,$val['id'],$field);
            $recur ? $array[$key]['sub'] = $recur : '';
        }
    }
    return $array;
}

// 返回状态信息
function returnStatus($status){
    switch ($status) {
        case '1':
            $info = '是';
            break;
        case '0':
            $info = '否';
            break;
        default:
            $info = $status;
            break;
    }
    return $info;
}

// 返回状态信息2
function returnStatus2($status){
    switch ($status) {
        case '1':
            $info = '正常';
            break;
        case '0':
            $info = '已关闭';
            break;
        default:
            $info = $status;
            break;
    }
    return $info;
}

// 判断数组几维
function judgmentArrayDimension($array){
    $result = 1;
    foreach($array as $key=>$val){
        foreach($val as $k=>$v){
            if(is_array($v)){
                $result++;
            }
        }
    }
    return $result;
}
