<?php

namespace App\Core\Application\Service\User\RegisterUser;

use App\Core\Application\Image\ImageUpload;
use App\Core\Domain\Infrastructure\Interfaces\UserRepositoryInterface;
use App\Core\Domain\Models\Email;
use App\Core\Domain\Models\User\User;
use App\Exceptions\UserException;

class RegisterUserService
{
    private UserRepositoryInterface $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * @throws UserException
     */
    public function execute(RegisterUserRequest $request)
    {
        $registeredUser = $this->user_repository->getUserByEmail($request->getEmail());
        if ($registeredUser) {
            throw new UserException('email telah terdaftar', 1002, 404);
        }

        $image_url = ImageUpload::create(
            $request->getImage(),
            'images',
            $request->getEmail(),
            'profile'
        )->upload();

        $user = User::create(
            $request->getName(),
            new Email($request->getEmail()),
            $image_url,
            $request->getPassword()
        );

        $this->user_repository->persist($user);
    }
}
