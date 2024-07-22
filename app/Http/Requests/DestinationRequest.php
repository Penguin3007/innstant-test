<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinationRequest extends FormRequest
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
        return [
            'radius' => 'required|numeric'
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        if ($this->getMethod() == 'GET') {
            $data['radius'] = $this->get('radius');
        }

        return $data;
    }
}
