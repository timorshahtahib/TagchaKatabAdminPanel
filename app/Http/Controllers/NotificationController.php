<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use function Doctrine\Common\Cache\Psr6\get;

class NotificationController extends Controller
{


    public function index()
    {


        $users = User::all();
        return view('pushNotification', compact('users'));
    }


    public function sendNotification(Request $request)
    {


        $user_id = (int)$request->user;




        if ($user_id ==0) {
            $firebaseToken = User::query()->pluck('device_token')->all();

        } else {
                $firebaseToken = User::query()->where('id','=',$user_id)->pluck('device_token')->toArray();

        }



        $SERVER_API_KEY = env('FCM_SERVER_KEY');

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);


        return back()->with('success', 'Notification send successfully.');


    }
}
