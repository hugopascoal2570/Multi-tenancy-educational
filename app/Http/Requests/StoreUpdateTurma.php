<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTurma extends FormRequest
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
            'name' => 'required|min:4|max:255',
            'room_id' => 'required',
            'teacher' => 'required',
        ];
    }
    public function messages()
    {

        return [
            'name.required' => 'Você deve inserir um nome para a turma',
            'name.min' => 'Você deve inserir um nome de pelo menos 4 caracteres para a turma',
            'name.max' => 'Você deve inserir um nome de no máximo 255 caracteres para a turma',
            'room_id.required' => 'Você deve inserir uma sala de aula para a turma',
            'teacher.required' => 'Você deve inserir ao menos um professor para a turma',
        ];
    }
}
