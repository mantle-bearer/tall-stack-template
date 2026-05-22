<?php

pest()->extend(Tests\TestCase::class)
    ->in('Feature');

pest()->extend(Tests\TestCase::class)
    ->in('../Modules/Website/tests/Feature');

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});
