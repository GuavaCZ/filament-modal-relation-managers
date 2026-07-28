---
title: Installation
---

# Installation

## Requirements

- PHP 8.1 or higher
- Filament 4.x

## Installing the package

You can install the package via composer:

```bash
composer require guava/filament-modal-relation-managers:"^2.0"
```

## Custom theme

A custom filament theme is **required**, otherwise the package's CSS overrides are not built and the modal will look broken.

If you don't have one yet, please read the [filament documentation](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) on how to create a custom theme.

Once you have a theme, add the following to your **theme.css** file:

```css
@source '../../../../vendor/guava/filament-modal-relation-managers/resources/**/*';
```
