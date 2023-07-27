<div>
    <livewire:header />
    <div>トレーニングの記録</div>
    <div class="dis">
        {{-- 今までの累計 --}}
        <div>
            <div>今までの累計数</div>

            @foreach ($areaWithTraining as $area)
                @php
                    $weight = 0; // 重さの合計を初期化
                    $distance = 0; // 距離の合計を初期化
                @endphp

                <div class="dis">

                    {{-- 鍛えるエリアを表示 --}}
                    <div>
                        <div>{{ $area->training_area }}</div>
                        <div><img src="{{ $area->area_img }}" alt="" class="wi1"></div>
                    </div>

                    <div>
                        @foreach ($area->machineForTrainingAreas as $m_for_ts)
                            @foreach ($m_for_ts->machine->trainings as $training)
                                @if ($training->user_id === $loginUserId)
                                    @php
                                        // 合計値を計算
                                        $weight += ($training->weight * $training->count) / 1000;
                                        $distance += $training->distance;
                                    @endphp
                                @endif
                                {{-- <div>{{$training->created_at}}</div> --}}
                            @endforeach
                        @endforeach

                        @if ($m_for_ts->machine->type === '筋力')
                            <div>合計: {{ $weight }}t</div>
                        @endif
                        @if ($m_for_ts->machine->type === '持久力')
                            <div>合計: {{ $distance }}km</div>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>

        {{-- 今月の累計 --}}
        <div>
            <div>{{ $monthNumber }}月の累計数</div>

            @foreach ($areaWithTraining as $area)
                @php
                    $weight = 0; // 重さの合計を初期化
                    $distance = 0; // 距離の合計を初期化
                @endphp

                <div class="dis">

                    {{-- 鍛えるエリアを表示 --}}
                    <div>
                        <div>{{ $area->training_area }}</div>
                        <div><img src="{{ $area->area_img }}" alt="" class="wi1"></div>
                    </div>

                    <div>
                        @foreach ($area->machineForTrainingAreas as $m_for_ts)
                            @foreach ($m_for_ts->machine->trainings as $training)
                                {{-- トレーニング者とログイン者が一緒ならば --}}
                                @if ($training->user_id === $loginUserId)
                                    {{-- ここで今月だけのif文 今月とデータが作られた月が一緒ならば --}}
                                    @if ($monthNumber == $training->created_at->format('n'))
                                        @php
                                            // 合計値を計算
                                            $weight += ($training->weight * $training->count) / 1000;
                                            $distance += $training->distance;
                                        @endphp
                                    @endif
                                @endif
                            @endforeach
                        @endforeach

                        @if ($m_for_ts->machine->type === '筋力')
                            <div>合計: {{ $weight }}t</div>
                        @endif
                        @if ($m_for_ts->machine->type === '持久力')
                            <div>合計: {{ $distance }}km</div>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>

        {{-- マシーン別 --}}
        <div>
            <div>マシーン別トレーニング軌跡</div>

            @foreach ($machines as $machine)
                <div class="dis">
                    <div><a href="/record/machine/{{ $machine->id }}">{{ $machine->machine_name }}</a></div>
                    <div><img src="{{ $machine->img }}" alt="" class="wi1"></div>
                </div>
            @endforeach

        </div>
    </div>






</div>
