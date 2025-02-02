<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Collection;

use ArrayIterator;
use Countable;
use Fschmtt\Keycloak\Representation\Representation;
use InvalidArgumentException;
use IteratorAggregate;
use JsonSerializable;
use ReflectionClass;
use Traversable;

abstract class Collection implements Countable, IteratorAggregate, JsonSerializable
{
    /**
     * @var array<array-key, Representation>
     */
    protected array $items = [];

    /**
     * @param array<array-key, Representation> $items
     */
    public function __construct(iterable $items = [])
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    /**
     * @return class-string<Representation>
     */
    abstract public static function getRepresentationClass(): string;

    public function count(): int
    {
        return count($this->items);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    /**
     * @return array<array-key, Representation>
     */
    public function jsonSerialize(): array
    {
        return $this->items;
    }

    public function add(Representation $item): void
    {
        $expectedRepresentationClass = $this->getRepresentationClass();

        if (!$item instanceof $expectedRepresentationClass) {
            throw new InvalidArgumentException(
                sprintf(
                    '%s expects items to be %s representation, %s given',
                    (new ReflectionClass(static::class))->getShortName(),
                    (new ReflectionClass($expectedRepresentationClass))->getShortName(),
                    (new ReflectionClass($item))->getShortName(),
                )
            );
        }

        $this->items[] = $item;
    }

    public function first(): ?Representation
    {
        return $this->items[0] ?? null;
    }
}
