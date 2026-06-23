<?php

declare(strict_types=1);

namespace App\Dto;

use App\ApiResource\Ecriture;
use Symfony\Component\ObjectMapper\Attribute\Map;

class LigneDTO
{
    public function __construct(
        public ?string $libelle = null,
        public ?string $codeCompte = null,
        #[Map(transform: [self::class, 'transforMontantToDebit'], source: 'montant')]
        public int $debit = 0,
        #[Map(transform: [self::class, 'transforMontantToCredit'], source: 'montant')]
        public int $credit = 0,
        #[Map(if: false)]
        public ?int $index = null,
        #[Map(if: false)]
        public ?int $indexTVA = null,
    ) {
    }

    public static function transforMontantToDebit(int $montant, Ecriture $ecriture): int
    {
        if ($ecriture->sens === \App\Enum\Sens::DEBIT) {
            return $montant;
        }

        return 0;
    }

    public static function transforMontantToCredit(int $montant, Ecriture $ecriture): int
    {
      if ($ecriture->sens === \App\Enum\Sens::CREDIT) {
          return $montant;
      }

      return 0;
    }
}
