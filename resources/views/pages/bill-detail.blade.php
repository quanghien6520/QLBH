@extends('layout.mainLayout')

@section('title', 'List Bill')
@section('content')
<div class="container mx-auto w-full mt-10">
    <div class="w-full mt-5">
        <h1 class="text-center text-2xl">{{$type == 'buy'?'BUY':'SELL'}} BILL DETAIL</h1>
        <div class="ml-3">
        <h2>User Update: {{$detail[0]->user->name}}</h2>
        <h2>Date Update: {{date('d/m/Y',strtotime($detail[0]->created_at))}}</h2>
        </div>
        <table class="table-fixed border-collapse border border-slate-400 w-full text-center mt-5">
            <thead>
                <th class="border border-slate-300 text-white bg-black">No</th>
                <th class="border border-slate-300 text-white bg-black">Name</th>
                <th class="border border-slate-300 text-white bg-black">Amount</th>
                <th class="border border-slate-300 text-white bg-black">Price</th>
                <th class="border border-slate-300 text-white bg-black">Total</th>
            </thead>
            <tbody>
                @foreach($detail as $key=>$bill)
                <tr>
                    <td class="border border-slate-300 px-4 py-3">{{$key+1}}</td>
                    <td class="border border-slate-300 px-4 py-3 text-left">{{$bill->goods->name}}</td>
                    <td class="border border-slate-300 px-4 py-3">{{$bill->amount}}</td>
                    <td class="border border-slate-300 px-4 py-3">{{$bill->goods->price}}</td>
                    <td class="border border-slate-300 px-4 py-3">{{$bill->amount*$bill->goods->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right mt-4">
            <a href="{{url('bill')}}" class="bg-gray-300 px-7 py-2 rounded">BACK</a>
        </div>
    </div>
</div>
@endsection