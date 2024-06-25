<?php

declare(strict_types=1);

namespace Article\Application\Create;

use Article\Domain\Model\Article;
use OArticle\Domain\Repository\ArticleRepositoryInterface;

final class ArticleCreator
{
    public function __construct(
        private readonly ArticleRepositoryInterface $repository,
    ) {
    }

    public function __invoke(CreateArticleRequest $createArticleRequest): Article
    {
        $article = Article::create($createArticleRequest->getTitle(), $createArticleRequest->getDescription());

        $this->repository->save($article);

        return $article;
    }
}
