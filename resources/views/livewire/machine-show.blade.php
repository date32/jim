<div class="wi12 ccenter3 sp1">
    <livewire:header />
    <livewire:menu-list />
    <div class="f2 tcenter mt30 mb30">マシーン一覧</div>
    {{-- pc用 --}}
    <div class="wi13 ccenter3 mb20 sp-none">
        @if (!$delete_yes_no)
            <table>
                <tr class="bb">
                    <th class="wi0-5 br2">ID</th>
                    <th class="wi2 br2">マシーン名</th>
                    <th class="wi2 br2">マシーン画像</th>
                    <th class="wi4 br2">トレーニングエリア</th>
                    <th class="wi1 br2">タイプ</th>
                    <th class="wi1-5 br2">変更</th>
                    <th class="wi1-5">削除</th>
                </tr>
                @foreach ($machine_with_area as $machine)
                    <tr class="bb">
                        <!-- 既存のコード -->
                        <td class="p10 br2">{{ $machine->id }}</td>
                        <td class="p10 br2">{{ $machine->machine_name }}</td>
                        <td class="p10 br2"><img src="{{ $machine->img }}" alt="" class="wi2"></td>

                        {{-- マシンに関連するトレーニングエリアを表示 --}}
                        <td class="p10 br2">
                            @foreach ($machine->machineForTrainingAreas as $machineForTrainingArea)
                                <div class="dis">
                                    <div class="wi2 ccenter4">{{ $machineForTrainingArea->trainingArea->training_area }}
                                    </div>
                                    <div>
                                        <img src="{{ $machineForTrainingArea->trainingArea->area_img }}" alt=""
                                            class="wi2">
                                    </div>
                                </div>
                            @endforeach
                        </td>
                        <td class="p10 br2">{{ $machine->type }}</td>
                        <td class="p10 br2"><button class="original-button3"
                                onclick="location.href='/admin/machine/edit/{{ $machine->id }}'">変更</button></td>
                        <td class="p10"><button class="original-button2"
                                wire:click="confirmMachineDelete({{ $machine->id }})">削除</button></td>
                    </tr>
                @endforeach
            </table>
        @endif

        @if ($delete_yes_no)
            <div class="ccenter3 wi5 he1 mb20 sp-none">
                <p>本当に{{ $name }}を削除しますか？</p>
                <div class="dis">
                    <p class="cursor mr50 ml20 dis3 original-button3" wire:click="delete_yes">はい</p>
                    <p class="cursor mr50 ml20 dis3 original-button2" wire:click="delete_no">いいえ</p>
                </div>
            </div>
        @endif
    </div>

    {{-- スマホ用 --}}
    <div class="pc-none">

        @if (!$delete_yes_no)
            @foreach ($machine_with_area as $machine)
                <div>ID:{{ $machine->id }}</div>
                <div>マシーン名:{{ $machine->machine_name }}</div>
                <div><img src="{{ $machine->img }}" alt="" class="wi3"></div>
                @foreach ($machine->machineForTrainingAreas as $machineForTrainingArea)
                    <div>{{ $machineForTrainingArea->trainingArea->training_area }}
                    </div>
                    <div>
                        <img src="{{ $machineForTrainingArea->trainingArea->area_img }}" alt="" class="wi3">
                    </div>
                    {{-- <div class="bbd"></div> --}}
                @endforeach
                <div>タイプ:{{ $machine->type }}</div>
                <div class="mb10"><button class="original-button3"
                        onclick="location.href='/admin/machine/edit/{{ $machine->id }}'">変更</button></div>
                <div><button class="original-button2"
                        wire:click="confirmMachineDelete({{ $machine->id }})">削除</button>
                </div>
                <div class="bb mt20"></div>
            @endforeach
        @endif

        @if ($delete_yes_no)
            <div class="he1-5 mb20">
                <p>本当に{{ $name }}を削除しますか？</p>
                <p class="cursor mr50 ml20 dis3 original-button3 mb10" wire:click="delete_yes">はい</p>
                <p class="cursor mr50 ml20 dis3 original-button2" wire:click="delete_no">いいえ</p>
            </div>
        @endif

    </div>
</div>
