<?php

namespace App\Http\Requests\Make;

use App\Http\Requests\BaseFormRequest;
use App\Models\Make;
use App\Policies\Abilities;

class StoreMakeRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(Abilities::CREATE, Make::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        ];
    }
}
