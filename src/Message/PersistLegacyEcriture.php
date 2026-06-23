<?php

namespace App\Message;

use App\Dto\PieceDTO;
use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('async')]
final class PersistLegacyEcriture
{
    /*
     * Add whatever properties and methods you need
     * to hold the data for this message class.
     */

    public function __construct(
        public PieceDTO $pieceDTO,
    ) {
    }
}
