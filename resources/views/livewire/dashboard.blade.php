<div class="wi12 ccenter3 sp1 jim-img2">
    <livewire:header />
    <div class="f2 tcenter mt30">今日のトレーニング</div>

    {{-- 両方 --}}
    <form wire:submit.prevent="trainingStore">
        <div class="dis">

            <div class="wi-80">




                <div class="dis">
                    {{-- スマホ --}}
                    <div class="pc-none flex">
                        <div><img src="img/jim6.png" class="wi-2rem mr10" alt=""></div>
                        <div class="ccenter4 wi-20">使用マシーン</div>
                    </div>
                    {{-- スマホ --}}

                    <div class="sp-none"><img src="img/jim6.png" class="wi-2rem mr10" alt=""></div>
                    <div class="ccenter4 wi-20 sp-none">使用マシーン</div>

                    <div class="wi-40">
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

                    {{-- スマホ --}}
                    <div class="pc-none flex">
                        <div><img src="img/jim7.png" class="wi-2rem mr10" alt=""></div>
                        <div class="ccenter4 mb10">タイプ：{{ $type }}</div>
                    </div>
                    {{-- スマホ --}}

                    <div class="sp-none"><img src="img/jim7.png" class="wi-2rem mr10" alt=""></div>
                    <div class="ccenter4 mb10 sp-none">タイプ：{{ $type }}</div>

                </div>

                <div class="pc-none">
                    <div><img class="ccenter3 wi2" src="{{ $machineImg }}" alt=""></div>
                </div>

                <div class="he2rem"></div>

                @if ($type === '持久力')
                    {{-- pc --}}
                    <div class="sp-none">
                        {{-- 時間 --}}
                        <div class="dis flex">
                            <div><img src="img/jim11.png" class="wi-2rem mr10" alt=""></div>
                            <div class="wi-20 ccenter4">トレーニング時間</div>
                            <div class="dis wi-30">
                                <div class="mr10"><input class="sp-100" type="text" wire:model="minutes"></div>
                                <div class="ccenter4 mr20">分</div>
                            </div>
                            <div class="dis wi-30">
                                <div class="mr10"><input class="sp-100" type="text" wire:model="seconds"></div>
                                <div class="ccenter4">秒</div>
                            </div>
                        </div>
                        <div class="he2rem dis">
                            <div class="wi-2rem mr10"></div>
                            <div class="wi-20"></div>
                            @error('minutes')
                                <div class="wi-30 c3">{{ $message }}</div>
                            @enderror
                            @error('seconds')
                                <div class="wi-30 c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- スピード --}}
                        <div class="dis">
                            <div><img src="img/jim13.png" class="wi-2rem mr10" alt=""></div>
                            <div class="wi-20 ccenter4">スピード</div>
                            <div class="mr10"><input type="text" wire:model="speed"></div>
                            <div class="ccenter4">km/h</div>
                        </div>
                        <div class="he2rem dis">
                            <div class="wi-2rem mr10"></div>
                            <div class="wi-20"></div>
                            @error('speed')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 距離 --}}
                        <div class="dis flex">
                            <div><img src="img/jim15.png" class="wi-2rem mr10" alt=""></div>
                            <div class="wi-20 ccenter4">距離</div>
                            <div class="mr10"><input type="text" wire:model="distance"></div>
                            <div class="ccenter4">km</div>
                        </div>
                        <div class="he2rem dis">
                            <div class="wi-2rem mr10"></div>
                            <div class="wi-20"></div>
                            @error('distance')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- カロリー --}}
                        <div class="dis flex">
                            <div class="ccenter4"><img src="img/jim12.png" class="wi-2rem mr10" alt=""></div>
                            <div class="wi-20 ccenter4">消費カロリー</div>
                            <div class="mr10"><input type="text" wire:model="digitalCalorie"></div>
                            <div class="ccenter4">cal</div>
                        </div>
                        <div class="he2rem dis">
                            <div class="wi-2rem mr10"></div>
                            <div class="wi-20"></div>
                            @error('digitalCalorie')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- スマホ --}}
                    <div class="pc-none">
                        {{-- 時間 --}}
                        <div class="flex">
                            <div><img src="img/jim11.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4">トレーニング時間</div>
                        </div>
                        <div class="flex">
                            <div class="mr10"><input type="text" wire:model="minutes"></div>
                            <div class="ccenter4 mr20">分</div>
                        </div>
                        <div class="he2rem">
                            @error('minutes')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex">
                            <div class="mr10"><input type="text" wire:model="seconds"></div>
                            <div class="ccenter4">秒</div>
                        </div>
                        <div class="he2rem">
                            @error('seconds')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- スピード --}}
                        <div class="flex">
                            <div><img src="img/jim13.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4">スピード</div>
                        </div>
                        <div class="flex">
                            <div class="mr10"><input type="text" wire:model="speed"></div>
                            <div class="ccenter4">km/h</div>
                        </div>
                        <div class="he2rem">
                            @error('speed')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 距離 --}}
                        <div class="flex">
                            <div><img src="img/jim15.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4">距離</div>
                        </div>
                        <div class="flex">
                            <div class="mr10"><input type="text" wire:model="distance"></div>
                            <div class="ccenter4">km</div>
                        </div>
                        <div class="he2rem">
                            @error('distance')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- カロリー --}}
                        <div class="flex">
                            <div class="ccenter4"><img src="img/jim12.png" class="wi-2rem mr10" alt="">
                            </div>
                            <div class="ccenter4">消費カロリー</div>
                        </div>
                        <div class="flex">
                            <div class="mr10"><input type="text" wire:model="digitalCalorie"></div>
                            <div class="ccenter4">cal</div>
                        </div>
                        <div class="he2rem">
                            @error('digitalCalorie')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif

                @if ($type === '筋力')
                    {{-- pc --}}
                    <div class="sp-none">
                        {{-- 強度 --}}
                        <div class="dis flex">
                            <div><img src="img/jim8.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4 wi-20">強度</div>
                            <div class=""><input type="text" wire:model="strength"></div>
                        </div>
                        <div class="he2rem dis">
                            <div class="wi-2rem mr10"></div>
                            <div class="wi-20"></div>
                            @error('strength')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 重さ --}}
                        <div class="dis flex">
                            <div><img src="img/jim9.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4 wi-20">重さ</div>
                            <div class="mr10"><input type="text" wire:model="weight"></div>
                            <div class="ccenter4">kg</div>
                        </div>
                        <div class="he2rem dis">
                            <div class="wi-2rem mr10"></div>
                            <div class="wi-20"></div>
                            @error('weight')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- カウント --}}
                        <div class="dis flex">
                            <div><img src="img/jim14.png" class="wi-2rem mr10" alt=""></div>
                            <div class="wi-20 ccenter4">カウント</div>
                            <div class="mr10"> <input type="text" wire:model="count"></div>
                            <div class="ccenter4">回</div>
                        </div>
                        <div class="he2rem dis">
                            <div class="wi-2rem mr10"></div>
                            <div class="wi-20"></div>
                            @error('count')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 時間 --}}
                        <div class="dis flex">
                            <div><img src="img/jim11.png" class="wi-2rem mr10" alt=""></div>
                            <div class="wi-20 ccenter4">トレーニング時間</div>
                            <div class="dis wi-30">
                                <div class="mr10"><input class="sp-100" type="text" wire:model="minutes"></div>
                                <div class="ccenter4 mr20">分</div>
                            </div>
                            <div class="dis wi-30">
                                <div class="mr10"><input class="sp-100" type="text" wire:model="seconds"></div>
                                <div class="ccenter4">秒</div>
                            </div>
                        </div>
                        <div class="he2rem dis">
                            <div class="wi-2rem mr10"></div>
                            <div class="wi-20"></div>
                            @error('minutes')
                                <div class="wi-30 c3">{{ $message }}</div>
                            @enderror
                            @error('seconds')
                                <div class="wi-30 c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- カロリー --}}
                        <div class="dis flex">
                            <div class="ccenter4"><img src="img/jim12.png" class="wi-2rem mr10" alt="">
                            </div>
                            <div class="wi-20 ccenter4">消費カロリー</div>
                            <div class="mr20 ccenter4"><input type="text" wire:model="calorie" class="mr10"
                                    readonly>cal</div>
                            <div>※トレーニング時間を入力すると消費カロリーが計算されます。<br>正味の時間を入力してください。<br>
                                また、体重登録は必須です。
                            </div>
                        </div>
                    </div>

                    {{-- スマホ --}}
                    <div class="pc-none">
                        {{-- 強度 --}}
                        <div class="flex">
                            <div><img src="img/jim8.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4">強度</div>
                        </div>
                        <div class=""><input type="text" wire:model="strength"></div>
                        <div class="he2rem">
                            @error('strength')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 重さ --}}
                        <div class="flex">
                            <div><img src="img/jim9.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4">重さ</div>
                        </div>
                        <div class="flex">
                            <div class="mr10"><input type="text" wire:model="weight"></div>
                            <div class="ccenter4">kg</div>
                        </div>
                        <div class="he2rem">
                            @error('weight')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- カウント --}}
                        <div class="flex">
                            <div><img src="img/jim14.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4">カウント</div>
                        </div>
                        <div class="flex">
                            <div class="mr10"> <input type="text" wire:model="count"></div>
                            <div class="ccenter4">回</div>
                        </div>
                        <div class="he2rem">
                            @error('count')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 時間 --}}
                        <div class="flex">
                            <div><img src="img/jim11.png" class="wi-2rem mr10" alt=""></div>
                            <div class="ccenter4">トレーニング時間</div>
                        </div>
                        <div class="flex">
                            <div class="mr10"><input type="text" wire:model="minutes"></div>
                            <div class="ccenter4 mr20">分</div>
                        </div>
                        <div class="he2rem">
                            @error('minutes')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex">
                            <div class="mr10"><input type="text" wire:model="seconds"></div>
                            <div class="ccenter4">秒</div>
                        </div>
                        <div class="he2rem">
                            @error('seconds')
                                <div class="c3">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- カロリー --}}
                        <div class="flex">
                            <div class="ccenter4"><img src="img/jim12.png" class="wi-2rem mr10" alt="">
                            </div>
                            <div class="ccenter4">消費カロリー</div>
                        </div>
                        <div class="mr20 ccenter4"><input type="text" wire:model="calorie" class="mr10"
                                readonly>cal</div>
                        <div>※トレーニング時間を入力すると消費カロリーが計算されます。<br>正味の時間を入力してください。<br>
                            また、体重登録は必須です。
                        </div>
                    </div>
                @endif

            </div>

            <div class="wi-20 sp-none">
                <div><img class="ccenter3 wi2" src="{{ $machineImg }}" alt=""></div>
            </div>

        </div>

        <div>
            <button type="submit" class="ccenter3 original-button mb20 mt20">送信</button>
        </div>
    </form>

</div>
