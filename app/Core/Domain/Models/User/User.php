<?php

namespace App\Core\Domain\Models\User;

use App\Core\Domain\Models\Email;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    private UserId $id;
    private string $name;
    private Email $email;
    private string $image_url;
    private string $hash_pasword;

    /**
     * @param UserId $id
     * @param string $name
     * @param string $email
     * @param string $image_url
     * @param string $hash_pasword
     */
    public function __construct(
        UserId $id,
        string $name,
        Email $email,
        string $image_url,
        string $hash_pasword
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->image_url = $image_url;
        $this->hash_pasword = $hash_pasword;
    }

    /**
     * @throws Exception
     */
    public static function create(
        string $name,
        Email $email,
        string $image_url,
        string $hash_pasword
    ): self {
        return new self(UserId::generate(), $name, $email, $image_url, Hash::make($hash_pasword));
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    /**
     * @return string
     */
    public function getHashPassword(): string
    {
        return $this->hash_pasword;
    }

    // Relationship
}
