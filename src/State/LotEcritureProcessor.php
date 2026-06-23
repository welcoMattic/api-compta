<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\LigneDTO;
use App\Dto\PieceDTO;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

class LotEcritureProcessor implements ProcessorInterface
{
    public function __construct(
        private ObjectMapperInterface $objectMapper
    ) {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        // Handle the state
        if (!$operation instanceof \ApiPlatform\Metadata\Post) {
            throw new \LogicException('This processor only supports POST operations.');
        }

        if (!$data instanceof \App\ApiResource\LotEcritureInput) {
            throw new \LogicException('This processor only supports LotEcritureInput data.');
        }

        assert($data instanceof \App\ApiResource\LotEcritureInput);

        $pieceDTO = $this->objectMapper->map($data, PieceDTO::class);

        foreach($data->ecritures as $ecriture) {
            $ligneDTO = $this->objectMapper->map($ecriture, LigneDTO::class);
            $pieceDTO->addLigne($ligneDTO);
        }

        dump($pieceDTO);
    }
}
