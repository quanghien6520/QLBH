@extends('layout.mainLayout')

@section('title', 'Bai Tap 1')
@section('content')
<div class="flex justify-center w-full mt-10">
	<form action="{{route('register')}}" class="ml-12 w-1/4 border-2 border-gray-300 p-5 rounded-md" method="POST">
		@csrf
		<fieldset class="flex flex-col">
			<label>Name</label>
			<input type="text" name="name" class="border-2 border-gray-300">
		</fieldset>
		<fieldset class="flex flex-col">
			<label>IC No</label>
			<input type="text" name="ic_no" class="border-2 border-gray-300">
		</fieldset>
		<fieldset class="flex flex-col">
			<label>Email</label>
			<input type="email" name="email" class="border-2 border-gray-300">
		</fieldset>
		<fieldset class="flex flex-col">
			<label>Phone Number</label>
			<input type="text" name="phone_number" class="border-2 border-gray-300">
		</fieldset>
		<fieldset class="flex flex-col">
			<label>Password</label>
			<input type="password" name="password" class="border-2 border-gray-300">
		</fieldset>
		<fieldset class="flex flex-col">
			<label>Confirm Password</label>
			<input type="password" name="c_password" class="border-2 border-gray-300">
		</fieldset>
		<fieldset class="">
			<input id="is-admin" value="1" type="checkbox" name="is_admin" class="border-2 border-gray-300">
			<label for="is-admin">Is Admin</label>
		</fieldset>
		<button type="submit" class="px-4 by-2 bg-blue-600 text-white rounded-md">Submit</button>
	</form>
</div>
@endsection