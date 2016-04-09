<?php
namespace CodeDelivery\Http\Requests;

class AdminClientRequest extends Request
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
            'user.name' => 'required|max:100|min:3',
            'user.email' => 'required|max:100|min:3',
            'phone' => 'required|max:11|min:3',
            'address' => 'required|max:500|min:3',
            'city' => 'required|max:100|min:3',
            'state' => 'required|max:100|min:2',
            'zipcode' => 'required|max:9|min:2',
        ];
    }
}
