<?php

namespace App\Http\Requests\Make;

use App\Http\Requests\BaseFormRequest;
use App\Models\Make;
use App\Policies\Abilities;

class DeleteMakeRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(Abilities::DELETE, Make::class);
    }
}
