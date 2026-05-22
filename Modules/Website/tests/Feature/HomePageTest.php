<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('home page loads successfully', function () {
    $this->get('/')->assertStatus(200);
});

test('home page shows the app name', function () {
    $this->get('/')->assertSee(config('app.name'));
});

test('home page links to the admin panel', function () {
    $this->get('/')->assertSee(url('/admin'), false);
});

test('home page has an SEO meta description', function () {
    $this->get('/')->assertSee('<meta name="description"', false);
});

test('home page returns HTML content type', function () {
    $this->get('/')->assertHeader('Content-Type', 'text/html; charset=UTF-8');
});
