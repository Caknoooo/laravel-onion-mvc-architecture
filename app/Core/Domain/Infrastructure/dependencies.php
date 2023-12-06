<?php

use App\Core\Domain\Infrastructure\Interfaces\UserRepositoryInterface;
use App\Core\Domain\Infrastructure\Repository\SqlUserRepository;

/** @var Application $app */
$app->singleton(UserRepositoryInterface::class, SqlUserRepository::class);
