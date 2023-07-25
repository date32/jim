<div>
    <livewire:header />
    <div>今日のトレーニング</div>

    <form wire:submit.prevent="trainingStore">
        <table>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr class="he1">
                <td>使用マシーン</td>
                <td>
                    <div>
                        <select wire:model="machineId" required>
                            <option value="">選択してください</option>
                            @foreach ($machines as $machine)
                                <option value="{{ $machine->id }}">{{ $machine->machine_name }}</option>
                            @endforeach
                        </select>
                        @error('machineId')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                </td>
                <td><img src="{{ $machineImg }}" alt="" class="wi1"></td>
            </tr>
            <tr>
                <td>トレーニング時間</td>
                <td>
                    <div class="dis">
                        <div><input type="text" wire:model="minutes"></div>
                        <div>分</div>
                    </div>  
                    @error('minutes')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
                <td>
                    <div class="dis">
                        <div><input type="text" wire:model="seconds"></div>
                        <div>秒</div>
                    </div>            
                    @error('seconds')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>スピード</td>
                <td>
                    <input type="text" wire:model="speed">
                    @error('speed')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
                <td>km/h</td>
            </tr>
            <tr>
                <td>距離</td>
                <td>
                    <input type="text" wire:model="distance">
                    @error('distance')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
                <td>km</td>
            </tr>
            <tr>
                <td>重さ</td>
                <td>
                    <input type="text" wire:model="weight">
                    @error('weight')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
                <td>kg</td>
            </tr>
            <tr>
                <td>カウント</td>
                <td>
                    <input type="text" wire:model="count">
                    @error('count')
                        <div>{{ $message }}</div>
                    @enderror
                </td>
                <td>回</td>
            </tr>
        </table>
        <button type="submit">送信</button>
    </form>

</div>
<style>

</style>
