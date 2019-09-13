<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function send_user_notification_android($device_token, $data)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array (
		        'to' => $device_token,
		        'notification' =>$data
		        /*'notification' => array (
		         "body" => $data,
		          "title" => $data['type']
		        )*/
		);
		
	//	print_r($data);exit;

		/*
		$fields = array(
    		'to'  => $device_token,
    		'notification' => $data['message'],
    		'data' => $data,
    		'type' => $data['type']
    	);
    	*/
		$fields = json_encode ($fields);
		$headers = array ('Authorization: key=' . "AIzaSyAXlxLi5agtY4oBWSVvKnUFLhp_JYqgtgU",'Content-Type: application/json');
		
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
		$result = curl_exec ($ch);
		curl_close ( $ch );
		return $result;
	}
	

	function send_user_notification_ios($device_token, $data)
	{
		$deviceToken = $device_token; // "ad8c467c949b9c99b0c32151069189206e1f7072a492889f2643e1eadcc25014";  //$_GET['token'];

		// Put your private key's passphrase here:
		$passphrase = 'volive@hyd';  // $_GET['pass'];
		$ctx = stream_context_create();
//		stream_context_set_option($ctx, 'ssl', 'local_cert',"DevlopmentPEM.pem");
    	stream_context_set_option($ctx, 'ssl', 'local_cert',"production_24_10_2018_PEM.pem");
		stream_context_set_option($ctx, 'ssl', 'passphrase',$passphrase);
		// Open a connection to the APNS server
//		$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err,$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx); //Development 
	    $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err,$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);  //Production
		if (empty($fp))
			exit("Failed to connect: $err $errstr" . PHP_EOL);
		// Create the payload body
		/*$body['aps'] = array(
			'alert' => array(
			        'title' => 'New message ',
             		 'body' => $data		   	 
			 ),
			'sound' => 'default'
		);*/

		$body['aps'] = array(
    		'badge' => +1,
    		'alert' => $data['message'],
    		'info' => $data,
    		'sound' => 'default'
    	);
		// Encode the payload as JSON
		$payload = json_encode($body);
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		// Close the connection to the server
		fclose($fp);
		if (!$result)
			return 'Message not delivered';
		else
			return 'Message Successfully delivered';
	}



