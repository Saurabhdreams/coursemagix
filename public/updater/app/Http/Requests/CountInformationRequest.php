<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ImageMimeTypeRule;

class CountInformationRequest extends FormRequest
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
      'user_language_id' => request()->isMethod('POST') ? 'required' : '',
      'icon' => 'required_if:theme_version,3',
      'color' => 'required_if:theme_version,3',
      'title' => 'required',
      'image' => [
        'required_if:theme_version,4,6',
        new ImageMimeTypeRule()
      ],
      'amount' => 'required_if:theme_version,1,2,3,4,6|numeric',
      'serial_number' => 'required|numeric'
    ];
  }

  public function messages()
  {
    return [
      'user_language_id.required' => 'The language field is required.'
    ];
  }
}
