<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);
        $rules = [
            //
            'name' =>["required","min:3","max:50","unique:products,name,{$id},id"],
            'detail' => ["required","min:3","max:50"],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=500'

        ];
        if($this->method()=='PUT'){
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=500';
        }
        return $rules;
    }
}
