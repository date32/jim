<div class="wi12 ccenter3 sp1">
    <livewire:header />
    <div class="f2 tcenter mt30 mb20">トレーニングの記録</div>
    <div class="dis mb10">
        {{-- 今までの累計 --}}
        <div class="wi-40 mr20 sp1">
            <div class="f1-5 tcenter">今までの累計数</div>

            @foreach ($areaWithTraining as $area)
                @php
                    $weight = 0; // 重さの合計を初期化
                    $distance = 0; // 距離の合計を初期化
                @endphp

                <div class="dis p10 flex">

                    {{-- 鍛えるエリアを表示 --}}

                    <div class="wi-25 ccenter4">{{ $area->training_area }}</div>
                    <div class="wi-50"><img src="{{ $area->area_img }}" alt=""></div>



                    @foreach ($area->machineForTrainingAreas as $m_for_ts)
                        @foreach ($m_for_ts->machine->trainings as $training)
                            @if ($training->user_id === $loginUserId)
                                @php
                                    // 合計値を計算
                                    $weight += ($training->weight * $training->count) / 1000;
                                    $distance += $training->distance;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach

                    <div class="wi-25 ccenter4">
                        @if ($m_for_ts->machine->type === '筋力')
                            <div>合計: {{ $weight }}t</div>
                        @endif
                        @if ($m_for_ts->machine->type === '持久力')
                            <div>合計: {{ $distance }}km</div>
                        @endif
                    </div>

                </div>
                <div class="bbd"></div>
            @endforeach
        </div>

        {{-- 今月の累計 --}}
        <div class="wi-40 mr20 sp1">
            <div class="f1-5 tcenter">{{ $monthNumber }}月の累計数</div>

            @foreach ($areaWithTraining as $area)
                @php
                    $weight = 0; // 重さの合計を初期化
                    $distance = 0; // 距離の合計を初期化
                @endphp

                <div class="dis p10 flex">

                    {{-- 鍛えるエリアを表示 --}}

                    <div class="wi-25 ccenter4">{{ $area->training_area }}</div>
                    <div class="wi-50"><img src="{{ $area->area_img }}" alt=""></div>



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

                    <div class="wi-25 ccenter4">
                        @if ($m_for_ts->machine->type === '筋力')
                            <div>合計: {{ $weight }}t</div>
                        @endif
                        @if ($m_for_ts->machine->type === '持久力')
                            <div>合計: {{ $distance }}km</div>
                        @endif
                    </div>

                </div>
                <div class="bbd"></div>
            @endforeach
        </div>

        {{-- マシーン別 --}}
        <div class="wi-20 sp1">
            <div class="f1-5 tcenter">マシーン別<br>トレーニング軌跡</div>

            @foreach ($machines as $machine)
                <div class="dis flex">
                    <div class="wi-50 ccenter4"><a class="a"
                            href="/record/machine/{{ $machine->id }}">{{ $machine->machine_name }}</a></div>
                    <div class="wi-50"><img src="{{ $machine->img }}" alt="" class="wi1"></div>
                </div>
            @endforeach

        </div>
    </div>

    
</div>

<style>
    /* .w-50 {
        width: 50%;
    }

    .w-40 {
        width: 40%;
        
    }

    .w-25 {
        width: 25%;
    }

    .w-20 {
        width: 20%;
    } */

    /* @media(max-width:600) {
        .w-50 {
            width: 100%;
        }

        .w-40 {
            width: 100%;
             color: red;
        }

        .w-25 {
            width: 100%;
        }

        .w-20 {
            width: 100%;
        }
    } */
</style>
