@extends('layout.mainLayout')

@section('title', 'Bai Tap 2')
@section('content')
<div class="bg-red-100 w-full text-center">
	<?php
	$quoc_gia = [
		'VietNam' => 'Ha Noi',
		'Germany' => 'Berlin',
		'England' => 'London',
		'Japan' => 'Tokyo'
	];
	print_r($quoc_gia);
	echo '<br>';
	$array_number = [1,5,3,6,2,4,9,8,7];
	print_r($array_number);
	echo '<br>';
	echo 'Trung binh: '.(array_sum($array_number) / count($array_number)).'<br>';
	echo 'Min: '.min($array_number).'<br>';
	echo 'Max: '.max($array_number).'<br>';
	?>
</div>
<form action="{{url('/bt-php/bai-2')}}" method="GET" class="justify-center w-full">
	@csrf
	<input type="text" name="string" class="border-2 border-gray-300 rounded-md">
	<button type="submit" name="upper" value="1" class="border-2 bg-blue-800 rounded-md px-6 py-2 text-white">Upper Case</button>
	<button type="submit" name="upper" value="0" class="border-2 bg-red-800 rounded-md px-6 py-2 text-white">Lower Case</button>
</form>
<?php
	if(isset($_GET['string']) && !empty($_GET['string'])) {
		if(isset($_GET['upper']) && $_GET['upper']=='1') {
			echo 'Value: '.strtoupper($_GET['string']);
		} else {
			echo 'Value: '.strtolower($_GET['string']);
		}
	}
?>
@endsection