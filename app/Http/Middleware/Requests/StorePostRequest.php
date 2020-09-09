<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
                      'title'   =>  'required|max:255',
                      //"slug"=>"required|alpha_dash|min:5|unique:posts,slug,except,{$this->post->id}",
                      'slug'    =>  [ 'required',
                                    'alpha_dash',
                                    'min:5',
                                    Rule::unique('posts', 'slug')->ignore($this->post),
                                  ],
                      'postBody'=>'required',
                      'imageFile'=>'sometimes|nullable|image',
            //
                 ];
    }
    public function messages()
    {
        return[

                'title.required'=>'Title is Mandatory',
                'slug.required'=>'Slug is mandatory',
                'slug.unique'=>'Slug should be unique',
                'postBody.required'=>'Body is mandatory',
                'imageFile.image'=>'The file should be an image file',

      ];
    }
}
