
<?php
/**
 * Created by PhpStorm.
 * User: fresh
 * Date: 2017. 9. 10.
 * Time: PM 8:36
 */

$url = "https://openapi.naver.com/v1/search/news.json?query=";
$url.=urlencode('오늘');

// 네이버 클라이언트키, 시크릿 키
$header[] = "X-Naver-Client-Id:QdjhjVxtSjdhCw7i39f3";
$header[] = "X-Naver-Client-Secret:JkNfopiOTf";
$s = curl_init();

curl_setopt($s,CURLOPT_URL,$url);
curl_setopt($s,CURLOPT_POST, false);
curl_setopt($s,CURLOPT_HTTPHEADER, $header);
curl_setopt($s, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($s, CURLOPT_SSL_VERIFYPEER, 1);


$data = curl_exec($s);

curl_close($s);

$data = json_decode($data, true);
echo json_encode($data[items]);
?>