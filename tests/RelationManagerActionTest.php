<?php

use Guava\FilamentModalRelationManagers\Actions\RelationManagerAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\View\View;
use Workbench\App\Filament\Pages\Courses;
use Workbench\App\Filament\RelationManagers\LessonsRelationManager;
use Workbench\App\Models\Course;
use Workbench\App\Models\Lesson;
use Workbench\App\Models\User;

uses(RefreshDatabase::class);

it('has sensible defaults', function () {
    $action = RelationManagerAction::make()
        ->relationManager(LessonsRelationManager::class)
    ;

    expect(RelationManagerAction::getDefaultName())->toBe('modal-relation-manager')
        ->and($action->getRelationManager())->toBe(LessonsRelationManager::class)
        ->and($action->shouldHideRelationManagerHeading())->toBeTrue()
        ->and($action->isCompact())->toBeFalse()
    ;
});

it('can be configured', function () {
    $action = RelationManagerAction::make()
        ->relationManager(LessonsRelationManager::class)
        ->hideRelationManagerHeading(false)
        ->compact()
    ;

    expect($action->shouldHideRelationManagerHeading())->toBeFalse()
        ->and($action->isCompact())->toBeTrue()
    ;
});

it('builds the modal content from the relation manager', function () {
    $this->actingAs(User::factory()->create());

    $course = Course::factory()
        ->has(Lesson::factory()->count(2))
        ->create()
    ;

    $action = RelationManagerAction::make()
        ->relationManager(LessonsRelationManager::class)
        ->livewire(new Courses)
        ->record($course)
    ;

    $content = $action->getModalContent();

    expect($content)->toBeInstanceOf(View::class)
        ->and($content->name())->toBe('guava-modal-relation-managers::components.modal-relation-manager')
        ->and($content->getData()['relationManager'])->toBe(LessonsRelationManager::class)
        ->and($content->getData()['ownerRecord']->is($course))->toBeTrue()
        ->and($content->getData()['isCompact'])->toBeFalse()
        ->and($content->getData()['shouldHideRelationManagerHeading'])->toBeTrue()
        ->and($content->getData()['pageClass'])->toBe(Courses::class)
    ;
});
