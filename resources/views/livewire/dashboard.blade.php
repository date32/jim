<div class="wi12 ccenter3 sp1">
    <livewire:header />
    <div class="f2 tcenter mt30">今日のトレーニング</div>

    <form wire:submit.prevent="trainingStore">
        {{-- pc用 --}}
        <div class="sp-none">
            <table class="wi8 ccenter3">
                <tr>
                    <th class="wi1-5"></th>
                    <th class="wi2"></th>
                    <th class="wi3"></th>
                    <th class="wi1-5"></th>
                </tr>

                <tr class="he1">
                    <td>使用マシーン</td>
                    <td class="mr10">
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
                    <td class="mr10"><img class="wi3" src="{{ $machineImg }}" alt=""></td>
                    <td class="pl20">タイプ：{{ $type }}</td>
                </tr>


                <tr class="he3">
                    <td colspan="4">

                        @if ($type === '持久力')
                            <table>
                                <tr>
                                    <th class="wi1-5"></th>
                                    <th class="wi3"></th>
                                    <th class="wi3"></th>
                                </tr>
                                <tr>
                                    <td>トレーニング時間</td>
                                    <td>
                                        <div class="dis">
                                            <div class="mr20"><input type="text" wire:model="minutes"></div>
                                            <div class="ccenter4">分</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dis">
                                            <div class="mr20"><input type="text" wire:model="seconds"></div>
                                            <div class="ccenter4">秒</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="he2rem c3">
                                    <td></td>
                                    <td>
                                        @error('minutes')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        @error('seconds')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>スピード</td>
                                    <td>
                                        <div class="dis">
                                            <div class="mr20"><input type="text" wire:model="speed"></div>
                                            <div class="ccenter4">km/h</div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="he2rem c3">
                                    <td></td>
                                    <td>
                                        @error('speed')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>距離</td>
                                    <td>
                                        <div class="dis">
                                            <div class="mr20"><input type="text" wire:model="distance"></div>
                                            <div class="ccenter4">km</div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="he2rem c3">
                                    <td></td>
                                    <td>
                                        @error('distance')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td></td>
                                </tr>


                            </table>
                        @endif

                        @if ($type === '筋力')
                            <table>
                                <tr>
                                    <th class="wi1-5"></th>
                                    <th class="wi3"></th>
                                    <th class="wi3"></th>
                                </tr>
                                <tr>
                                    <td>重さ</td>
                                    <td>
                                        <div class="dis">
                                            <div class="mr20"><input type="text" wire:model="weight"></div>
                                            <div class="ccenter4">kg</div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="he2rem c3">
                                    <td></td>
                                    <td>
                                        @error('weight')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>カウント</td>
                                    <td>
                                        <div class="dis">
                                            <div class="mr20"> <input type="text" wire:model="count"></div>
                                            <div class="ccenter4">回</div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="he2rem c3">
                                    <td></td>
                                    <td>
                                        @error('count')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        @endif

                    </td>
                </tr>

            </table>


            <div>
                <button type="submit" class="ccenter3 original-button mb20">送信</button>
            </div>
            <div class="wi8 ccenter3 mb20"><a href="/record" class="a">今までの記録を見る</a></div>
        </div>

        {{-- スマホ用 --}}
        <div class="pc-none">

            <div>使用マシーン</div>
            <div class="flex">
                <div class="mr10">
                    <div>
                        <select wire:model="machineId" required>
                            <option value="">選択してください</option>
                            @foreach ($machines as $machine)
                                <option value="{{ $machine->id }}">{{ $machine->machine_name }}</option>
                            @endforeach
                        </select>
                        <div class="mb10">タイプ：{{ $type }}</div>
                        @error('machineId')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="wi1-5"><img src="{{ $machineImg }}" alt=""></div>
            </div>

            @if ($type === '持久力')
                <div>トレーニング時間</div>
                <div class="flex">
                    <div class="mr10"><input class="wi1" type="text" wire:model="minutes"></div>
                    <div class="ccenter4 mr20">分</div>
                    <div class="mr10"><input class="wi1" type="text" wire:model="seconds"></div>
                    <div class="ccenter4">秒</div>
                </div>
                @error('minutes')
                    <div>{{ $message }}</div>
                @enderror
                @error('seconds')
                    <div>{{ $message }}</div>
                @enderror
                <div>スピード</div>
                <div class="flex">
                    <div class="mr10"><input type="text" wire:model="speed"></div>
                    <div class="ccenter4">km/h</div>
                </div>
                @error('speed')
                    <div>{{ $message }}</div>
                @enderror
                <div>距離</div>
                <div class="flex">
                    <div class="mr10"><input type="text" wire:model="distance"></div>
                    <div class="ccenter4">km</div>
                </div>
                @error('distance')
                    <div>{{ $message }}</div>
                @enderror
            @endif

            @if ($type === '筋力')
                <div>重さ</div>
                <div class="flex">
                    <div class="mr10"><input type="text" wire:model="weight"></div>
                    <div class="ccenter4">kg</div>
                </div>
                @error('weight')
                    <div>{{ $message }}</div>
                @enderror
                <div>カウント</div>
                <div class="flex">
                    <div class="mr10"> <input type="text" wire:model="count"></div>
                    <div class="ccenter4">回</div>
                </div>
                @error('count')
                    <div>{{ $message }}</div>
                @enderror
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            @endif

            <div>
                <button type="submit" class="ccenter3 original-button mb20 mt20">送信</button>
            </div>
            <div><a href="/record" class="a">今までの記録を見る</a></div>
        </div>

    </form>


</div>
