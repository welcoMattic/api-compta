<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\State\LotEcritureProcessor;
use Symfony\Component\Serializer\Attribute\Groups;

#[ApiResource(
    operations: [
        new Post(
            denormalizationContext: ['groups' => self::WRITE],
            processor: LotEcritureProcessor::class,
        )
    ]
)]
class LotEcritureInput
{
    public const string WRITE = 'lot_ecriture:write';

    /**
     * @param Ecriture[] $ecritures
     */
    public function __construct(
        #[Groups([self::WRITE])]
        public ?string $date = null,
        #[Groups([self::WRITE])]
        public ?string $journal = null,
        #[Groups([self::WRITE])]
        public ?string $moyenPaiement = null,
        #[Groups([self::WRITE])]
        public ?string $ref = null,
        #[Groups([self::WRITE])]
        public ?int $numero = null,
        #[Groups([self::WRITE])]
        public array $ecritures = [],
    ) {
    }
}
