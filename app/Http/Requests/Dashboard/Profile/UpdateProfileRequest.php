<?php

namespace App\Http\Requests\Dashboard\Profile;

use App\Models\User;

//model
use Illuminate\Validation\Rule;

// helper
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

use Symfony\Component\HttpFoundaation\Response;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
            ],
            'email' => [
                'required', 'string', 'max:255', 'email', Rule::unique('users')->where('id', '<>', Auth::user()->id),
            ],
        ];
    }
}
