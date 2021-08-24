<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ravelry extends Model
{
    use HasFactory;

    public static function getRavelryData()
    {
        // return Http::get('https://api.ravelry.com/current_user.json', [
        //     config('services.ravelry.username'),
        //     ':',
        //     config('services.ravelry.key'),
        // ]);

        // id":10319180
        // username":"Pietj

        // id":7591507
        // username":"DeBreimeisjes

        $username = config('services.ravelry.username');
        $key = config('services.ravelry.key');
        $url = "https://api.ravelry.com/designers/akkelien-smink.json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 'query=akkelien smink');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$key");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);
        // return $info;
        return $output;

        // $username = config('services.ravelry.username');
        // $key = config('services.ravelry.key');
        // $url = "https://api.ravelry.com//search";
        // $data = [
        //     'grant_type' => 'client_credentials',
        // ];

        // $response = Http::get($url, [

        // ]);
        // $decodedResponse = json_decode($response);
        // return $response;
    }
}
