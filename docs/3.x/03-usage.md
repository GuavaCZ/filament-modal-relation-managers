---
title: Usage
---

# Usage

There is a single `RelationManagerAction` class that works everywhere: tables, schemas (forms and infolists) and page actions.

## In a table

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;

return $table
    ->recordActions([
        RelationManagerAction::make('lesson-relation-manager')
            ->label('View lessons')
            ->relationManager(LessonRelationManager::class),
    ]);
```

## In a schema

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;

TextEntry::make('title')
    ->suffixAction(
        RelationManagerAction::make()
            ->label('View lessons')
            ->relationManager(LessonRelationManager::class),
    );
```

## As a page action

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;

protected function getHeaderActions(): array
{
    return [
        RelationManagerAction::make()
            ->label('View lessons')
            ->record($this->getRecord())
            ->relationManager(LessonRelationManager::class),
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
