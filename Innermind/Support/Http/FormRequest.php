<?php

namespace Innermind\Support\Http;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

abstract class FormRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @TODO: We will manage authorization in middleware?
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}