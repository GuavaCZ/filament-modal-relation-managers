<?php

namespace Guava\FilamentModalRelationManagers\Actions;

use Closure;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\RelationManagers\RelationManagerConfiguration;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class RelationManagerAction extends Action
{
    protected string | RelationManagerConfiguration $relationManager;

    protected Closure | bool $hideRelationManagerHeading = true;

    protected Closure | bool $compact = false;

    public static function getDefaultName(): ?string
    {
        return 'modal-relation-manager';
    }

    public function relationManager(RelationManagerConfiguration | string $relationManager): static
    {
        $this->relationManager = $relationManager;

        return $this;
    }

    public function getRelationManager(): RelationManagerConfiguration | string
    {
        return $this->relationManager;
    }

    public function hideRelationManagerHeading(Closure | bool $hideRelationManagerHeading = true): static
    {
        $this->hideRelationManagerHeading = $hideRelationManagerHeading;

        return $this;
    }

    public function shouldHideRelationManagerHeading(): bool
    {
        return $this->evaluate($this->hideRelationManagerHeading);
    }

    public function compact(Closure | bool $compact = true): static
    {
        $this->compact = $compact;

        return $this;
    }

    public function isCompact(): bool
    {
        return $this->evaluate($this->compact);
    }

    public function configure(): static
    {
        parent::setUp();

        return $this
            ->modalContent(function (Model $record, Component $livewire) {
                return view('guava-modal-relation-managers::components.modal-relation-manager', [
                    'relationManager' => $this->normalizeRelationManagerClass($this->getRelationManager()),
                    'ownerRecord' => $record,
                    'isCompact' => $this->isCompact(),
                    'shouldHideRelationManagerHeading' => $this->shouldHideRelationManagerHeading(),
                    'pageClass' => match (true) {
                        $livewire instanceof Page => get_class($livewire),
                        $livewire instanceof RelationManager => $livewire->getPageClass(),
                        default => '',
                    },
                ]);
            })
            ->modalSubmitAction(false)
        ;
    }

    /**
     * @param  class-string<RelationManager> | RelationManagerConfiguration  $manager
     * @return class-string<RelationManager>
     */
    protected function normalizeRelationManagerClass(string | RelationManagerConfiguration $manager): string
    {
        if ($manager instanceof RelationManagerConfiguration) {
            return $manager->relationManager;
        }

        return $manager;
    }
}
