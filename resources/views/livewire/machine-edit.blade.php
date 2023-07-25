<div>
    <livewire:header />
    <div>マシーン変更</div>
    <div class="dis">
        <div>
            <div>ID: {{ $machine->id }}</div>
            <div class="dis">
                <div>マシーン名: {{ $machine->machine_name }}</div>
                <div><img src="{{ $machine->img }}" alt="" class="wi1"></div>
            </div>
            <div class="dis">
                <div>トレーニングエリア:</div>
                <div>
                    @foreach ($machine->machineForTrainingAreas as $area)
                        <div class="dis">
                            <div>{{ $area->trainingArea->training_area }}</div>
                            <div><img src="{{ $area->trainingArea->area_img }}" alt="" class="wi1"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div>→</div>
        <div>
            <form wire:submit.prevent="machineUpdate({{ $machine->id }})">
                <div>ID: {{ $machine->id }}</div>
                <div>マシーン名:<input type="text" wire:model="machine_name"></div>
                @error('machine_name')
                    <div>{{ $message }}</div>
                @enderror
                <div><input type="file" wire:model="machine_img"></div>
                <div>
                    <div>トレーニングエリア</div>
                    @foreach ($training_areas as $area)
                        <input type="checkbox" id="{{ $area->training_area }}" wire:model="selectedOptions"
                            value="{{ $area->id }}">
                        <label for="{{ $area->training_area }}">{{ $area->training_area }}</label>
                    @endforeach
                </div>
                <div>
                    <button type="submit">変更</button>
                </div>
            </form>
        </div>
    </div>

    <div><a href="/admin/machine">戻る</a></div>
</div>
