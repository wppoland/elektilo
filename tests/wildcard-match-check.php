<?php

/**
 * Results-map matching with the "any answer" wildcard (ProductFinderEngine::ANY).
 *
 * Precedence: an exact row, then the row with the fewest wildcards, then the
 * earliest row, then the fallback. Rows without a product are skipped, which
 * gives the same shopper outcome as before (the fallback). Mappings saved
 * before the wildcard existed must resolve exactly as they did.
 *
 * Run: php tests/wildcard-match-check.php
 */

declare(strict_types=1);

namespace Finder\Contract {
    interface HasHooks
    {
    }
}

namespace {
    define('ABSPATH', __DIR__);
    require __DIR__ . '/../lib/storefront-kit/Finder/ProductFinderEngine.php';
    require __DIR__ . '/../src/Admin/Settings.php';

    use WPPoland\StorefrontKit\Finder\ProductFinderEngine;

    ini_set('zend.assertions', '1');
    ini_set('assert.exception', '1');

    $noop   = static fn () => null;
    $engine = new ProductFinderEngine('n', 'r', 'a', 'h', 's', 'j', '1', 't', 'w', 'c', [], $noop, $noop, $noop, $noop);
    $any    = ProductFinderEngine::ANY;

    $row = static fn (int $id, array $match): array => ['product_id' => $id, 'match' => $match];
    $pick = static fn (array $answers, array $rows): int => (int) ($engine->matchResult($answers, [
        'results'  => $rows,
        'fallback' => ['product_id' => 99],
    ])['product_id'] ?? 0);

    // The wildcard can never be a saved option value or a shopper answer.
    assert(\Finder\Admin\Settings::optionSlug($any) === '');

    $rows = [
        $row(1, [$any, $any, $any]),
        $row(2, ['a', $any, $any]),
        $row(3, ['a', 'x', $any]),
        $row(4, ['a', 'x', '1']),
        $row(5, ['b', $any, '1']),
        $row(6, [$any, 'y', '1']),
    ];

    assert($pick(['a', 'x', '1'], $rows) === 4, 'exact beats any wildcard row');
    assert($pick(['a', 'x', '2'], $rows) === 3, 'one wildcard beats two');
    assert($pick(['a', 'y', '2'], $rows) === 2, 'two wildcards beat three');
    assert($pick(['b', 'y', '1'], $rows) === 5, 'tie on wildcard count goes to row order');
    assert($pick(['c', 'z', '3'], $rows) === 1, 'all-wildcard row beats the fallback');
    assert($pick(['a', 'x'], $rows) === 99, 'path length must match');
    assert($pick([], $rows) === 99, 'no answers gives the fallback');

    // A wildcard row without a product does not shadow a less specific one.
    assert($pick(['a', 'x', '2'], [$row(0, ['a', 'x', $any]), $row(7, ['a', $any, $any])]) === 7);
    // An empty exact row lets a wildcard row answer instead of the fallback.
    assert($pick(['a', 'x', '1'], [$row(0, ['a', 'x', '1']), $row(8, ['a', $any, $any])]) === 8);

    // Backward compatibility: a mapping saved before the wildcard existed.
    $legacy = [
        $row(10, ['a', 'x']),
        $row(0, ['a', 'y']),
        $row(11, ['b', 'x']),
        $row(12, ['b', 'x']),
        'junk',
        ['product_id' => 13],
    ];
    assert($pick(['a', 'x'], $legacy) === 10, 'exact match');
    assert($pick(['a', 'y'], $legacy) === 99, 'matched row without a product gives the fallback');
    assert($pick(['b', 'x'], $legacy) === 11, 'first of duplicate rows');
    assert($pick(['c', 'x'], $legacy) === 99, 'no match gives the fallback');
    assert($pick(['a'], $legacy) === 99, 'prefix is not a match');
    assert($engine->matchResult(['a'], []) === [], 'no settings gives an empty fallback');

    echo "OK: wildcard precedence and legacy mappings\n";
}
