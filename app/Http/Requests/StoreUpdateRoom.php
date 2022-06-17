<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRoom extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'numberRoom' => 'required',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',
        ];
    }

    public function messages()
    {

        return [
            'end.required' => 'Você deve inserir um horário para a disciplina',
            'end.date_format:H:i' => 'você deve inserir uma hora válida',
            'end.after:start' => 'o horário de fim de aula não pode ser antes do horário de inicio.',
        ];
    }
}
