<?php

namespace App\Http\Requests;

use App\Rules\ImageMimeTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
      'background_color' => 'required_if:theme_version,1,2,3',
      'feature_title' => 'required_if:theme_version,1,2,3,4',
      'text' => 'required_if:theme_version,1,2,3',
      'image' => [
        'required_if:theme_version,4',
        new ImageMimeTypeRule()
      ],

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
