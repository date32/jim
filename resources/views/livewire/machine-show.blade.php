<div>
    <livewire:header />
    マシーン一覧
    <table>
        <tr>
            <th>ID</th>
            <th>マシーン名</th>
            <th>マシーン画像</th>
            <th>トレーニングエリア</th>
            <th>タイプ</th>
            <th>変更</th>
            <th>削除</th>
        </tr>
        @foreach ($machine_with_area as $machine)
            <tr>
                <!-- 既存のコード -->
                <td>{{ $machine->id }}</td>
                <td>{{ $machine->machine_name }}</td>
                <td><img src="{{ $machine->img }}" alt="" class="wi1"></td>

                {{-- マシンに関連するトレーニングエリアを表示 --}}
                <td>
                    @foreach ($machine->machineForTrainingAreas as $machineForTrainingArea)
                        <div class="dis">
                            <div>{{ $machineForTrainingArea->trainingArea->training_area }}</div>
                            <div>
                                <img src="{{ $machineForTrainingArea->trainingArea->area_img }}" alt=""
                                    class="wi1">
                            </div>
                        </div>
                    @endforeach
                </td>
                <td>{{$machine->type}}</td>
                <td><button onclick="location.href='/admin/machine/edit/{{ $machine->id }}'">変更</button></td>
                <td><button wire:click="confirmMachineDelete({{ $machine->id }})">削除</button></td>
                <!-- 既存のコード -->
            </tr>
        @endforeach
    </table>
    @if ($delete_yes_no)
        <div>
            <p>本当に{{ $name }}を削除しますか？</p>
            <p class="cursor mr50 ml20 dis3" wire:click="delete_yes">はい</p>
            <p class="cursor mr50 ml20 dis3" wire:click="delete_no">いいえ</p>
        </div>
    @endif
</div>
