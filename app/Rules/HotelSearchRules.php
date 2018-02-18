<?php

namespace App\Rules;

use Illuminate\Validation\Rule;
use App\Enum\CountryCodeEnum;
use Validator;

class HotelSearchRules
{
    /**
     * Array of rules for search hotels
     */
    private static $validationRule = [
        'destinationCity' => 'string|max:100',
        'minTripStartDate' => 'date_format:"Y-m-d"|before_or_equal_date:maxTripStartDate',
        'maxTripStartDate' => 'date_format:"Y-m-d"',
        'lengthOfStay' => 'integer',
        'minStarRating' => 'integer|between:1,5|less_than_or_equal:maxStarRating',
        'maxStarRating' => 'integer|between:1,5',
        'minGuestRating' => 'integer|between:1,5|less_than_or_equal:maxGuestRating',
        'maxGuestRating' => 'integer|between:1,5',
        'minTotalRate' => 'integer|less_than_or_equal:maxTotalRate',
        'maxTotalRate' => 'integer',
    ];

    /**
     * Get rules for search hotle
     * @param array $fields
     *
     * @return array
     */
    public static function getAllValidation(array $fields) {
        self::$validationRule['destinationCountry'] = Rule::in(array_keys(CountryCodeEnum::getAllCountriesCodes()));
        return self::$validationRule;
    }

}