<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Collection;

use Fschmtt\Keycloak\Representation\User;

/**
 * @codeCoverageIgnore
 */
class UserCollection extends Collection
{
    public static function getRepresentationClass(): string
    {
        return User::class;
    }
}
