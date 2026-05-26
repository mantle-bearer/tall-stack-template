<?php

use Tests\TestCase;

pest()->extend(TestCase::class)
    ->in('Feature');

pest()->extend(TestCase::class)
    ->in('../Modules/Website/tests/Feature');

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});
