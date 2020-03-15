<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Representation;

class DecisionStrategyAffirmative implements DecisionStrategy
{
    public function __toString(): string
    {
        return 'AFFIRMATIVE';
    }
}
