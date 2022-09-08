<?php

namespace Shahdah\Sadded\providers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Tap
{
    public array $customerData = [];
    public array $credential = [];
    public array $response = [];
    public string $url = '';
    public string $callbackUrl = '';

    public function setCustomerData($setCustomerData)
    {
        $this->customerData['full_name'] = $setCustomerData['full_name'];
        $this->customerData['email'] = $setCustomerData['email'];
        $this->customerData['country_code'] = $setCustomerData['country_code'];
        $this->customerData['phone_number'] = $setCustomerData['phone_number'];
    }

    public function setCredential($credential)
    {
        $this->credential['token'] = $credential['token'];
    }
    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }
    public function charge(float $amount, string $currency)
    {
        $data['amount'] = $amount;
        $data['currency'] = $currency;
        $data['customer']['first_name'] = $this->customerData['full_name'];
        $data['customer']['email'] = $this->customerData["email"];
        $data['customer']['phone']['country_code'] = $this->customerData["country_code"];
        $data['customer']['phone']['number'] = $this->customerData["phone_number"];
        $data['redirect']['url'] = $this->callbackUrl;

        $data['source']['id'] = 'src_all';
        //return $data;
        $client = new Client(['base_uri' => 'https://api.tap.company/v2/']);
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->credential['token']
        ];
        $request = $client->post('charges', ['json' => $data, 'headers' => $headers]);
        //return $response->json()['transaction']['url'] ?? null;
        $data = json_decode($request->getBody()->getContents(), true);
        $this->setResponse($data);
        $this->setPaymentUrl($data['transaction']['url']);
        return $this;
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setPaymentUrl($url)
    {
        $this->url = $url;
    }

    public function getPaymentUrl()
    {
        return $this->url;
    }


    /*  public function tapCharge($token, $tap_id)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->get('https://api.tap.company/v2/charges/' . $tap_id);
        return $response->json();
    } */
}
