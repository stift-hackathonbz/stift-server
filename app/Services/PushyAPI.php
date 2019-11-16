<?php

namespace App\Services;

class PushyAPI
{
    public static function sendPushNotification($data, $to, $options)
    {
        // Insert your Secret API Key here
        $apiKey = config('services.pushy.secret');

        // Default post data to provided options or empty array
        $post = $options ?: [];

        // Set notification payload and recipients
        $post['to'] = $to;
        $post['data'] = $data;

        // Set Content-Type header since we're sending JSON
        $headers = [
            'Content-Type: application/json'
        ];

        // Initialize curl handle
        $ch = curl_init();

        // Set URL to Pushy endpoint
        curl_setopt($ch, CURLOPT_URL, 'https://api.pushy.me/push?api_key=' . $apiKey);

        // Set request method to POST
        curl_setopt($ch, CURLOPT_POST, true);

        // Set our custom headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Get the response back as string instead of printing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set post data as JSON
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post, JSON_UNESCAPED_UNICODE));

        // Actually send the push
        $result = curl_exec($ch);

        // Display errors
        if (curl_errno($ch)) {
            echo curl_error($ch);
        }

        // Close curl handle
        curl_close($ch);

        // Attempt to parse JSON response
        $response = @json_decode($result);

        // Throw if JSON error returned
        if (isset($response) && isset($response->error)) {
            throw new \Exception('Pushy API returned an error: ' . $response->error);
        }
    }
}
