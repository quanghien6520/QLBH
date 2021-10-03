@extends('layout.mainLayout')

@section('title', 'Bai Tap 3')
@section('content')
<div>
	<?php
	class NguoiNaVi
	{

		public $sponsor;
		function __construct($str) {
			$this->sponsor = $str;
		}
		public function echoString()
		{
			return 'Class duoc khoi tao';
		}
		function giaiThua($number) {
			$result = 1;
			for($count = 1;$count<=$number;$count++) {
				$result *= $count;
			}
			return $result;
		}
		public function sortNumber($arr) {
			sort($arr);
			return $arr;
		}

		public function calculator($number1, $number2, $type) {
			switch ($type) {
				case '+':
				$result = $number1 + $number2;
				break;
				case '-':
				$result = $number1 - $number2;
				break;
				case '*':
				$result = $number1 * $number2;
				break;
				case '/':
				if($number2 == 0) {
					$result = 'Error 0';
				} else {
					$result = $number1 / $number2;
				}
				break;
				
				default:
				$result = 'Error Unknow';
				break;
			}
			return $result;
		}
	}
	$test = new NguoiNaVi('GG.bet');
	$test2 = new NguoiNaVi('cs.money');
	$check = $test->echoString();
?>
<p>{{$check}}</p>
<p>{{$test->sponsor}}</p>
<p>{{$test2->sponsor}}</p>
</div>
<div class="mt-7">
	<?php
	
	if(isset($_GET['giai_thua']) && !empty($_GET['giai_thua'])) {
		$giaithua = $test->giaiThua($_GET['giai_thua']);
	} else {
		$giaithua = '';
	} ?>
	<form action="{{url('bt-php/bai-5')}}" method="get" class="ml-4">
		<input type="text" name="giai_thua" placeholder="Nhap so de tinh giai thua" class="border-2 border-gray-300 px-2 py-2">
		<button type="submit" class="px-2 py-3 bg-blue-200 rounded">Submit</button>
		@if($giaithua)
		<p>Ket qua: {{$giaithua}}</p>
		@endif
	</form>
</div>

<div class="mt-7">
	<?php
	$arr = [1,5,2,6,3,8];
	print_r($arr);
	echo '<br>';
	$result = $test->sortNumber($arr);
	print_r($result);
?>
</div>

<div class="mt-7">
<p>Phep cong: 3 + 4 = {{$test->calculator(3,4,'+')}}</p>
<p>Phep tru: 3 - 4 = {{$test->calculator(3,4,'-')}}</p>
<p>Phep nhan: 3 x 4 = {{$test->calculator(3,4,'*')}}</p>
<p>Phep chia: 3 / 4 = {{$test->calculator(3,4,'/')}}</p>
</div>
<div class="mt-7">
<h1>BT JSON</h1>
{!! print_r(json_decode($json,true)) !!}
</div>
@endsection