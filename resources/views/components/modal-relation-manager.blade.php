@props([
    'ownerRecord',
    'relationManager',
    'shouldHideRelationManagerHeading' => true,
    'isCompact' => false,
    'pageClass'
])

<div @class([
    "[&_.fi-ta-ctn]:![box-shadow:none]",
    "[&_.fi-ta-header-heading]:hidden" => $shouldHideRelationManagerHeading,
    '-mx-6 gu-compact' => $isCompact,
])>
    @livewire($relationManager, ['ownerRecord' => $ownerRecord, 'pageClass' => $pageClass])
</div>
