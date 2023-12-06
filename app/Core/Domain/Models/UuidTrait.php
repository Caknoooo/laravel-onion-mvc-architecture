<?php

namespace App\Core\Domain\Models;

use App\Exceptions\UserException;
use Ramsey\Uuid\Uuid;
use Exception;

trait UuidTrait
{
    private ?string $uuid;

    /**
     * @param string $uuid
     * @throws Exception
     */
    public function __construct(?string $uuid = null)
    {
        if($uuid && !Uuid::isValid($uuid)) {
            UserException::throw('Invalid UUID', 1000, 422);
        }
        $this->uuid = $uuid ?? Uuid::uuid4()->toString();
    }

    public function toString(): ?string
    {
        return $this->uuid;
    }

    /**
     * @throws Exception
     */
    public static function generate(): self
    {
        return new self(Uuid::uuid4());
    }
}
