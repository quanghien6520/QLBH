@extends('layout.mainLayout')

@section('title', 'Bai Tap 1')
@section('content')
<div>
	<?php
	//get current folder
	var_dump(dirname(__FILE__));
	echo '<br>';
	$allFiles = scandir(dirname(__FILE__), 1);
	var_dump($allFiles);
	echo '<br>';
	//filetime
	var_dump(date('Y-m-d H:i:s',(filemtime ( __FILE__))));
	echo '<br>';
	//get current URL
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	var_dump($actual_link);
	echo '<br>';
	//client ip
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	var_dump($ip);die;

	//info php
	phpinfo();

	?>
</div>
@endsection