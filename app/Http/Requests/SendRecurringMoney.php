<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendRecurringMoney extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'source_id' => [
                'required',
                Rule::exists('users', 'id')->where('id', $this->user()->id),
            ],
            'recipient_email' => [
                'required',
                'email',
                Rule::exists(User::class, 'email')->whereNot('id', $this->user()->id),
            ],
            'amount' => [
                'required',
                'integer',
                'min:1',
            ],
            'reason' => [
                'required',
                'string',
                'max:255',
            ],
            'started_at' => [
                'required',
                'date:Y-m-d',
                'after_or_equal:today',
            ],
            'ended_at' => [
                'required',
                'date:Y-m-d',
                'after_or_equal:today',
            ],
        ];
    }
}
