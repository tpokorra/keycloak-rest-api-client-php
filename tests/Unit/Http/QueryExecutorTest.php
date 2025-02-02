<?php

declare(strict_types=1);

namespace Fschmtt\Keycloak\Test\Unit\Http;

use Fschmtt\Keycloak\Http\Client;
use Fschmtt\Keycloak\Http\Method;
use Fschmtt\Keycloak\Http\Query;
use Fschmtt\Keycloak\Http\QueryExecutor;
use Fschmtt\Keycloak\Serializer\Serializer;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Fschmtt\Keycloak\Http\QueryExecutor
 */
class QueryExecutorTest extends TestCase
{
    public function testCallsClientWithQueryProperties(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects(static::once())
            ->method('request')
            ->with(Method::GET->value, '/path/to/resource')
            ->willReturn(new Response(body: json_encode([])));

        $executor = new QueryExecutor($client, $this->createMock(Serializer::class));
        $executor->executeQuery(
            new Query(
                '/path/to/resource',
                'array',
            )
        );
    }
}
