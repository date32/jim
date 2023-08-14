<div class="wi12 ccenter3 sp1 jim-img22">
    <livewire:header />
    <div class="sp-he1rem"></div>
    <livewire:menu-list />
    <div class="f2 tcenter mt30 mb30">マシーン一覧</div>

    {{-- pc用 --}}
    <div class="wi12 ccenter3 mb20 sp-none">
        @if (!$delete_yes_no)
            <div class="dis p10 bb">
                <div class="wi-10">ID</div>
                <div class="wi-30">マシーン</div>
                <div class="wi-30">トレーニングエリア</div>
                <div class="wi-10">タイプ</div>
                <div class="wi-10 tcenter">変更</div>
                <div class="wi-10 tcenter">削除</div>
            </div>

            @foreach ($machine_with_area as $machine)
                <div class="dis bbd">
                    <div class="wi-10 ccenter4">{{ $machine->id }}</div>

                    <div class="dis wi-30">
                        <div class="wi-50 ccenter4">{{ $machine->machine_name }}</div>
                        <div class="wi-50 p10"><img src="{{ $machine->img }}" alt=""></div>
                    </div>

                    <div class="grid2 wi-30 p10">
                        @foreach ($machine->machineForTrainingAreas as $machineForTrainingArea)
                            <div class="p10 original-box-shadow2">
                                <div>{{ $machineForTrainingArea->trainingArea->training_area }}
                                </div>
                                <div>
                                    <img src="{{ $machineForTrainingArea->trainingArea->area_img }}" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="ccenter4 wi-10">{{ $machine->type }}</div>

                    <div class="wi-10 ccenter4">
                        <button class="original-button3 ccenter3"
                            onclick="location.href='/admin/machine/edit/{{ $machine->id }}'">変更</button>
                    </div>

                    <div class="wi-10 ccenter4">
                        <button class="original-button2 ccenter3"
                            wire:click="confirmMachineDelete({{ $machine->id }})">削除</button>
                    </div>

                </div>
            @endforeach
        @endif

        @if ($delete_yes_no)
            <div class="ccenter3 wi4">
                <p class="mb20 tcenter">本当に{{ $name }}を削除しますか？</p>
                <div class="dis5">
                    <p class="cursor original-button3" wire:click="delete_yes">はい</p>
                    <p class="cursor original-button2" wire:click="delete_no">いいえ</p>
                </div>
            </div>
        @endif
    </div>

    {{-- スマホ用 --}}
    <div class="pc-none sp1">
        @if (!$delete_yes_no)
            @foreach ($machine_with_area as $machine)
                <div>ID:{{ $machine->id }}</div>
                <div class="flex mb10">
                    <div class="wi-70">マシーン名:{{ $machine->machine_name }}</div>
                    <div class="wi-30">タイプ:{{ $machine->type }}</div>
                </div>

                <div class="flex mb10">
                    <div class="wi-50 mr20">
                        <div><img src="{{ $machine->img }}" alt="" class="wi3"></div>
                    </div>
                    <div class="wi-50">
                        <div>トレーニングエリア</div>
                        @foreach ($machine->machineForTrainingAreas as $machineForTrainingArea)
                            <div class="mb10">
                                <div>{{ $machineForTrainingArea->trainingArea->training_area }}
                                </div>
                                <div>
                                    <img src="{{ $machineForTrainingArea->trainingArea->area_img }}" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex5 mb10">
                    <div><button class="original-button3"
                            onclick="location.href='/admin/machine/edit/{{ $machine->id }}'">変更</button></div>
                    <div><button class="original-button2"
                            wire:click="confirmMachineDelete({{ $machine->id }})">削除</button>
                    </div>
                </div>

                <div class="bbd mb20"></div>
            @endforeach
        @endif

        @if ($delete_yes_no)
            <div class="sp1">
                <p class="tcenter mb20">本当に{{ $name }}を削除しますか？</p>
                <div class="flex5">
                    <p class="cursor original-button3" wire:click="delete_yes">はい</p>
                    <p class="cursor original-button2" wire:click="delete_no">いいえ</p>
                </div>
            </div>
        @endif

    </div>
</div>
