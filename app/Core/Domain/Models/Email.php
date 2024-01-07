<?php

namespace App\Core\Domain\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Email
{
    private string $value;

    /**
     * @throws ValidationException
     */
    public function __construct(string $value)
    {
        Validator::make(
            [
                'email' => $value,
            ],
            [
                'email' => 'email|email',
            ]
        )->validate();
        $this->value = $value;
    }

    public function toString(): string
    {
        return $this->value;
    }
}
