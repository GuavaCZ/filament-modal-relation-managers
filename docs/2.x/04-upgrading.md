---
title: Upgrading
---

# Upgrading

This guide covers the upgrade from 1.x to 2.x. Version 2.x exists for filament 4.

## Upgrade filament

Please follow the [filament upgrade guide](https://filamentphp.com/docs/4.x/upgrade-guide) first.

## Bump the constraint

```bash
composer require guava/filament-modal-relation-managers:"^2.0"
```

## Change your imports

Filament 4 unified its actions, so the three context-specific action classes collapsed into one:

```php
// Before
use Guava\FilamentModalRelationManagers\Actions\Table\RelationManagerAction;
use Guava\FilamentModalRelationManagers\Actions\Infolist\RelationManagerAction;
use Guava\FilamentModalRelationManagers\Actions\Action\RelationManagerAction;

// After
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;
```
