@php
    $hasBadge = filled($headerBadge);
@endphp
<div class="relative mb-6 w-full">
    <div class="flex gap-4 mb-2">
        <flux:heading
            size="xl"
            level="1"
            >
                {{ $this->getHeading() }}
        </flux:heading>
        @if($hasBadge)
            <flux:badge class="h-6 my-auto" color="lime">{{ $headerBadge }}</flux:badge>
        @endif
    </div>


    <flux:subheading size="lg" class="mb-6">{{ $this->getSubHeading() }}</flux:subheading>

    <flux:separator variant="subtle" />
</div>
