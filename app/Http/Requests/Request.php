<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class Request extends FormRequest
{
    public function authorize()
    {
        return Auth::user()->isSuperAdmin;
    }
}
