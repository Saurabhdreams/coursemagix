<?php

namespace App\Http\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class PackageStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|max:255',
            'term' => 'required',
            'price' => 'required',
            'status' => 'required',
            'course_categories_limit' => 'required',
            'featured_course_limit' => 'required',
            'course_limit' => 'required',
            'module_limit' => 'required',
            'lesson_limit' => 'required',
            'trial_days' => 'required_if:is_trial,1'
        ];
    }
    public function messages(): array
    {
        return [
            'trial_days.required_if' => 'Trial days is required'
        ];
    }
}
