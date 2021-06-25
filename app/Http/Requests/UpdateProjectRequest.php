<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;


class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update',$project);
      //  return Gate::allows('update',$this->route('project'));

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function persitToDb()
    {
        $Proj = Project::findOrFail($this->route('project'));
        $proj->update($this->validated());//validated() returns the validated Attribute.
        //$project->update($this->validated());
        //$this->route('project')->update($this->validated());// i dont know what to use.this or the avove one
        return $Proj;
    }// i can call this fun in update()in prpjController
}
