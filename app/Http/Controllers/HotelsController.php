<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\CountryCodeEnum;
use Validator;
use App\Http\Helpers\ApiConsumingHelper;
use App\Rules\HotelSearchRules;

class HotelsController extends Controller
{
    /**
     * DEFAULT URL FOR API
     */
    const URL = 'https://offersvc.expedia.com/offers/v2/getOffers?scenario=deal-finder&page=foo&uid=foo&productType=Hotel';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotels(Request $request)
    {
        $validationRules = HotelSearchRules::getAllValidation($request->all());
        $fields = $request->only(array_keys($validationRules));
        $validator = Validator::make($fields, $validationRules);

        $errors = [];
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $fields = [];
        }

        $hotels = json_decode(ApiConsumingHelper::callAPI(ApiConsumingHelper::buildQueryString(self::URL, $fields)), true);

        return view("hotels", [
            'hotels' => $hotels,
            'countriesCodes' => CountryCodeEnum::getAllCountriesCodes(),
            "oldData" => $request->all(),
            "errors" => $errors]);
    }
}