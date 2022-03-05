<?php

namespace Phuclh\MediaManager\Unsplash;

use Livewire\Component;

class Unsplash extends Component
{
    public ?string $keyword = null;

    public int $page = 1;

    public int $perPage = 12;

    public int $totalPages = 0;

    public array $photos = [];

    protected $listeners = [
        'media-manager:back' => 'handleMediaManagerBack',
    ];

    public function updatedKeyword($value)
    {
        $this->reset('page');

        ! empty($value) ? $this->searchImages() : $this->reset('photos', 'totalPages');
    }

    public function previousPage()
    {
        if (! empty($this->keyword)) {
            $this->page = $this->page - 1;

            $this->searchImages();
        }
    }

    public function nextPage()
    {
        if (! empty($this->keyword)) {
            $this->page = $this->page + 1;

            $this->searchImages();
        }
    }

    public function searchImages()
    {
        $unsplash = app(UnsplashApi::class)->searchPhotos(
            $this->keyword,
            $this->page,
            $this->perPage
        );

        $this->photos = $unsplash->getResults();
        $this->totalPages = $unsplash->getTotalPages();
    }

    public function selectImage($index)
    {
        $photo = $this->photos[$index];

        $this->emitTo('media-manager', 'unsplash:selected', [
            'url' => $photo['urls']['regular'],
            'alt' => $photo['alt_description'],
            'caption' => $this->generateCaption($photo),
            'keyword' => $this->keyword,
            'page' => $this->page,
        ]);
    }

    public function handleMediaManagerBack($data)
    {
        $this->keyword = $data['keyword'] ?? null;
        $this->page = $data['page'] ?? 1;

        $this->searchImages();
    }

    private function generateCaption($photo): string
    {
        return 'Photo by <a href="' . $photo['user']['links']['html'] . '" target="_blank">' . $photo['user']['name'] . '</a> '
            . 'on <a href="https://unsplash.com" target="_blank">Unsplash</a>.';
    }

    public function render()
    {
        return view('media-manager::unsplash');
    }
}
