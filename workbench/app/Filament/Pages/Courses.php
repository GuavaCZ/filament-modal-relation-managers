<?php

namespace Workbench\App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;
use Workbench\App\Filament\RelationManagers\LessonsRelationManager;
use Workbench\App\Models\Course;

/**
 * Exercises the action in both flavours: the default modal and the compact style.
 */
class Courses extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string | \BackedEnum | null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $navigationLabel = 'Courses';

    protected static ?string $title = 'Courses';

    protected static ?string $slug = 'courses';

    protected static ?int $navigationSort = 2;

    protected string $view = 'workbench::filament.pages.courses';

    public function table(Table $table): Table
    {
        return $table
            ->query(Course::query())
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('lessons_count')
                    ->counts('lessons')
                    ->label('Lessons'),
            ])
            ->recordActions([
                RelationManagerAction::make('lessons')
                    ->label('View lessons')
                    ->relationManager(LessonsRelationManager::class),
                RelationManagerAction::make('lessons-compact')
                    ->label('Compact')
                    ->relationManager(LessonsRelationManager::class)
                    ->compact(),
            ])
        ;
    }
}
