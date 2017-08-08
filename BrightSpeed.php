<?php

class BrightSpeed extends MerchantGatewayInterface
{
	
	function authorize(Transaction $transaction,$order)
	{
		
		extract((array) $order);
		extract((array) $transaction);
		
		$params = (object) array();
		$params->username = $this->username;
		$params->password = $this->password;
		$params->source = $orderId;
		$params->lastname = $lastName;
		$params->firstname = $firstName;
		$params->address = $address;
		$params->city = $city;
		$params->state = $state;
		$params->zipcode = $zipCode;
		$params->phonenumber = $phoneNumber;
		$params->abanumber = $achRoutingNumber;
		$params->accountnumber = $achAccountNumber;
		$params->transitnum = substr($achRoutingNumber,5);
		$params->amount = $totalAmount;
		
		$header = array();
		$headers[] = "Content-Type: multipart/form-data";
		$url = 'https://portalDev.bright-speed.com/api/v1/payments/transaction';
		
		$request = new HttpRequest($url);
		$request->headers = $headers;
		$request->body = (array) $params;
		$request->method = 'POST';
		$response = HttpClient::sendRequest($request);
		
		//parse_str($response->body, $response);
		var_dump($response);die();
		
		$this->logRequest($request);
		
		$transaction->merchantTransactionId = $merchantTransactionId;
		$transaction->responseText = $responseText;
		$transaction->avsResponse = $avsResponse;
		$transaction->cvvResponse = $cvvResponse;
		$transaction->authCode = $authCode;
		$transaction->responseType = $responseType;	
	}
	
	function capture(Transaction $transaction,$order=NULL)
	{
		
		extract((array) $order);
		extract((array) $txn);
		
		$params = (object) array();
		$params->transactionid = '';
		$params->status = '';
		
		$header = array();
		$headers[] = "Content-Type: multipart/form-data";
		$url = 'https://portalDev.bright-speed.com/api/v1/payments/transaction';
		
		$request = new HttpRequest($url);
		$request->headers = $headers;
		$request->body = (array) $params;
		$request->method = 'POST';
		$response = HttpClient::sendRequest($request);
		
		$this->logRequest($request);
		
		$transaction->merchantTransactionId = $merchantTransactionId;
		$transaction->responseText = $responseText;
		$transaction->avsResponse = $avsResponse;
		$transaction->cvvResponse = $cvvResponse;
		$transaction->authCode = $authCode;
		$transaction->responseType = $responseType;		
	}
	
	function sale(Transaction $transaction,$order)
	{
		
		extract((array) $order);
		extract((array) $transaction);
				
		$params = (object) array();
		$params->username = $this->username;
		$params->password = $this->password;
		$params->source = $orderId;
		$params->lastname = $lastName;
		$params->firstname = $firstName;
		$params->address = $address1;
		$params->city = $city;
		$params->state = $state;
		$params->zipcode = $postalCode;
		$params->phonenumber = $phoneNumber;
		$params->abanumber = $achRoutingNumber;
		$params->accountnumber = $achAccountNumber;
		$params->transitnum = substr($achRoutingNumber,5);
		$params->amount = $totalAmount;
				
		$header = array();
		$headers[] = "Content-Type: multipart/form-data";
		$url = 'https://portalDev.bright-speed.com/api/v1/payments/transaction';
		
		$request = new HttpRequest($url);
		$request->headers = $headers;
		$request->body = (array) $params;
		$request->method = 'POST';
		$response = HttpClient::sendRequest($request);
		
		$this->logApiRequest($request);
		
		$transaction->merchantTransactionId = $merchantTransactionId;
		$transaction->responseText = $responseText;
		$transaction->avsResponse = $avsResponse;
		$transaction->cvvResponse = $cvvResponse;
		$transaction->authCode = $authCode;
		$transaction->responseType = $responseType;	
	}
	
	function refund(Transaction $transaction,$order=NULL)
	{
		
		extract((array) $order);
		extract((array) $transaction);
		
		$params = (object) array();
		$params->refund_id = '';
		$params->amount = $totalAmount;
		$params->created_at = '';
		
		$header = array();
		$headers[] = "Content-Type: multipart/form-data";
		$url = "https://portalDev.bright-speed.com/api/v1/payments/transaction/$/refund";
		
		$request = new HttpRequest($url);
		$request->headers = $headers;
		$request->body = (array) $params;
		$request->method = 'POST';
		$response = HttpClient::sendRequest($request);
			
		$this->logRequest($request);
		
		$transaction->merchantTransactionId = $merchantTransactionId;
		$transaction->responseText = $responseText;
		$transaction->avsResponse = $avsResponse;
		$transaction->cvvResponse = $cvvResponse;
		$transaction->authCode = $authCode;
		$transaction->responseType = $responseType;			
	}
}
