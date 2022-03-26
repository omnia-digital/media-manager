<?php

namespace Phuclh\MediaManager\Unsplash;

use Unsplash\HttpClient;
use Unsplash\PageResult;
use Unsplash\Search;

class UnsplashApi
{
    public function __construct()
    {
        HttpClient::init([
            'applicationId' => config('media-manager.unsplash.access_key'),
            'utmSource' => config('media-manager.unsplash.utm_source'),
        ]);
    }

    public function searchPhotos(string $search, int $page, int $perPage = 15, string $orientation = 'landscape'): PageResult
    {
        return Search::photos($search, $page, $perPage, $orientation);
    }
}
