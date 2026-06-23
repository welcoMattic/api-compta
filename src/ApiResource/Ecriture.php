<?php

namespace App\ApiResource;

use App\Enum\Sens;
use Symfony\Component\Serializer\Attribute\Groups;

class Ecriture
{
    public function __construct(
        #[Groups([LotEcritureInput::WRITE])]
        public string $codeCompte,
        #[Groups([LotEcritureInput::WRITE])]
        public string $libelle,
        #[Groups([LotEcritureInput::WRITE])]
        public int $montant,
        #[Groups([LotEcritureInput::WRITE])]
        public Sens $sens,
    ) {
    }
}
