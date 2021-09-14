<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\provider;

class ProviderController extends Controller
{
    public function store(Request $request)
    {
        $datas = $request->all();
        $provider = new provider();
        $provider->name = $datas['name'];
        $provider->phone_number = $datas['phone_number'];
        $provider->email = $datas['email'];
        $provider->save();
        return response()->json([
            'success' => $provider->id
        ]);
    }

    public function update(Request $request,$id)
    {
        $datas = $request->all();
        $provider = provider::find($id);
        $provider->name = $datas['name'];
        $provider->phone_number = $datas['phone_number'];
        $provider->email = $datas['email'];
        $provider->save();
        return response()->json([
            'success' => ($provider->save())?1:0
        ]);
    }

    public function destroy(Request $request,$id)
    {
        
    }

    public function get(Request $request)
    {
        $allProvider = provider::all();
        return response()->json([
            'allProvider' => $allProvider
        ]);
    }
}
