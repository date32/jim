<div class="wi12 ccenter3 sp1 jim-img17">
    <livewire:header />
    <div class="sp-he1rem"></div>
    <livewire:menu-list />

    <div class="dis mt30 mb30">

        <div class="wi-40 mr20">
            {{-- ユーザー登録 --}}
            <div class="original-box-shadow2 mb30 sp1">
                <div class="p10 tcenter f1-5">ユーザー登録</div>
                <form wire:submit.prevent="UserStore">
                    <div class="he6rem p10">
                        <div class="dis">
                            <div class="wi-30 ccenter4"><label for="name"><i
                                        class="fa-solid fa-user mr10"></i>ユーザー名</label></div>
                            <div><input type="text" id="name" wire:model="name" required></div>
                        </div>
                        @if ($userError)
                            @error('name')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        @endif
                    </div>
                    <div class="he8rem p10">
                        <div class="dis">
                            <div class="wi-30 ccenter4"><label for="pass"><i
                                        class="fa-solid fa-key mr10"></i>パスワード</label></div>
                            <div><input type="text" id="pass" wire:model="pass" required></div>
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

            {{-- トレーニングエリア登録 --}}
            <div class="original-box-shadow2 sp1 mb30">
                <div class="p10 tcenter f1-5">トレーニングエリアの登録</div>
                <form wire:submit.prevent="TrainingAreaStore">
                    <div class="he6rem p10">
                        <div class="dis">
                            <div class="wi-40 ccenter4 dis flex sp1">
                                <img class="wi-2rem mr10" src="/img/jim18.png" alt="">
                                <label class="ccenter4" for="training_area">トレーニングエリア</label>
                            </div>
                            <div><input type="text" id="training_area" wire:model="training_area" required></div>
                        </div>
                        @if ($areaError)
                            @error('training_area')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        @endif
                    </div>
                    <div class="p10">
                        <div class="wi-40 ccenter4 dis flex sp1">
                            <img class="wi-2rem mr10" src="/img/jim19.png" alt="">
                            <p class="ccenter4">エリアイメージ</p>
                        </div>
                        <input type="file" wire:model="area_img">
                    </div>
                    <div class="p10">
                        <button type="submit" class="original-button ccenter3">登録</button>
                    </div>
                </form>
            </div>
        </div>



        {{-- マシーン登録 --}}
        <div class="wi-60">
            <div class="original-box-shadow2 sp1">
                <div class="tcenter p10 f1-5">マシーン登録</div>

                <form wire:submit.prevent="MachineStore">
                    <div class="he4rem mb10 p10">
                        <div class="dis">
                            <div class="ccenter4 dis flex sp1">
                                <img class="wi-2rem mr10" src="/img/jim6.png" alt="">
                                <label class="ccenter4 mr20" for="machine_name">マシーン名</label>
                                <input type="text" id="machine_name" wire:model="machine_name" required>
                            </div> 
                        </div>
                        @if ($machineError)
                            @error('machine_name')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        @endif
                    </div>
                    <div class="mb10 p10">
                        <div class="he4rem">
                            <div class="ccenter4 dis flex sp1">
                                <img class="wi-2rem mr10" src="/img/jim7.png" alt="">
                                <div class="mr10 ccenter4">タイプ選択</div>
                            </div>
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
                    <div class="mb30 p10">
                        <div class="he4rem">
                            <div class="ccenter4 dis flex sp1">
                                <img class="wi-2rem mr10" src="/img/jim18.png" alt="">
                                <div class="mr10 ccenter4">トレーニングエリア</div>
                            </div> 
                            @if ($machineError)
                                @error('selectedOptions')
                                    <div class="c3">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                        <div class="grid4 sp-grid2">
                            @foreach ($training_areas as $area)
                                <div class="p10 d">
                                    <div class="mb10">
                                        <input type="checkbox" id="{{ $area->training_area }}"
                                        wire:model="selectedOptions" value="{{ $area->id }}">
                                    <label for="{{ $area->training_area }}">{{ $area->training_area }}</label>
                                    </div>
                                    <label for="{{ $area->training_area }}"><img class="wi1 pb10" src="{{ $area->area_img }}" alt=""></label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ml10 mb30">
                        <div class="ccenter4 dis flex sp1">
                            <img class="wi-2rem mr10" src="/img/jim19.png" alt="">
                            <p class="mr10 ccenter4">マシーン画像</p>
                        </div>  
                        <input type="file" wire:model="machine_img">
                    </div>
                    <div class="p10">
                        <button type="submit" class="original-button ccenter3">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
