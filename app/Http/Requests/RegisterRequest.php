<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::guard('api')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|alpha|max:60',
            'last_name'  => 'required|alpha|max:60',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|alpha_dash|min:4',
            'street'     => 'required',
            'city'       => 'required',
            'country'    => 'required',
            'phone'      => 'required',
            'zip'        => 'required|numeric|between:0,10000'
        ];
    }

    /**
     * Custom response message if user is not authorized to perform this action (already logged in).
     *
     * @return JsonResponse
     */
    public function forbiddenResponse()
    {
        return new JsonResponse(['errors' => 'Already logged in.'], 403);
    }
}