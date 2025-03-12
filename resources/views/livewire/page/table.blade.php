<div class="p-4 bg-neutral-200 dark:bg-neutral-700 rounded-lg">

    <div class="w-64 mb-4">
        <flux:input wire:model.live="search" type="search" placeholder="search..." iconLeading="magnifying-glass"/>
    </div>

    <div class="w-full my-4">
        <div class="w-full border-b-1">
            <div class="border-b-1 h-10 grid grid-cols-3 gap-4 mb-4">
                @foreach ($this->getColumns() as $column)
                    <div class="text-left font-bold">{{ $column->label }}</div>
                @endforeach
            </div>

            @foreach ($items as $row)
            <a href="{{ $this->getRecordUrl($row->id) }}">
                <div class="h-8 w-full grid grid-cols-3 gap-4 mb-2">
                    @foreach ($this->getColumnKeys() as $key)
                        <div class="{{ $this->getAlign($key) }}">{{ $row->{$key} }}</div>
                    @endforeach
                </div>
            </a>
            @endforeach
        </div>
        <div class="flex justify-between mt-4 w-full">
            {{ $items->links() }}
        </div>
    </div>
</div>
