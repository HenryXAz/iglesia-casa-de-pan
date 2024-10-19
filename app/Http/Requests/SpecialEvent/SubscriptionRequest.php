<?php

namespace App\Http\Requests\SpecialEvent;

use App\Models\SpecialEvent;
use App\Services\SpecialEvent\TicketCalculator;
use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
    private readonly SpecialEvent $specialEvent;

    public  function  __construct(
    )
    {
        $eventId = request()->route('id');
        $this->specialEvent = SpecialEvent::where('id', $eventId)->first();
    }

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
        return [
            'total_tickets' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    if ($value >= TicketCalculator::getAvailableTickets($this->specialEvent) ) {
                        $fail("The $attribute must be less than the available tickets limit");
                    }
                },
                function ($attribute, $value, $fail) {
                    if ($value == 0 ) {
                        $fail("The $attribute must be greater than 0");
                    }
                }
            ],
            'total_to_pay' => 'required|numeric',
        ];
    }
}
