<?php

/*
 * This file is part of Chevere.
 *
 * (c) Rodolfo Berrios <rodolfo@chevere.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $containerConfigurator): void {
    // $headerFile = __DIR__ . '/.header';
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::SETS, [
        SetList::COMMON,
    ]);
    $services = $containerConfigurator->services();
    // if (file_exists($headerFile)) {
    //     $services->set(HeaderCommentFixer::class)
    //         ->call('configure', [[
    //             'header' => file_get_contents($headerFile),
    //             'location' => 'after_open',
    //         ]]);
    // }
    $services->set(ArraySyntaxFixer::class)
        ->call('configure', [[
            'syntax' => 'short',
        ]]);
    $parameters->set(Option::SKIP, [
        __DIR__ . '/vendor/*',
    ]);
};
