<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
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
     //* Think of this class as a request to submit this form. So we can take the rules from our RegistrationController.php and return them here.
    public function rules()
    {
        return [
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required|confirmed'
        ];
    }
    public function persist()
    {
      //* request([]) is the same as request(->only(['']))
      $user = User::create($this->only(['name', 'email', 'password']));
      //* sign in the user.
      auth()->login($user);
      //* Send new users a welcome email:
      //* we can do that by using the Mail facade.
      \Mail::to($user)->send(new Welcome($user));
    }
}
