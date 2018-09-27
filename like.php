<?php
/**
 * @package WordPress
 * @Theme TinhDk
 *
 * @author jackymon41@gmail.com
 * @link https://tinhdk.net
 */
require_once('../../../wp-load.php' );
$host="localhost";
$db_user=get_option('tinhdk_sql_dbu');//Tên người dùng
$db_pass=get_option('tinhdk_sql_dbp');//Mật Khẩu
$db_name=get_option('tinhdk_sql_dbn');//Tên database
header("Content-Type: application/json; charset=utf-8");

$action = $_GET['action'];
$id = 1;
$ip = get_client_ip();

$link=mysqli_connect($host,$db_user,$db_pass,$db_name);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if($action=='add'){
	likes($id,$ip,$link);
}else if($action=='get'){
	echo jsons($id,$link);
} else {
	exit();
}

function likes($id,$ip,$link){
	$ip_sql=mysqli_query($link,"select ip from votes_ip where vid='$id' and ip='$ip'");
	$count=mysqli_num_rows($ip_sql);
	if($count==0){
		$sql = "update votes set likes=likes+1 where id=".$id;
		mysqli_query($link,$sql);
		$sql_in = "insert into votes_ip (vid,ip) values ('$id','$ip')";
		mysqli_query($link,$sql_in);
		echo jsons($id,$link);
	}else{
		$msg = 'repeat';
		$arr['success'] = 0;
		$arr['msg'] = $msg;
		echo json_encode($arr);
	}
}

function jsons($id,$link){
	$row = mysqli_fetch_array(mysqli_query($link,"select * from votes where id=".$id));
	$arr['success'] = 1;
	$arr['like'] = $row['likes'];	
	return json_encode($arr);
}

//Nhận IP thực của người dùng
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}
?>