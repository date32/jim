<div class="wi12 ccenter3 sp1">
    <livewire:header />
    <livewire:menu-list />
    <div class="dis mt30">
        {{-- ユーザー登録 --}}
        <div class="br wi4 sp2">
            <div class="tcenter pt10 pb10">
                ユーザー登録
            </div>

            <form wire:submit.prevent="UserStore">
                <div class="he5rem mb10 pl10">
                    <div class="dis">
                        <div class="wi1 ccenter4"><label for="name">ユーザー名</label></div>
                        <div class="wi2"><input type="text" id="name" wire:model="name" required></div>
                    </div>
                    @if ($userError)
                        @error('name')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
                <div class="he5rem mb10 pl10">
                    <div class="dis">
                        <div class="wi1 ccenter4"><label for="pass">パスワード</label></div>
                        <div class="wi2"><input type="text" id="pass" wire:model="pass" required></div>
                    </div>
                    @if ($userError)
                        @error('pass')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
                <div class="p10">
                    <button type="submit" class="original-button ccenter3">登録</button>
                </div>
            </form>
        </div>
        {{-- マシーン登録 --}}
        <div class="br wi4 sp2">
            <div class="tcenter pt10 pb10">
                マシーン登録
            </div>

            <form wire:submit.prevent="MachineStore">
                <div class="he5rem mb10 pl10">
                    <div class="dis">
                        <div class="wi1 ccenter4"><label for="machine_name">マシーン名</label></div>
                        <div class="wi2"><input type="text" id="machine_name" wire:model="machine_name" required>
                        </div>
                    </div>
                    @if ($machineError)
                        @error('machine_name')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
                <div class="ml10 he6rem mb10">
                    <div class="dis">
                        <div class="mr10">タイプ選択</div>
                        @if ($machineError)
                            @error('type')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        @endif
                    </div>
                    <input type="radio" id="option1" wire:model="type" value="筋力" required>
                    <label for="option1">筋力</label><br>

                    <input type="radio" id="option2" wire:model="type" value="持久力" required>
                    <label for="option2">持久力</label><br>
                </div>
                <div class="ml10 mb30">
                    <div class="dis">
                        <div class="mr10">トレーニングエリア</div>
                        @if ($machineError)
                            @error('selectedOptions')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        @endif
                    </div>
                    <div class="dis4">
                        @foreach ($training_areas as $area)
                            <div class="wi1-5 mr20 bb">
                                <div class="">
                                    <input type="checkbox" id="{{ $area->training_area }}" wire:model="selectedOptions"
                                        value="{{ $area->id }}">
                                    <label for="{{ $area->training_area }}">{{ $area->training_area }}</label>
                                </div>
                                <img class="wi1 pb10" src="{{ $area->area_img }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="ml10 mb30">
                    <p>マシーン画像</p>
                    <input type="file" wire:model="machine_img">
                </div>
                <div class="p10">
                    <button type="submit" class="original-button ccenter3">登録</button>
                </div>
            </form>
        </div>
        {{-- トレーニングエリア登録 --}}
        <div class="wi4 sp2">
            <div class="tcenter pt10 pb10">
                トレーニングエリアの登録
            </div>
            <form wire:submit.prevent="TrainingAreaStore">
                <div class="he5rem mb30 pl10">
                    <div class="dis">
                        <div class="wi1-5 ccenter4"><label for="training_area">トレーニングエリア</label></div>
                        <div class="wi2"><input type="text" id="training_area" wire:model="training_area" required></div>
                    </div>
                    @if ($areaError)
                        @error('training_area')
                            <div class="c3">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
                <div class="pl10 mb30">
                    <p>エリアイメージ</p>
                    <input type="file" wire:model="area_img">
                </div>
                <div class="p10">
                    <button type="submit" class="original-button ccenter3">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>

