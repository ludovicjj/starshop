<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

readonly class IssService
{
    public function __construct(
        private CacheInterface $issLocationPool,
        private HttpClientInterface $client,
        private LoggerInterface $customAuditLogger,
    ) {
    }

    public function getIssData(bool $isLoggable = true): array
    {
        return $this->issLocationPool->get('iss_location_data', function () use ($isLoggable) {
            $context = [
                'method' => 'GET',
                'url' => 'https://api.wheretheiss.at/v1/satellites/25544',
            ];

            if ($isLoggable) {
                $reflection = new \ReflectionClass($this->issLocationPool);
                $property = $reflection->getProperty('pool');
                $adapter = $property->getValue($this->issLocationPool);
                $context['class'] = get_class($adapter);

                $this->customAuditLogger->info('[{method}] request sending to {url} handling by {class}', $context);
            }

            $response = $this->client->request($context['method'], $context['url']);

            return $response->toArray();
        });
    }
}
