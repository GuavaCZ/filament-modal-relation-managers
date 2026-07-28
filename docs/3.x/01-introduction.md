---
title: Introduction
---

# Introduction

Modal Relation Managers lets you embed any of your relation managers inside a filament modal, using a provided action. Instead of opening a record's edit page to work with its relations, you open them right where you are: from a table row, a schema entry or a page header action.

```php
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;

RelationManagerAction::make()
    ->label('View lessons')
    ->relationManager(LessonRelationManager::class);
```

The relation manager keeps its full functionality inside the modal, including create, edit and delete actions.
