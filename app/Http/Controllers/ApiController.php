<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Facades\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function index(){
        return view ('index');
    }
    
    public function search_view(){

        return view('search_view');
    }

    public function search(Request $request){

        $data = $request->search;
        $result = api::get("https://brains.tradingeconomics.com/v2/search/wb,fred,comtrade?q={$data}")->json();
        $filter = $result['hits'];
        //dd($result['hits']);
        return view('search_result', compact('filter'));
    }

    public function imports()
    {
        $brazil = api::get('import/brazil?client=guest:guest')->json();
        $china = api::get('import/china?client=guest:guest')->json();
        $portugal = api::get('import/portugal?client=guest:guest')->json();
        $usa = api::get('import/united%20states?client=guest:guest')->json();
        //dd($brazil);
        return view('imports', compact('brazil', 'china', 'portugal', 'usa'));
    }

    public function exports(){

        $brazil = api::get('export/brazil?client=guest:guest')->json();
        $china = api::get('export/china?client=guest:guest')->json();
        $portugal = api::get('export/portugal?client=guest:guest')->json();
        $usa = api::get('export/united%20states?client=guest:guest')->json();
        //dd($brazil);
        return view('exports', compact('brazil', 'china', 'portugal', 'usa'));
    }
}
