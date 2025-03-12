@php
    $url = $item['url'] ?? null;

    if(! $url){
        $url = route($item['route']);
    }
@endphp

<flux:navlist.item
    icon="{{ $item['icon'] }}"
    :href="$url"
    :badge="$item['badge']"
    :badgeColor="$item['badgeColor']"
    :current="request()->routeIs($url)"
    wire:navigate
    >
        {{ $item['label'] }}
</flux:navlist.item>
