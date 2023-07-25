<div>
    <livewire:header />
    {{-- ユーザー登録 --}}
    <div>
        <div>
            ユーザー登録
        </div>

        <form wire:submit.prevent="UserStore">
            <div>
                <label for="name">ユーザー名</label>
                <input type="text" id="name" wire:model="name" required>
                @if ($userError)
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                @endif
            </div>
            <div>
                <label for="pass">パスワード</label>
                <input type="text" id="pass" wire:model="pass" required>
                @if ($userError)
                    @error('pass')
                        <div>{{ $message }}</div>
                    @enderror
                @endif
            </div>
            <div>
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
    {{-- マシーン登録 --}}
    <div>
        <div>
            マシーン登録
        </div>

        <form wire:submit.prevent="MachineStore">
            <div>
                <label for="machine_name">マシーン名</label>
                <input type="text" id="machine_name" wire:model="machine_name" required>
                @if ($machineError)
                    @error('machine_name')
                        <div>{{ $message }}</div>
                    @enderror
                @endif
            </div>
            <div>
                <div>トレーニングエリア</div>
                @foreach ($training_areas as $area)
                    <input type="checkbox" id="{{ $area->training_area }}" wire:model="selectedOptions"
                        value="{{ $area->id }}">
                    <label for="{{ $area->training_area }}">{{ $area->training_area }}</label>
                @endforeach
            </div>
            <div>
                <p>マシーン画像</p>
                <input type="file" wire:model="machine_img">
            </div>
            <div>
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
    {{-- トレーニングエリア登録 --}}
    <div>
        <div>
            トレーニングエリアの登録
        </div>
        <form wire:submit.prevent="TrainingAreaStore">
            <div>
                <label for="training_area">トレーニングエリア</label>
                <input type="text" id="training_area" wire:model="training_area" required>
                @if ($areaError)
                    @error('training_area')
                        <div>{{ $message }}</div>
                    @enderror
                @endif
            </div>
            <div>
                <p>エリアイメージ</p>
                <input type="file" wire:model="area_img">
            </div>
            <div>
                <button type="submit">登録</button>
            </div>
        </form>
    </div>


    <div><a href="/admin/user">ユーザー一覧</a></div>
    <div><a href="admin/machine">マシーン一覧</a></div>
    <div><a href="admin/training_area">トレーニングエリア一覧</a></div>


</div>
