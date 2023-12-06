<?php

use App\Core\Domain\Infrastructure\Interfaces\UserRepositoryInterface;
use App\Core\Domain\Infrastructure\Repository\SqlUserRepository;
use Illuminate\Contracts\Foundation\Application;

/** @var Application $app */
$app->singleton(UserRepositoryInterface::class, SqlUserRepository::class);
