<?php

namespace App\Http\Controllers;

use App\Submission;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Guzzle\Http\Exception\ClientErrorResponseException;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        $checkNim = Submission::where('nim', $request->nim)->first();
        if ($request->nim) {
            return redirect(route('home'))->with(['error' => "ERROR. SUDAH PERNAH MENGAJUKAN !!!"]);
        } else {
            
            $validateInput = $request->validate([
                'name' => 'required',
                'nim' => 'required',
                'sks_old' => 'required',
                'sks_new' => 'required',
            ]);
    
            $validateInput['user_id'] = Auth::user()->id;
            
            $client = new Client();
            $res = $client->get('https://smartcampus.uinsatu.ac.id/sync-reconstruction-activity?nim=' . $request->nim);
            $res = json_decode($res->getBody()->getContents(), true);
    
            if ($res['status'] == true) {
                Submission::create($validateInput);
            }
    
            return redirect(route('home'));

        }

    }
}
