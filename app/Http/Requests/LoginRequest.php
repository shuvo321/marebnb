<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Http\JsonResponse;

class LoginRequest extends FormRequest
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
            'email'    => 'required',
            'password' => 'required'
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
