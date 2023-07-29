<div class="wi12 ccenter3 sp1">
    <livewire:header />
    <div class="f2 tcenter mt30 mb30">マシーン変更</div>

    {{-- pc用 --}}
    <div class="dis ccenter sp-none">

        {{-- 変更前 --}}
        <table class="wi5">
            <tr>
                <th class="wi1-5"></th>
                <th class="wi1-5"></th>
                <th class="wi2"></th>
            </tr>
            <tr>
                <td colspan="3">
                    <div>ID: {{ $machine->id }}</div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>マシーン名:{{ $machine->machine_name }}</div>
                </td>
                <td>
                    <div><img src="{{ $machine->img }}" alt=""></div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div>タイプ：{{ $machine->type }}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>トレーニングエリア:</div>
                </td>
                <td colspan="2">
                    @foreach ($machine->machineForTrainingAreas as $area)
                        <div class="dis">
                            <div class="wi1-5">{{ $area->trainingArea->training_area }}</div>
                            <div><img class="wi2" src="{{ $area->trainingArea->area_img }}" alt=""></div>
                        </div>
                    @endforeach
                </td>
            </tr>
        </table>


        <div class="ccenter4 tcenter f2 wi1">⇒</div>


        {{-- 変更後 --}}
        <div class="wi5">
            <form wire:submit.prevent="machineUpdate({{ $machine->id }})">
                <div>ID: {{ $machine->id }}</div>
                <div>マシーン名: <input type="text" wire:model="machine_name"></div>
                <div class="he0-5">
                    @error('machine_name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb30"><input type="file" wire:model="machine_img"></div>
                <div class="mb30">タイプ：{{ $machine->type }}</div>
                <div class="mb30">
                    <div>トレーニングエリア</div>
                    <div class="dis4">
                        @foreach ($training_areas as $area)
                            <div>
                                <input type="checkbox" id="{{ $area->training_area }}" wire:model="selectedOptions"
                                    value="{{ $area->id }}">
                                <label for="{{ $area->training_area }}">{{ $area->training_area }}</label>
                                <img class="wi1" src="{{ $area->area_img }}" alt="">
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
    <div class="pc-none">
        <div>ID: {{ $machine->id }}</div>
        <div>マシーン名:{{ $machine->machine_name }}</div>
        <div><img class="wi3" src="{{ $machine->img }}" alt=""></div>
        <div>タイプ：{{ $machine->type }}</div>
        <div>トレーニングエリア:</div>
        @foreach ($machine->machineForTrainingAreas as $area)
                <div>{{ $area->trainingArea->training_area }}</div>
                <div><img class="wi3" src="{{ $area->trainingArea->area_img }}" alt=""></div>
                <div class="mt10 mb10 bbd"></div>
        @endforeach

        <div class="ccenter4 tcenter f2 mt20 mb20">↓↓↓↓↓↓↓↓↓↓</div>

        <form wire:submit.prevent="machineUpdate({{ $machine->id }})">
            <div>ID: {{ $machine->id }}</div>
            <div>マシーン名: <input type="text" wire:model="machine_name"></div>
            <div class="he0-5">
                @error('machine_name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb30"><input type="file" wire:model="machine_img"></div>
            <div class="mb30">タイプ：{{ $machine->type }}</div>
            <div class="mb30">
                <div>トレーニングエリア</div>
                <div class="dis4">
                    @foreach ($training_areas as $area)
                        <div>
                            <input type="checkbox" id="{{ $area->training_area }}" wire:model="selectedOptions"
                                value="{{ $area->id }}">
                            <label for="{{ $area->training_area }}">{{ $area->training_area }}</label>
                            <img class="wi1" src="{{ $area->area_img }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <button type="submit" class="original-button">変更</button>
            </div>
        </form>

       
           
        
    </div>
    <livewire:menu-list />
</div>
