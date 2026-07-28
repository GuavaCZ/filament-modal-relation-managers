---
title: Usage
---

# Usage

In filament 3, the package ships one action class per context. Import the one matching the place you use it in.

## In a table

```php
use Guava\FilamentModalRelationManagers\Actions\Table\RelationManagerAction;

public static function table(Table $table): Table
{
    return $table
        ->actions([
            RelationManagerAction::make('lesson-relation-manager')
                ->label('View lessons')
                ->relationManager(LessonRelationManager::make()),
        ]);
}
```

## In an infolist

```php
use Guava\FilamentModalRelationManagers\Actions\Infolist\RelationManagerAction;

TextEntry::make('title')
    ->suffixAction(
        RelationManagerAction::make()
            ->label('View lessons')
            ->relationManager(LessonRelationManager::make()),
    );
```

## As a page action

```php
use Guava\FilamentModalRelationManagers\Actions\Action\RelationManagerAction;

protected function getHeaderActions(): array
{
    return [
        RelationManagerAction::make()
            ->label('View lessons')
            ->record($this->getRecord())
            ->relationManager(LessonRelationManager::make()),
    ];
}
```

## Customization

Hide the relation manager's heading inside the modal (it is hidden by default):

```php
RelationManagerAction::make()
    ->hideRelationManagerHeading();
```

Use the compact style, which removes the padding around the table so it touches the modal's edge:

```php
RelationManagerAction::make()
    ->compact();
```
