<div class="wi12 ccenter3 sp1 jim-img20">
    <livewire:header />
    <div class="sp-he1rem"></div>
    <livewire:menu-list />
    <div class="f2 tcenter mt30">トレーニングエリア一覧</div>

    {{-- pc --}}
    <div class="wi10 ccenter3 sp-none mb20">
        @if (!$delete_yes_no)
            <div class="dis p10 bb">
                <div class="wi-10 sp-none">ID</div>
                <div class="wi-60 sp-none">トレーニングエリア</div>
                <div class="wi-15 tcenter sp-none">変更</div>
                <div class="wi-15 tcenter sp-none">削除</div>
            </div>

            @foreach ($areas as $area)
                <div class="dis p10 bbd">
                    <div class="wi-10 ccenter4">{{ $area->id }}</div>
                    <div class="dis wi-60">
                        <div class="wi-30 ccenter4">{{ $area->training_area }}
                        </div>
                        <div class="wi-30"><img src="{{ $area->area_img }}" alt=""></div>
                    </div>
                    <div class="dis wi-30">
                        <div class="wi-50 ccenter4">
                            <button class="original-button3 ccenter3"
                                onclick="location.href='/admin/training_area/edit/{{ $area->id }}'">変更</button>
                        </div>
                        <div class="wi-50 ccenter4">
                            <button class="original-button2 ccenter3"
                                wire:click="confirmTrainigAreaDelete({{ $area->id }})">削除</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        @if ($delete_yes_no)
            <div class="wi5 ccenter3 mt20">
                <p class="tcenter">本当に{{ $name }}を削除しますか？</p>
                <div class="dis ccenter">
                    <p class="cursor original-button3" wire:click="delete_yes">はい</p>
                    <p class="cursor original-button2" wire:click="delete_no">いいえ</p>
                </div>
            </div>
        @endif
    </div>

    {{-- スマホ用 --}}
    <div class="sp1 ccenter3 pc-none mb20">
        @if (!$delete_yes_no)
            @foreach ($areas as $area)
                <div class="dis p10 bbd">
                    <div><span>ID:</span>{{ $area->id }}</div>
                    <div><span>トレーニングエリア:</span>{{ $area->training_area }}</div>
                    <div class="flex wimax">
                        <div class="wi-50 mr20"><img src="{{ $area->area_img }}" alt=""></div>
                        <div>
                            <div class="mb10">
                                <button class="original-button3 ccenter3"
                                    onclick="location.href='/admin/training_area/edit/{{ $area->id }}'">変更</button>
                            </div>
                            <div>
                                <button class="original-button2 ccenter3"
                                    wire:click="confirmTrainigAreaDelete({{ $area->id }})">削除</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        @if ($delete_yes_no)
            <div class="wimax ccenter3 mt20">
                <p class="tcenter mb10">本当に{{ $name }}を削除しますか？</p>
                <div class="flex ccenter">
                    <p class="cursor original-button3" wire:click="delete_yes">はい</p>
                    <p class="cursor original-button2" wire:click="delete_no">いいえ</p>
                </div>
            </div>
        @endif
    </div>
</div>
