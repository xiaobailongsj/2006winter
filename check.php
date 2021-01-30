<?php
$data=$_GET['data'];
$dbh = new PDO("mysql:host=127.0.0.1;dbname=2006", 'root', 'root');
$sql = "select * from `check` where username='$data'||mobile='$data'||email='$data'";
$res = $dbh->query($sql);
$arr = $res->fetch(PDO::FETCH_ASSOC);
if($arr){
    $response=[
        'errno'=>4001,
        'mgs'=>'已存在请更换'
    ];
    die(json_encode($response));
}else{
    $response=[
        'errno'=>0,
        'mgs'=>'ok'
    ];
    die(json_encode($response));
}