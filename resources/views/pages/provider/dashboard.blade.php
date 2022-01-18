@extends('layout.mainLayout')

@section('title', 'List Provider')
@section('content')
<div class="container mx-auto w-full mt-10">
    <div class="w-full mt-5">
        <h1 class="text-center text-2xl">PROVIDER LIST</h1>
        <div class="text-right my-4 mx-2">
            <a href="{{url('provider/create')}}" class="bg-blue-300 px-7 py-2 rounded">ADD</a>
        </div>
        <table class="table-fixed border-collapse border border-slate-400 w-full">
            <thead>
                <th class="border border-slate-300 text-white bg-black" style="width: 10%;">No</th>
                <th class="border border-slate-300 text-white bg-black">Info</th>
            </thead>
            <tbody>
                @foreach($all as $key=>$provider)
                <tr>
                    <td rowspan="3" class="border border-slate-300 px-4 py-3 text-blue-600"><a href="{{url('provider/edit/'.$provider->id)}}">{{$key+1}}</a></td>
                    <td class="border border-slate-300 px-4 py-3">{{$provider->name}}</td>
                </tr>
                <tr>
                <td class="border border-slate-300 px-4 py-3">{{$provider->phone_number}}</td>
                </tr>
                <tr>
                <td class="border border-slate-300 px-4 py-3">{{$provider->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
<script>
    @if(Session::has('message'))
    Swal.fire({
		title: "{{Session::get('message')}}",
		icon: "{{Session::get('type')}}",
		confirmButtonClass: 'bg-blue-300 px-5 py-2',
		buttonsStyling: false,
	});
    @endif
</script>
@endsection