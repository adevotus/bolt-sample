<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\UserBusiness;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{


    private $httpClient;
    private $externalApiUrl;
//    private $userBusinessInfo;


    public function __construct(){
        $this->httpClient = new Client();
        //   $this->externalApiUrl = config('services.externalApiUrl');
        $this->externalApiUrl = env('EXTERNAL_API_URL', 'http://localhost:777');
       // $this->userBusinessInfo = $this->getBusinessIdForCurrentUser();
    }
    private function getBusinessIdForCurrentUser()
    {
        return UserBusiness::where('user_id', Auth::id())->first();
    }

    public function index()
    {
        return view('client.home');
    }
    public function register(){
        return view('auth.client-registration');
    }
    public function product(){
      return view('client.pages.product-client');
    }
    public function order()
    {
        return view('client.pages.order-client');
    }
    public function business()
    {
    return view('client.pages.business-client');
    }
    public function addProduct(){
        return view('client.pages.client-add-product');
    }

    public function iListBusiness(){
        try {

            $response = $this->httpClient->get("{$this->externalApiUrl}/business/all");
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

    public function iListProduct(){
        try {

            $userBusinessInfo = $this->getBusinessIdForCurrentUser();
           // dd($userBusinessInfo['business_id']);

            $response = $this->httpClient->get("{$this->externalApiUrl}/product/businessId/{$userBusinessInfo['business_id']}");
            $responseData = json_decode($response->getBody(), true);


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


    public function addProductPost(Request $request)
    {
        try {
//            dd($request->all());

            $userBusinessInfo = $this->getBusinessIdForCurrentUser();
            // dd($userBusinessInfo['business_id']);

            $data = $request->only('name','pictureLink','unit','description','code','color','unitMeasure',
                'sellingPrice','purchasePrice','includeShipping',
                'unitShippingPrice','institution','productStatus'
            );
            $data['productStatus'];

//            $institutionId = $data['institution'];
            $productStatus = $data['productStatus'];
            //dd($data);
            if($data){
                $response = $this->httpClient->post( "{$this->externalApiUrl}/product/{$userBusinessInfo['business_id']}/$productStatus/product", [
                    'body' => json_encode($data),
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                ]);
                $responseData = json_decode($response->getBody(), true);
                //  dd($responseData);
                return response()->json(['message' => 'Request successful','status'=>'OK','code'=>'200', 'data' => $responseData], 200);

            }else{
                return response()->json(['message' => 'No data provided','status'=>'FAILED','code'=>'400'], 400);
            }
        }catch (\Exception $exception){
            return response()->json(['message' => 'An error occurred', 'error' => $exception->getMessage()], 500);

        }
    }

    public function productClientStatus(){
        try {

            $response = $this->httpClient->get("{$this->externalApiUrl}/product/status");
            $responseData = json_decode($response->getBody(), true);
            //dd($responseData);

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

    public function productSummary(){
        try {

            $userBusinessInfo = $this->getBusinessIdForCurrentUser();
            // dd($userBusinessInfo['business_id']);
            $response = $this->httpClient->get("{$this->externalApiUrl}/product/product-summary/{$userBusinessInfo['business_id']}");
            $responseData = json_decode($response->getBody(), true);
            //dd($responseData);

            if ($response) {
                return response()->json(['message' => 'Request successful', 'status'=>'OK', 'data' => $responseData], 200);
            } else {
                return response()->json(['message' => 'No data provided'], 400);
            }

        }catch (\Exception $exception){
            Log::error("An error occurred: " . $exception->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $exception->getMessage()], 500);

        }
    }

    /**
     * Update the specified resource in storage.
     * Order Summary
     *
     */
    public function orderSummary(){
        try {

            $userBusinessInfo = $this->getBusinessIdForCurrentUser();
            // dd($userBusinessInfo['business_id']);

            $response = $this->httpClient->get("{$this->externalApiUrl}/order/order-summary/{$userBusinessInfo['business_id']}");
            $responseData = json_decode($response->getBody(), true);
            //dd($responseData);
            if ($responseData) {
                return response()->json(['message' => 'Request successful', 'status'=>'OK', 'data' => $responseData], 200);
            } else {
                return response()->json(['message' => 'No data provided'], 400);
            }

        }catch (\Exception $exception){
            Log::error("An error occurred: " . $exception->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $exception->getMessage()], 500);

        }
    }



    /**
     * Update the specified resource in storage.
     *LIST OF ORDER BY BUSINESS_ID
     *
     */

    public function ilist(){
        try {
            $userBusinessInfo = $this->getBusinessIdForCurrentUser();
            // dd($userBusinessInfo['business_id']);


            $response = $this->httpClient->get("{$this->externalApiUrl}/order/{$userBusinessInfo['business_id']}/order");
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

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function paymentList()
    {
        return view('client.pages.payment-list-client');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
