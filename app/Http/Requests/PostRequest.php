<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {


        $post = $this->route()->parameter('post');

        // si el estatus es 1=borrador solo valida estos datos
        $rules = [
          'name' => 'required',  
          'slug' => 'required|unique:posts',  
          'status' => 'required|in:1,2', 
          'file' => 'image' 
        ];

        // si existe el post
        if($post){
            $rules['slug'] = 'required|unique:posts,slug,'.$post->id;
        }

        // si el estatus es 2=publicado tiene que validar los demas campos
        if($this->status == 2){
            // unir dos array
            $rules = array_merge($rules,[
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required',
            ]);
        }

        return $rules;
    }
}
