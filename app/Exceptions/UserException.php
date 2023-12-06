<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class UserException extends Exception
{
    private static int $status;

    public function __construct(string $message, int $code, int $status = 500)
    {
        self::$status = $status;
        parent::__construct($message, $code);
    }

    /**
     * @throws Exception
     */
    public static function throw(string $message, int $code, int $status = 500): void
    {
        throw new self($message, $code, $status);
    }

    public function render(): JsonResponse
    {
        return response()->json([
          'success' => false,
          'message' => $this->message,
          'code' => $this->code,
        ], self::$status);
    }
}
