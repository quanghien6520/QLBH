@extends('layout.mainLayout')

@section('title', 'Bai Tap 3')
@section('content')
<div>
	<?php
	function giaiThua($number) {
		$result = 1;
		for($count = 1;$count<=$number;$count++) {
			$result *= $count;
		}
		return $result;
	}
	if(isset($_GET['giai_thua']) && !empty($_GET['giai_thua'])) {
		$giaithua = giaiThua($_GET['giai_thua']);
	} else {
		$giaithua = '';
	} ?>
	<form action="{{url('bt-php/bai-4')}}" method="get" class="ml-4">
		<input type="text" name="giai_thua" placeholder="Nhap so de tinh giai thua" class="border-2 border-gray-300 px-2 py-2">
		<button type="submit" class="px-2 py-3 bg-blue-200 rounded">Submit</button>
		@if($giaithua)
		<p>Ket qua: {{$giaithua}}</p>
		@endif
	</form>
</div>
<div class="mt-7">
	<?php
	$str = "Hello World!";
	$reverse = strrev($str);
?>
<p>Chuoi truoc khi dao nguoc: {{$str}}</p>
<p>Chuoi sau khi dao nguoc: {{$reverse}}</p>
</div>
<?php
$user = [
	'Quang Hien' => 'quanghien@123.com',
	'Quang Hien1' => 'quanghien@456.com',
	'Quang Hien2' => 'quanghien@789.com',
];
if(isset($_GET['email']) && !empty($_GET['email'])) {
	if(in_array($_GET['email'], $user)) {
		$userName = array_search ($_GET['email'], $user);
	} else {
		$userName = 'Not Found';
	}
} else {
	$userName = '';
}
?>
<div class="mt-7">
	<form action="{{url('bt-php/bai-4')}}" method="get" class="ml-4">
		<input type="email" name="email" placeholder="Nhap Email" class="border-2 border-gray-300 px-2 py-2">
		<button type="submit" class="px-2 py-3 bg-blue-200 rounded">Submit</button>
		@if($userName)
		<p>Ket qua: {{$userName}}</p>
		@endif
	</form>
</div>
<div class="mt-7">
	<?php
	$str = "Hello World! AXX BSS";
	$firstWord = explode(' ', $str)[0];
?>
<p>Chuoi: {{$str}}</p>
<p>Tu dau tien: {{$firstWord}}</p>
</div>
@endsection