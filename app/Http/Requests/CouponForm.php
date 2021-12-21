<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponForm extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
    */
    public function authorize() {
        return true;
    }



    /**
     * Get the validation rules that apply to the request.
     * @return array
    */
    public function rules() {
        return [
            "*" => 'required',
            "coupon_name" => "unique:coupons,coupon_name",
            "discount_percentage" => "numeric|max:99|min:1",
            "validity" => "date|after:today",
            "limit" => "numeric|min:1",
        ];
    }

    public function messages() {
        return [
            "limit.numeric" => "Limit must be numeric",
        ];
    }


}
