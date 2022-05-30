<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Users;

class CreateUsersRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'mail_address' => ['required', 'email', 'unique:users,mail_address', 'max:100'],
            'password' => ['required', 'max:255', 'regex:/^\S*$/u'],
            'password_comfirm' => ['required_if:password,!null', 'same:password'],
            'address' => ['max:255'],
            'phone' => ['max:15, integer']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên',
            'mail_address' => 'Địa chỉ email',
            'password' => 'Mật khẩu',
            'password_comfirm' => 'Mật khẩu xác nhận',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại'
        ];
    }
}
