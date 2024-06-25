<?php

/*
 * This file is part of the API Platform project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Owl\Shared\Infrastructure\DataProvider\Orm\Util;

use Owl\Shared\Domain\DataProvider\Util\QueryNameGeneratorInterface;

/**
 * Utility functions for working with Doctrine ORM query.
 */
final class QueryNameGenerator implements QueryNameGeneratorInterface
{
    private int $incrementedAssociation = 1;

    private int $incrementedName = 1;

    /**
     * @inheritdoc
     */
    public function generateJoinAlias(string $association): string
    {
        return sprintf('%s_a%d', $association, $this->incrementedAssociation++);
    }

    /**
     * @inheritdoc
     */
    public function generateParameterName(string $name): string
    {
        return sprintf('%s_p%d', str_replace('.', '_', $name), $this->incrementedName++);
    }
}
