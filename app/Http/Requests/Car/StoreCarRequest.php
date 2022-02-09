<?php

namespace App\Http\Requests\Car;

use App\Http\Requests\BaseFormRequest;
use App\Models\Car;
use App\Policies\Abilities;

class StoreCarRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(Abilities::CREATE, Car::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'make_id' => 'required|integer',
            'model' => 'required|string',
            'horsepower' => 'required|integer',
            'year_of_issue' => 'required|integer',
        ];
    }
}
