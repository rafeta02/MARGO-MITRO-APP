<?php

namespace App\Http\Requests;

use App\Models\Salesperson;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalespersonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salesperson_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'area_pemasarans.*' => [
                'integer',
            ],
            'area_pemasarans' => [
                'array',
            ],
        ];
    }
}
