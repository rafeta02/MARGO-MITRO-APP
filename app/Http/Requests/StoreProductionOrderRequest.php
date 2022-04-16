<?php

namespace App\Http\Requests;

use App\Models\ProductionOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductionOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('production_order_create');
    }

    public function rules()
    {
        return [
            'productionperson_id' => [
                'required',
                'integer',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
