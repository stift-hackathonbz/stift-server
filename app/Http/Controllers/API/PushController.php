<?php

namespace App\Http\Controllers\API;

use App\Checklist;
use App\Http\Controllers\Controller;
use App\Services\PushyAPI;

class PushController extends Controller
{
    /**
     * @param $rfid
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $checklist = Checklist::with(['tools', 'tools.currentPlace'])->first();
        $forgot = $checklist->tools->reject(function ($tool) {
            return $tool->currentPlace->type === 'car';
        });

        if (count($forgot) > 0) {
            // Payload data you want to send to devices
            $data = [
                'title' => 'Stift - Digital assistant for artisans',
                'message' => 'You forgot your stuff.',
                'url' => 'https://stift-server.herokuapp.com/checklist',
                'image' => 'https://karriere-suedtirol.com/wp-content/uploads/2019/08/logo-lvh.jpg'
            ];

            // The recipient device tokens
            $to = '/topics/default';

            // Optional push notification options (such as iOS notification fields)
            $options = [
                'notification' => [
                    'badge' => 1,
                    'sound' => 'ping.aiff',
                    'body'  => "Hello World \xE2\x9C\x8C"
                ]
            ];

            // Send it with Pushy
            PushyAPI::sendPushNotification($data, $to, $options);
        }

        return response()->noContent();
    }
}
