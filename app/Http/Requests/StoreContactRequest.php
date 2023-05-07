<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
      'first_name' => ['required'],
      'second_name' => ['required'],
      'gender' => ['required'],
      'email' => ['required', 'email'],
      'postcode' => ['required', 'regex:/^(\d{3}|\p{N}{3})[-―‐ー](\d{4}|\p{N}{4})$/u', 'size:8'],
      'building_name' => ['nullable',],
      'address' => ['required'],
      'opinion' => ['required', 'max:120']
    ];
  }

  public function messages()
  {
    return [
      'first_name.required' => 'お名前（姓）は必須です。',
      'second_name.required' => 'お名前（名）は必須です。',
      'gender.required' => '性別は必須です。',
      'email.required' => 'メールアドレスは必須です。',
      'email.email' => 'メールアドレスの形式で入力してください。',
      'postcode.required' => '郵便番号は必須です。',
      'postcode.regex' => '郵便番号はハイフンありの半角で入力してください。',
      'postcode.size' => '郵便番号は8文字で入力してください。',
      'address.required' => '住所は必須です。',
      'opinion.required' => 'ご意見は必須です。',
      'opinion.max' => 'ご意見は120字以内で入力してください。',
    ];
  }
}
