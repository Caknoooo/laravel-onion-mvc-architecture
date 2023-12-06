<?php

namespace App\Core\Application\Service\User\RegisterUser;

use Illuminate\Http\UploadedFile;

class RegisterUserRequest
{
    private string $name;
    private string $email;
    private UploadedFile $image;
    private string $password;

    public function __construct(
        string $name,
        string $email,
        UploadedFile $image,
        string $password
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->image = $image;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return UploadedFile
     */
    public function getImage(): UploadedFile
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
