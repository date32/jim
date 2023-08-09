<div class="wi12 ccenter3 sp1">
    <livewire:header />
    <livewire:menu-list />
    <div class="f2 tcenter mt30">トレーニングエリア一覧</div>
    
    <div class="wi10 ccenter3 mb20 sp-none">
        @if (!$delete_yes_no)
            <table>
                <tr class="bb he0-5">
                    <th class="wi0-5">ID</th>
                    <th class="wi3">トレーニングエリア</th>
                    <th class="wi4"></th>
                    <th class="wi1">変更</th>
                    <th class="wi1">削除</th>
                </tr>
                @foreach ($areas as $area)
                    <tr class="bbd">
                        <td class="tcenter">{{ $area->id }}</td>
                        <td class="tcenter">{{ $area->training_area }}</td>
                        <td><img src="{{ $area->area_img }}" alt="" class="wi3"></td>
                        <td><button class="original-button3"
                                onclick="location.href='/admin/training_area/edit/{{ $area->id }}'">変更</button></td>
                        <td><button class="original-button2"
                                wire:click="confirmTrainigAreaDelete({{ $area->id }})">削除</button></td>
                    </tr>
                @endforeach
            </table>
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
    <div class="sp1 ccenter3 mb30 pc-none">
        @if (!$delete_yes_no)
            <table class="mb30">
                <tr class="bb he0-5">
                    <th>ID</th>
                    <th class="wi2">トレーニングエリア</th>
                    {{-- <th class=""></th> --}}
                    {{-- <th class="">変更</th> --}}
                    <th class="">変更・削除</th>
                </tr>
                @foreach ($areas as $area)
                    <tr class="bbd">
                        <td class="tcenter">{{ $area->id }}</td>
                        <td>
                            <div class="tcenter mb10">{{ $area->training_area }}</div>
                            <div><img class="ccenter3 wi1-5" src="{{ $area->area_img }}" alt="" class="wi1">
                            </div>
                        </td>
                        <td>
                            <div>
                                <button class="original-button3 mb10"
                                    onclick="location.href='/admin/training_area/edit/{{ $area->id }}'">変更</button>
                            </div>
                            <div>
                                <button class="original-button2"
                                    wire:click="confirmTrainigAreaDelete({{ $area->id }})">削除</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif

        @if ($delete_yes_no)
            <div class="mt20 mb20">
                <p class="tcenter">本当に{{ $name }}を削除しますか？</p>
                <div class="flex ccenter">
                    <p class="cursor original-button3" wire:click="delete_yes">はい</p>
                    <p class="cursor original-button2" wire:click="delete_no">いいえ</p>
                </div>
            </div>
        @endif
    </div> 
</div>