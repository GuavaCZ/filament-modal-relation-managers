![filament-modal-relation-managers Banner](https://github.com/GuavaCZ/filament-modal-relation-managers/raw/main/docs/images/banner.jpg)


# Allows you to embed relation managers inside filament modals.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/guava/filament-modal-relation-managers.svg?style=flat-square)](https://packagist.org/packages/guava/filament-modal-relation-managers)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/guavaCZ/filament-modal-relation-managers/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/guavaCZ/filament-modal-relation-managers/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/guavaCZ/filament-modal-relation-managers/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/guavaCZ/filament-modal-relation-managers/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/guava/filament-modal-relation-managers.svg?style=flat-square)](https://packagist.org/packages/guava/filament-modal-relation-managers)

This package allows you to embed any of your relation managers inside modals using a provided filament action.

## Showcase

<video width="320" height="240" controls>
  <source src="https://github.com/GuavaCZ/filament-modal-relation-managers/raw/main/docs/images/demo_preview.mp4" type="video/mp4">
</video>

https://github.com/user-attachments/assets/9613ec16-fe3a-4b94-ba03-f589d77764fa

![Screenshot 1](https://github.com/GuavaCZ/filament-modal-relation-managers/raw/main/docs/images/screenshot_01.png)
![Screenshot 2](https://github.com/GuavaCZ/filament-modal-relation-managers/raw/main/docs/images/screenshot_02.png)
![Screenshot 3](https://github.com/GuavaCZ/filament-modal-relation-managers/raw/main/docs/images/screenshot_03.png)



## Support us

Your support is key to the continual advancement of our plugin. We appreciate every user who has contributed to our journey so far.

While our plugin is available for all to use, if you are utilizing it for commercial purposes and believe it adds significant value to your business, we kindly ask you to consider supporting us through GitHub Sponsors. This sponsorship will assist us in continuous development and maintenance to keep our plugin robust and up-to-date. Any amount you contribute will greatly help towards reaching our goals. Join us in making this plugin even better and driving further innovation.

## Installation

You can install the package via composer:

```bash
composer require guava/filament-modal-relation-managers
```

## Assets

Make sure you have a custom filament theme installed (more info in the official documentation [here](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme)) and add the following to your `theme.css` file property, so that our CSS overrides are correctly built:

```css
@source '../../../../vendor/guava/filament-modal-relation-managers/resources/**/*';
```

## Usage

You can use the `RelationManagerAction` anywhere you like to open the relation manager as a modal:

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;

// for example in a filament table
return $table
    ->actions([
        RelationManagerAction::make('lesson-relation-manager')
            ->label('View lessons')
            ->relationManager(LessonRelationManager::make()),
    ])
;
```

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;
// for example in a filament schema (form / infolist)

return $schema
    ->components([
        TextEntry::make('title')
            ->suffixAction(RelationManagerAction::make()
                ->label('View lessons')
                ->relationManager(LessonRelationManager::make()))
    ])
;
```

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;

// for example in filament page

class EditCourse extends EditRecord {

    // ...

    protected function getHeaderActions(): array
    {
        return [
            RelationManagerAction::make()
                ->label('View lessons')
                ->record($this->getRecord())
                ->relationManager(LessonRelationManager::make())
        ];
    }

    // ...
}
```

## Customization

We have a compact style which has no padding around the table, so it touches the edge of the modal.

To enable it:

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;

RelationManagerAction::make()
    ->compact();
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Lukas Frey](https://github.com/GuavaCZ)
- [All Contributors](../../contributors)
- Spatie - Our package skeleton is a modified version of [Spatie's Package Skeleton](https://github.com/spatie/package-skeleton-laravel)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
