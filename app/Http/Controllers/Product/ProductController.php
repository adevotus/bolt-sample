<?php

namespace App\Http\Controllers\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    private $httpClient;
    private $externalApiUrl;


    public function __construct(){
       $this->httpClient = new Client();
         // $this->externalApiUrl = config('services.externalApiUrl');
          $this->externalApiUrl = env('EXTERNAL_API_URL', 'http://localhost:777');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.pages.product.list');
    }
    public function add(){
        return view('admin.pages.product.add-product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request){
        try {

            $data = $request->only('name','pictureLink','unit','description','code','color','unitMeasure',
                'sellingPrice','purchasePrice','includeShipping',
                'unitShippingPrice','institution','productStatus'
            );
            $data['productStatus'];

            $institutionId = $data['institution'];
            $productStatus = $data['productStatus'];
            //dd($data);
            if($data){
                $response = $this->httpClient->post( "{$this->externalApiUrl}/product/$institutionId/$productStatus/product", [
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


    public function ilist(){
        try {

            $response = $this->httpClient->get("{$this->externalApiUrl}/product/all");
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

    public function productStatus(){
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
            $response = $this->httpClient->get("{$this->externalApiUrl}/product/product-summary");
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

    public function edit($id){
        try {

            if ($id){

                $response = $this->httpClient->get("{$this->externalApiUrl}/product/$id");
                $responseData = json_decode($response->getBody(), true);
                if ($responseData) {

                    return view('admin.pages.product.edit-product',[
                        'productDetails' => $responseData
                    ]);

                }

            }else{
           return view('admin.pages.product.edit-product');
            }

        }catch (\Exception $exception){
            Log::error("An error occurred: " . $exception->getMessage());
        }
    }

}
