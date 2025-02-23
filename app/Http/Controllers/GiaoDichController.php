<?php

namespace App\Http\Controllers;

use App\Models\GiaoDich;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class GiaoDichController extends Controller
{
    public function index(){
        $client = new Client();
$payload = [
	"USERNAME"      => "0357572879",
	"PASSWORD"      => "07012004sS",
	"DAY_BEGIN"     => Carbon::today()->format('d/m/Y'),
	"DAY_END"       => Carbon::today()->format('d/m/Y'),
	"NUMBER_MB"     => "3707012004"
];

try {
    $response = $client->post('http://103.137.185.71:2603/mb', [
        'json' => $payload
    ]);
    $data   = json_decode($response->getBody(), true);
    dd($data);
    $duLieu = $data['data'];
    foreach ($duLieu as $key => $value){
        $check = GiaoDich::where('refNo', $value['refNo'])->first();
        if(!$check){
            GiaoDich::create([
                'creditAmount' => $value['creditAmount'],
                'description' => $value[ 'description'],
                'refNo' => $value[ 'refNo'],
            ]);
        }
    }
} catch(Exception $e) {
	echo $e;
}
    }
}
