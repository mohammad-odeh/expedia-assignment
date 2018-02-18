<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('less_than_or_equal', function($attribute, $value, $params, $validator){
            $other = Input::get($params[0]);
            if (empty(intval($other))) {
            	return true;
            }

            return intval($value) <= intval($other);
        });

        Validator::replacer('less_than_or_equal', function($message, $attribute, $rule, $params) {
        	$attribute = ucwords(preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $attribute));
        	$params[0] = ucwords(preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $params[0]));
            return str_replace('_', ' ' , 'The ' . $attribute . ' must be less than or equal the ' . $params[0]);
        });

        Validator::extend('before_or_equal_date', function($attribute, $value, $params, $validator){
            $other = Input::get($params[0]);
            if (empty(intval($other))) {
            	return true;
            }

   			return strtotime($validator->getData()[$params[0]]) >= strtotime($value);
        });

        Validator::replacer('before_or_equal_date', function($message, $attribute, $rule, $params) {
        	$attribute = ucwords(preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $attribute));
        	$params[0] = ucwords(preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $params[0]));
            return str_replace('_', ' ' , 'The ' . $attribute . ' date must be before or equal the ' . $params[0]);
        });
    }
}