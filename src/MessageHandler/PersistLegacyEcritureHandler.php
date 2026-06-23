<?php

namespace App\MessageHandler;

use App\Message\PersistLegacyEcriture;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsMessageHandler]
final class PersistLegacyEcritureHandler
{
    public function __construct(
        private HttpClientInterface $ecrituresClient
    ) {
    }
    public function __invoke(PersistLegacyEcriture $message): void
    {
        // do something with your message
        $response = $this->ecrituresClient->request('POST', '/api/ecritures', [
            'json' => $message->pieceDTO,
        ]);

        dump($response);
    }
}
