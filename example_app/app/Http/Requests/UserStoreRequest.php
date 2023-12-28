<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        if(request()->isMethod('post')){
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                // 'email' => 'required|email',
                'password' => 'required|min:6'
            ];
        }
        else{
            return [
                'name' => 'required',
                // 'email' => 'required|email',
                'email' => 'required|email|unique:users,email,'.request()->route('id'),
                'password' => 'required|min:6'
            ];
        }
    }
    public function messages()
    {
        if(request()->isMethod('post')){
            return [
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Email is invalid!',
                'email.unique' => 'Email is already taken!',
                'password.required' => 'Password is required!',
                'password.min' => 'Password must be at least 6 characters!'
            ];
        }
        else{
            return [
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Email is invalid!',
                'email.unique' => 'Email is already taken!',
                'password.required' => 'Password is required!',
                'password.min' => 'Password must be at least 6 characters!'
            ];
        }
    }
}
