<?php
namespace App\Service;

use App\Exception\GenericException;
use App\Repository\GenericRepository;

final class GenericService
{
    private GenericRepository $genericRepository;

    public function __construct(GenericRepository $genericRepository)
    {
        $this->genericRepository = $genericRepository;
    }
    public function getAll(): array
    {
        return $this->genericRepository->getAll();
    }
}
