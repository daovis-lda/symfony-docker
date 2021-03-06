<?php

declare(strict_types=1);

namespace App\Recipes\Application\Query\GetRecipesQuery;

use App\Recipes\Application\DTO\RecipeDTO;
use App\Recipes\Domain\Entity\Recipe\Recipe;
use App\Recipes\Domain\Repository\RecipeRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

class GetRecipesQueryHandler implements QueryHandlerInterface
{
    private readonly RecipeRepositoryInterface $recipeRepository;

    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @return RecipeDTO[]
     */
    public function __invoke(GetRecipesQuery $query): array
    {
        return array_map(fn (Recipe $recipe) => RecipeDTO::fromEntity($recipe), $this->recipeRepository->findAll());
    }
}
