<?php
$username=$_POST['username'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$is_pwd=$_POST['is_pwd'];
if($pwd!=$is_pwd){
    $response=[
        'errno'=>4001,
        'mgs'=>'密码不一致'
    ];
    die(json_encode($response));
}
$pwd = password_hash($pwd,PASSWORD_DEFAULT);
$time  = time();
$pdo = new PDO("mysql:host=127.0.0.1;dbname=2006", 'root', 'root');
$sql = "insert into `check`(username,email,mobile,reg_time,pwd)values ('$username','$email','$mobile','$time','$pwd')";
$res= $pdo->query($sql);
if($res){
    $response=[
        'errno'=>0,
        'mgs'=>'注册成功'
    ];
    echo json_encode($response);
}