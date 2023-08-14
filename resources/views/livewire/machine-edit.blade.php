<div class="wi12 ccenter3 sp1 jim-img23">
    <livewire:header />
    <div class="sp-he1rem"></div>
    <livewire:menu-list />

    <div class="f2 tcenter mt30 mb30">マシーン変更</div>

    {{-- pc用 --}}
    <div class="dis mb20 sp-none">
        <div class="wi-40">
            <div>ID: {{ $machine->id }}</div>
            <div>マシーン名:{{ $machine->machine_name }}</div>
            <div>タイプ：{{ $machine->type }}</div>
            <div class="dis">
                <div class="wi-50 mr20"><img src="{{ $machine->img }}" alt=""></div>
                <div class="wi-50">
                    <div class="mb10">トレーニングエリア:</div>
                    @foreach ($machine->machineForTrainingAreas as $area)
                        <div class="original-box-shadow2 p10 mb10">
                            <div>{{ $area->trainingArea->training_area }}</div>
                            <div><img src="{{ $area->trainingArea->area_img }}" alt=""></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="wi-20 ccenter4 tcenter f2">⇒<br>⇒<br>⇒</div>

        <div class="wi-40">
            <form wire:submit.prevent="machineUpdate({{ $machine->id }})">
                <div>ID: {{ $machine->id }}</div>
                <div>マシーン名: <input type="text" wire:model="machine_name"></div>
                <div class="he2rem">
                    @error('machine_name')
                        <div class="c3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb30">タイプ：{{ $machine->type }}</div>
                <div class="mb30"><input type="file" wire:model="machine_img"></div>
                <div class="mb30">
                    <div>トレーニングエリア:</div>
                    <div class="grid4">
                        @foreach ($training_areas as $area)
                            <div class="original-box-shadow2 p10">
                                <div class="mb10">
                                    <input type="checkbox" id="{{ $area->training_area }}" wire:model="selectedOptions"
                                        value="{{ $area->id }}">
                                    <label for="{{ $area->training_area }}">{{ $area->training_area }}</label>
                                </div>
                                <label for="{{ $area->training_area }}"><img class="wi1"
                                        src="{{ $area->area_img }}" alt=""></label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <button type="submit" class="original-button">変更</button>
                </div>
            </form>
        </div>
    </div>

    {{-- スマホ用 --}}
    <div class="pc-none sp1">
        <div>ID: {{ $machine->id }}</div>
        <div class="flex mb10">
            <div class="sp-70">マシーン名:{{ $machine->machine_name }}</div>
            <div class="sp-30">タイプ：{{ $machine->type }}</div>
        </div>

        <div class="flex mb20">
            <div class="wi-50 mr20"><img src="{{ $machine->img }}" alt=""></div>

            <div class="wi-50">
                <div>トレーニングエリア:</div>
                @foreach ($machine->machineForTrainingAreas as $area)
                <div class="mb10">
                    <div>{{ $area->trainingArea->training_area }}</div>
                    <div><img src="{{ $area->trainingArea->area_img }}" alt=""></div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="ccenter4 tcenter f2 mb20">↓↓↓</div>

        <form wire:submit.prevent="machineUpdate({{ $machine->id }})">
            <div>ID: {{ $machine->id }}</div>
            <div>マシーン名: <input type="text" wire:model="machine_name"></div>
            <div class="he2rem">
                @error('machine_name')
                    <div class="c3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb10"><input type="file" wire:model="machine_img"></div>
            <div class="mb10">タイプ：{{ $machine->type }}</div>
            <div class="mb30">
                <div>トレーニングエリア</div>
                <div class="grid3">
                    @foreach ($training_areas as $area)
                    <div class="original-box-shadow2 p10">
                        <div class="mb10">
                            <input type="checkbox" id="{{ $area->training_area }}" wire:model="selectedOptions"
                                value="{{ $area->id }}">
                                <label for="{{ $area->training_area }}">{{ $area->training_area }}</label>
                        </div>
                        <label for="{{ $area->training_area }}"><img class="wi1" src="{{ $area->area_img }}" alt=""></label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div><button type="submit" class="original-button ccenter3 mb20">変更</button></div>
        </form>
    </div>
</div>
