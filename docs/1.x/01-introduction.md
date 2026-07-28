---
title: Introduction
---

# Introduction

Modal Relation Managers lets you embed any of your relation managers inside a filament modal, using a provided action. Instead of opening a record's edit page to work with its relations, you open them right where you are: from a table row, an infolist entry or a page header action.

```php
use Guava\FilamentModalRelationManagers\Actions\Table\RelationManagerAction;

RelationManagerAction::make()
    ->label('View lessons')
    ->relationManager(LessonRelationManager::make());
```

The relation manager keeps its full functionality inside the modal, including create, edit and delete actions.
