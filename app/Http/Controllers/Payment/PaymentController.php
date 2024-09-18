<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller{


    private $httpClient;
    private $externalApiUrl;


    public function __construct(){
        $this->httpClient = new Client();
        //   $this->externalApiUrl = config('services.externalApiUrl');
        $this->externalApiUrl = env('EXTERNAL_API_URL', 'http://localhost:777');

    }

    public function index(){
        return view('admin.pages.payment.payment-list');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param
     * @return JsonResponse
     */

    public function ilist()
    {
        try {

            $response = $this->httpClient->get("{$this->externalApiUrl}/payments/all");
            $responseData = json_decode($response->getBody(), true);
            //d($responseData);

            if ($response) {
                return response()->json(['message' => 'Request successful', 'status'=>'OK', 'data' => $responseData], 200);
            } else {
                return response()->json(['message' => 'No data provided'], 400);
            }
        } catch (\Exception $exception) {
            Log::error("An error occurred: " . $exception->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $exception->getMessage()], 500);
        }
    }

}
