<?php

namespace Backpack\Base\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AccountInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return Auth::check();
    }

    /**
     * Restrict the fields that the user can change.
     *
     * @return array
     */
    protected function validationData()
    {
        return $this->only(backpack_authentication_column(), 'name');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();

        return [
            backpack_authentication_column() => [
                'required',
                backpack_authentication_column() == 'email' ? 'email' : '',
                Rule::unique($user->getTable())->ignore($user->getKey()),
            ],
            'name' => 'required',
        ];
    }
}
