<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name_user' => 'required | min:3',
            'comment' => 'required | max:300'
        ];
    }

    public function messages()
    {
        return [
            'name_user.required' => 'Pon tu nombre anda majo',
            'name_user.min' => 'Tu nombre es demasiado corto',
            'comment.required' => 'Si no pones comentario....',
            'comment.max' => 'Hijo mío un poco maś conciso'
        ];
    }
}
