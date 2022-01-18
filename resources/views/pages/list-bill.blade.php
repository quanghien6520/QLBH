@extends('layout.mainLayout')

@section('title', 'List Bill')
@section('content')
<div class="container mx-auto w-full mt-10">
    <div class="w-full mt-5">
        <h1 class="text-center text-2xl">BUY BILLS</h1>
        <table class="table-fixed border-collapse border border-slate-400 w-full">
            <thead>
                <th class="border border-slate-300 text-white bg-black">ID Bill</th>
                <th class="border border-slate-300 text-white bg-black">User</th>
                <th class="border border-slate-300 text-white bg-black">Date</th>
            </thead>
            <tbody>
                @foreach($buyBill as $key=>$bill)
                <tr>
                    <td class="border border-slate-300 px-4 py-3 text-blue-600"><a href="{{url('buy-bill/'.$key)}}">{{$key}}</a></td>
                    <td class="border border-slate-300 px-4 py-3">{{$bill[0]->user->name}}</td>
                    <td class="border border-slate-300 px-4 py-3">{{date('d/m/Y',strtotime($bill[0]->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="w-full mt-5">
    <h1 class="text-center text-2xl">SELL BILLS</h1>
        <table class="table-fixed border-collapse border border-slate-400 w-full">
            <thead>
                <th class="border border-slate-300 text-white bg-black">ID Bill</th>
                <th class="border border-slate-300 text-white bg-black">User</th>
                <th class="border border-slate-300 text-white bg-black">Date</th>
            </thead>
            <tbody>
                @foreach($sellBill as $key=>$bill)
                <tr>
                    <td class="border border-slate-300 px-4 py-3 text-blue-600"><a href="{{url('sell-bill/'.$key)}}">{{$key}}</a></td>
                    <td class="border border-slate-300 px-4 py-3">{{$bill[0]->user->name}}</td>
                    <td class="border border-slate-300 px-4 py-3">{{date('d/m/Y',strtotime($bill[0]->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection