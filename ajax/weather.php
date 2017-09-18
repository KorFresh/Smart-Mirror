
<?php
/**
 * Created by PhpStorm.
 * User: fresh
 * Date: 2017. 9. 10.
 * Time: PM 8:36
 */

if($_POST['area'] == '부산')
	$location = array('부산', '연제구', '연산동');
else if($_POST['area'] == '서울')
	$location = array('서울', '중구' ,'무교동');
else
	$location = array('부산', '금정구', '서동');

$url = "http://apis.skplanetx.com/weather/current/minutely?version=1&lat=&lon=&appKey=0fd05c12-d499-3376-a2b6-7123e34ff376&city={$location[0]}&county={$location[1]}&village={$location[2]}";
$header[] = "Accept: application/json";
$header[] = "Accept-Encoding: gzip, deflate, sdch";
$s = curl_init();

curl_setopt($s,CURLOPT_URL,$url);
curl_setopt($s,CURLOPT_POST, 0);
//curl_setopt($s,CURLOPT_HTTPHEADER, $header);
curl_setopt($s, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($s, CURLOPT_REFERER, "");
curl_setopt($s, CURLOPT_TIMEOUT, 3);

$data = curl_exec($s);

curl_close($s);

$data = json_decode($data, true);

echo json_encode($data[weather][minutely]);
?>