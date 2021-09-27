@extends('layout.mainLayout')

@section('title', 'Bai Tap 3')
@section('content')
<div>
	<?php
	$arr = [];
	for($i=1;$i<=100;$i++) {
		$arr[] = $i;
	}
	echo implode('-', $arr).'<br>';
	$arr = [];
	for($i=1;$i<=200;$i++) {
		$arr[] = $i;
	}
	echo implode('-', $arr).'<br>';
	echo 'Summary from 1 to 200: '.array_sum($arr).'<br>';
	$number = 10;
	$factorial = 1;
	for ($i = 1; $i <= $number; $i++){
		$factorial = $factorial * $i;
	}
	echo "input: $number <br>";
	echo "output: $factorial <br>";
	$string = 'Hello Everyone';
	echo "$string <br>";
	$pos = rand(0,strlen($string));
	$char = substr($string, $pos,1);
	echo "Random character: $char - $pos<br>";
	?>
</div>
@endsection