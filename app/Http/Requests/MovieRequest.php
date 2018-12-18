<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
        
        $movieId = $this->method() === "PUT"
            ? $this->route()->parameters['movie']->id
            : null;

        return [
            'title' => 'required|unique:movies,title' .  ($movieId ? ",$movieId" : ''),         
            'director' => 'required',
            'releaseDate'=> 'required|date_format:Y-m-d|unique:movies,releaseDate' .  ($movieId ? ",$movieId" : ''),
            'duration' => 'numeric|between:1,500',
            'imageUrl' => 'url'
        ];
    }
}
