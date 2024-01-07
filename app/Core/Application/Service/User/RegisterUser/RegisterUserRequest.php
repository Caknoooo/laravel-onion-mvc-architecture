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

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getImage(): UploadedFile
    {
        return $this->image;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
