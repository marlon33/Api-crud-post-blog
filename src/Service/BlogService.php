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

    public function findAndGet(int $postId): object
    {
        return $this->blogRepository->findAndGet($postId);
    }

    public function getAll(): array
    {
    	/* Chama a função getAll() que esta no arquivo Repository/BlogRepository.php e deve ser retornado um array*/
        return $this->blogRepository->getAll();
    }
    public function create(array $input):array
    {
        /* Torna o $input que e um array em um objeto para ser enviado ao BlogRepository melhor forma de ser tratado */
        $post = json_decode((string) json_encode($input), false);
        return $this->blogRepository->create($post);
    }
    public function getOne(int $postId): object
    {
        return $this->findAndGet($postId);
    }

    public function update (array $input, int $postId): object{
        $post = $this->findAndGet($postId);
        $data = json_decode((string) json_encode($input), false);
        return $this->blogRepository->update($post, $data);
    }
    public function delete(int $postId): object
    {
        $this->findAndGet($postId);
        return $this->blogRepository->delete($postId);
    }
}
