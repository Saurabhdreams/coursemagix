<?php

namespace App\Http\Requests;

use App\Rules\ImageMimeTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
      'image' => $this->hasFile('image') ? new ImageMimeTypeRule() : '',
      'first_name' => 'required|alpha',
      'last_name' => 'required|alpha',
      'contact_number' => 'required|digits_between:10,15',
      'address' => 'required',
      'city' => 'required|alpha',
      'country' => 'required|alpha',
	  'state' => 'alpha'
    ];
  }
}
