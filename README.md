# Livewire Media Manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/omnia-digital/media-manager.svg?style=flat-square)](https://packagist.org/packages/omnia-digital/media-manager)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/omnia-digital/media-manager/run-tests?label=tests)](https://github.com/omnia-digital/media-manager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/omnia-digital/media-manager/Check%20&%20fix%20styling?label=code%20style)](https://github.com/omnia-digital/media-manager/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/omnia-digital/media-manager.svg?style=flat-square)](https://packagist.org/packages/omnia-digital/media-manager)

A TALL Stack Media Manager to upload media files to multiple storages or select image from Unsplash, URL

https://user-images.githubusercontent.com/6707194/160046199-91dd3aa3-7687-4394-808e-18057cf5bdbc.mp4


## Installation

You can install the package via composer:

```bash
composer require omnia-digital/media-manager
```

Add Tailwind CSS classes in `tailwind.config.js`:

```js
module.exports = {
    content: [
        ...
        './vendor/omnia-digital/media-manager/resources/views/**/*.blade.php',
    ]
};
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="media-manager-config"
```

This is the contents of the published config file:

```php
return [
    'storage'    => [
        'disk' => 'public'
    ],

    'image' => [
        'allowed_file_types' => ['png', 'jpg', 'jpeg', 'gif'],

        /*
         * Max file size in KB.
         */
        'max_file_size'      => 5000,
    ],

    'unsplash' => [
        'access_key' => env('UNSPLASH_ACCESS_KEY'),

        'utm_source' => env('APP_NAME')
    ]
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="media-manager-views"
```

## How to open Media Manager modal

### Via Alpinejs

```js
this.$wire.emitTo(
    'media-manager',
    'media-manager:show',
    {
        id: 'featured-image',
        file: null,
        metadata: null
    }
);
```

### From Livewire Component

```php
use Omnia\MediaManager\WithMediaManager;

...

public function showUploader()
{
    $this->showFileManager('featured-image', $file, $metadata);
}
```

You can pass file URL as 2nd parameter so the Media Manager will show that file by default.

## Remove File from Media Manager

```php
use Omnia\MediaManager\WithMediaManager;

...

public function removeFeaturedImage()
{
    $this->image = null;

    $this->removeFileFromMediaManager();
}
```

## Events

**File Selected**

When a media file is selected, it will dispatch an event, called `media-manager:file-selected`

You can listen on that event by using AlpineJS like this:

```js
x-on:media-manager:file-selected.window="setImage"
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Josh Torres](https://github.com/joshtorres)
- [phucle](https://github.com/phuclh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
