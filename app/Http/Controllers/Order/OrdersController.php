<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    private $httpClient;
    private $externalApiUrl;


    public function __construct(){
        $this->httpClient = new Client();
        //   $this->externalApiUrl = config('services.externalApiUrl');
        $this->externalApiUrl = env('EXTERNAL_API_URL', 'http://localhost:777');

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        return view('admin.pages.order.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param
     * @return JsonResponse
     */
    public function ilist(){
        try {
            $response = $this->httpClient->get("{$this->externalApiUrl}/order/all");
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



    public function orderSummary(){
        try {
            $response = $this->httpClient->get("{$this->externalApiUrl}/order/order-summary");
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
