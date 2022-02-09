<?php

namespace App\Http\Requests\Car;

use App\Http\Requests\BaseFormRequest;
use App\Models\Car;
use App\Policies\Abilities;

class DeleteCarRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(Abilities::DELETE, Car::class);
    }
}
