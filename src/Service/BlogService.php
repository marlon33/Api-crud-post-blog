<?php
namespace App\Service;

use App\Exception\BlogException;
use App\Repository\BlogRepository;

final class BlogService
{
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function getAll(): array
    {
    	/* Chama a função getAll() que esta no arquivo Repository/BlogRepository.php e deve ser retornado um array*/
        return $this->blogRepository->getAll();
    }
}
