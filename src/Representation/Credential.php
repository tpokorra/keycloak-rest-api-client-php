<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Representation;

/**
 * @method int|null getCreatedDate()
 * @method int|null getCredentialData()
 * @method string|null getId()
 * @method int|null getPriority()
 * @method string|null getSecretData()
 * @method bool|null getTemporary()
 * @method string|null getType()
 * @method string|null getUserLabel()
 * @method string|null getValue()
 * @method self withCreatedDate(?int $createdDate)
 * @method self withCredentialData(?int $credentialData)
 * @method self withId(?string $id)
 * @method self withPriority(?int $priority)
 * @method self withSecretData(?string $secretData)
 * @method self withTemporary(?bool $temporary)
 * @method self withType(?string $type)
 * @method self withUserLabel(?string $userLabel)
 * @method self withValue(?string $value)
 *
 * @codeCoverageIgnore
 */
class Credential extends Representation
{
    public function __construct(
        protected ?int $createdDate = null,
        protected ?int $credentialData = null,
        protected ?string $id = null,
        protected ?int $priority = null,
        protected ?string $secretData = null,
        protected ?bool $temporary = null,
        protected ?string $type = null,
        protected ?string $userLabel = null,
        protected ?string $value = null,
    ) {
    }
}
