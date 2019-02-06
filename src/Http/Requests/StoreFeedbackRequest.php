<?php

namespace Mydnic\Kustomer\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => [
                'required', Rule::in(array_keys(config('kustomer.feedbacks'))),
            ],
            'message' => 'required',
            'viewport' => 'array',
        ];
    }
}
