<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBusiness;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BusinessController extends Controller{

    private $httpClient;
    private $externalApiUrl;

    public function __construct(){
        $this->httpClient = new Client();
        //   $this->externalApiUrl = config('services.externalApiUrl');
        $this->externalApiUrl = env('EXTERNAL_API_URL', 'http://localhost:777');

    }

    public function index()
    {
        return view('admin.pages.business.list');
    }

    public function businessRegistration(){
        return view('business-registration');
    }

    public function store(Request $request){
        try {

            $business = $request->only('name','phoneNumber','businessShortCode');

            if($business){
                $response = $this->httpClient->post( "{$this->externalApiUrl}/business/create", [
                    'body' => json_encode($business),
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                ]);
                $responseData = json_decode($response->getBody(), true);
                 //dd($responseData);
                return response()->json(['message' => 'Request successful','status'=>'OK','code'=>'200', 'data' => $responseData], 200);

            }else{
                return response()->json(['message' => 'No data provided','status'=>'FAILED','code'=>'400'], 400);
            }

        }catch (\Exception $exception){

        }
        return null;
    }

    public function ilist(){
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

    public function businessRegistrationPost(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $businessRegistration = $request->only('name','phoneNumber','businessShortCode','administrationPhoneNumber','tinNumber','administrationPhoneNumber','email','status','contactNumberPhone','contactPerson');
            $businessRegistration['createdDate'] = Carbon::now();
            //dd($businessRegistration);
            if($businessRegistration){
                $response = $this->httpClient->post( "{$this->externalApiUrl}/business/create", [
                    'body' => json_encode($businessRegistration),
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ],
                ]);
                $responseData = json_decode($response->getBody(), true);
               // dd($responseData);
                if (isset($responseData['id'])) {

                    // Update the user_business table with the business_id
                    UserBusiness::where('user_id', Auth::id())->update([

                        'business_id' => $responseData['id'],
                        'business_name'=>$responseData['name'],
                        'phoneNumber'=> $responseData['phoneNumber'],
                        'businessShortCode'=>$responseData['businessShortCode'],
                        'tinNumber'=>$responseData['tinNumber'],
                        'contactPerson'=>$responseData['contactPerson'],
                        'createdDate'=>$responseData['createdDate'],

                    ]);
                }

                return response()->json(['message' => 'Request successful','status'=>'OK','code'=>'200', 'data' => $responseData], 200);

            } else{
                return response()->json(['message' => 'No data provided','status'=>'FAILED','code'=>'400'], 400);
            }
        }catch (\Exception $exception){
            Log::error("An error occurred: " . $exception->getMessage());
            return response()->json(['message' => 'An error occurred', 'error' => $exception->getMessage()], 500);
        }
    }


    public function add(){
        return view('admin.pages.business.Business-registration');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */

    public function details($id)
    {
        try {
            if ($id) {

                $businessDetails = $this->httpClient->get("{$this->externalApiUrl}/business/{$id}");
                $detailsResponse = json_decode($businessDetails->getBody(), true);

                $response = $this->httpClient->get("{$this->externalApiUrl}/product/businessId/{$id}");
                $responseData = json_decode($response->getBody(), true);

                    if ($responseData && $detailsResponse) {
                      // dd($detailsResponse);
                        return view('admin.pages.business.Business-details', [
                            'business' => $responseData,
                             'businessInfo' => $detailsResponse
                        ]);
                    }
                    else {
                        // Return the view with an error message if no data was provided
                        return view('admin.pages.business.Business-details', ['info' => 'No Product Found']);
                    }
            } else {
                return view('admin.pages.business.Business-details', ['error' => 'Invalid ID provided, Provide correct ID']);
            }
        } catch (\Exception $exception) {
            Log::error("Error fetching business details: " . $exception->getMessage());
            return view('admin.pages.business.Business-details', ['error' => 'An error occurred while processing your request']);
        }
    }

    public function businessOwner()
    {
        $getBusinessOwners = DB::select("
        SELECT u.name, u.email, ub.business_name, ub.phoneNumber, ub.businessShortCode, ub.tinNumber, ub.contactPerson
        FROM users AS u
        JOIN aljsw.user_business AS ub ON u.id = ub.user_id
        WHERE u.role = 'client'
    ");
        $businessOwnersCollection = collect($getBusinessOwners);
      //  dd($businessOwnersCollection);
        return view('admin.pages.staff.business-owner', ['owners' => $businessOwnersCollection])
            ->with('owners_json', $businessOwnersCollection->toJson());
    }

}
