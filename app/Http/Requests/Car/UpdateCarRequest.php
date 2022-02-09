<?php

namespace App\Http\Requests\Car;

use App\Http\Requests\BaseFormRequest;
use App\Models\Car;
use App\Policies\Abilities;

class UpdateCarRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(Abilities::UPDATE, Car::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'make_id' => 'integer',
            'model' => 'string',
            'horsepower' => 'integer',
            'year_of_issue' => 'integer',
        ];
    }
}
