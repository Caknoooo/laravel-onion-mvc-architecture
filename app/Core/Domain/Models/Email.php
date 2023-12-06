<?php

namespace App\Core\Domain\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Email
{
    private string $value;

    /**
     * @param string $value
     * @throws ValidationException
     */
    public function __construct(string $value)
    {
        Validator::make(
            [
            'email' => $value
      ],
            [
            'email' => 'email|email'
      ]
        )->validate();
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->value;
    }
}
