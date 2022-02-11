<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CampaignImport;

class CampaignController extends Controller
{
    public function index(){
        return view('campaign_index');
    }

    public function store(Request $request){

        $file = $request->file('file');

        $import = new CampaignImport($request->input('campaign_name'), $request->input('campaign_date'));
        $import->import($file);

        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }
        
        return back()->withStatus('Kayıt başarılı bir şekilde kayıt edildi.');

    }
}
