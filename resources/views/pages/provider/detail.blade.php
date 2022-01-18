@extends('layout.mainLayout')

@section('title', 'Provider Detail')
@section('content')
<div class="container mx-auto w-full mt-10">
    <div class="w-full mt-5">
        <h1 class="text-center text-2xl">PROVIDER DETAIL</h1>
        @if($errors->any())
        @foreach($errors->all() as $error)
        <p class="text-white py-2 px-4 my-2 bg-red-500 text-xl rounded">{{$error}}</p>
        @endforeach
        @endif
        <form method="POST" action="{{route('provider.update',['id'=>$provider->id])}}">
            @csrf
            <div class="flex flex-col pl-5 mb-4">
                <label class="ml-2">Name</label>
                <input type="text" name="name" value="{{$provider->name}}" class="border-2 rounded mr-5 px-4 py-1" />
            </div>
            <div class="flex flex-col pl-5 mb-4">
                <label class="ml-2">Phone Number</label>
                <input type="phone_number" name="phone_number" value="{{$provider->phone_number}}" class="border-2 rounded mr-5 px-4 py-1" />
            </div>
            <div class="flex flex-col pl-5">
                <label class="ml-2">Email</label>
                <input type="email" name="email" value="{{$provider->email}}" class="border-2 rounded mr-5 px-4 py-1" />
            </div>
            <div class="text-center mt-5 w-full">
                <button class="bg-blue-300 px-7 py-2 rounded">SAVE</button>
                <a href="{{url('provider')}}" class="bg-gray-300 px-7 py-2 rounded">BACK</a>
            </div>
        </form>
    </div>
</div>
@endsection