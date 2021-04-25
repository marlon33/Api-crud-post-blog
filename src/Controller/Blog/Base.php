<?php
namespace App\Controller\Blog;

use App\Service\BlogService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getBlogService(): BlogService
    {
        return $this->container->get('blog_service');
    }
}
