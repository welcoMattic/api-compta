<?php

declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\ObjectMapper\Attribute\Map;

class PieceDTO
{
    public function __construct(
        public ?string $date = null,
        public ?string $journal = null,
        public ?string $moyenPaiement = null,
        public ?string $ref = null,
        public ?int $numero = null,
        /**
         * @var LigneDTO[]
         */
        #[Map(if: false)]
        public array $lignes = [],
    ) {
    }

    public function addLigne(LigneDTO $ligne): void
    {
        $ligne->index = count($this->lignes) + 1;
        $this->lignes[] = $ligne;
    }
}
