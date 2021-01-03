<?php

namespace App;

class PushNotification {

    /**
     * @param string $fcmToken
     * @param array $notification
     * @return bool
     */
    public function sendPushToSingle($fcmToken, $notification) {
        $jsonData = [
            "to" => $fcmToken,
            "notification" => $notification,
            "data" => ['type' => 'COMMON']
        ];
        $data = json_encode($jsonData);

        $url = 'https://fcm.googleapis.com/fcm/send';

        $serverKey = 'AAAA_xRUBMs:APA91bEXfO1jaWJUREfZicIrZaFJNuL7_CP0U9fBXWZQE_YCALuqabkfKfB7LVXxxNg5R_oqDvCVNtroF8xnd-rQGxXz6s2AWZFRZqY2VoTZKqvtOrTu-kEw2yNePCmA1qgAMy10WRVk';

        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$serverKey
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Oops! FCM Send Error: ' . curl_error($ch));
        }
        print_r($result);
        curl_close($ch);

        return true;
    }
}
