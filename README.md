![filament-modal-relation-managers Banner](https://github.com/GuavaCZ/filament-modal-relation-managers/raw/main/.github/banner.png)

# Relation managers in modals for your filament panels

[![Latest Version on Packagist](https://img.shields.io/packagist/v/guava/filament-modal-relation-managers.svg?style=flat-square)](https://packagist.org/packages/guava/filament-modal-relation-managers)
[![Total Downloads](https://img.shields.io/packagist/dt/guava/filament-modal-relation-managers.svg?style=flat-square)](https://packagist.org/packages/guava/filament-modal-relation-managers)

This plugin allows you to embed any of your relation managers inside modals using a provided filament action. Instead of opening a record's edit page to work with its relations, you open them right where you are: from a table row, a schema entry or a page header action.

## Documentation

The full documentation is available at [guava.cz](https://guava.cz/developers/packages/filament-modal-relation-managers).

## Version compatibility

| Filament version | Plugin version |
|------------------|:--------------:|
| 3.x              |      1.x       |
| 4.x              |      2.x       |
| 5.x              |      3.x       |

For older filament versions, please check the branch of the respective version.

## Showcase

![Screenshot 1](https://github.com/GuavaCZ/filament-modal-relation-managers/raw/main/docs/images/screenshot_01.png)

## Installation

You can install the package via composer:

```bash
composer require guava/filament-modal-relation-managers
```

Finally, make sure you have a **custom filament theme** (read [here](https://filamentphp.com/docs/5.x/styling/overview#creating-a-custom-theme) how to create one) and add the following to your **theme.css** file so the CSS is properly built:

```css
@source '../../../../vendor/guava/filament-modal-relation-managers/resources/**/*';
```

## Usage

Use the `RelationManagerAction` anywhere you like to open a relation manager in a modal:

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;

return $table
    ->recordActions([
        RelationManagerAction::make('lesson-relation-manager')
            ->label('View lessons')
            ->relationManager(LessonRelationManager::class),
    ]);
```

Everything else, including schema and page actions and the compact style, is covered in the [documentation]([docs/3.x/01-introduction.md](https://guava.cz/developers/packages/filament-modal-relation-managers).

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Lukas Frey](https://github.com/lukas-frey)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
