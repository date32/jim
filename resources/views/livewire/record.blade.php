<div>
    <livewire:header />
    <div>トレーニングの記録</div>
    <div>今までの累計数(t)</div>

    <br>

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
                    {{-- <div>m_f_tのid:{{ $m_for_ts->id }}</div> --}}
                    {{-- <div>マシーンの名前：{{ $m_for_ts->machine->machine_name }}</div> --}}




                    @foreach ($m_for_ts->machine->trainings as $training)
                        @if ($training->user_id === $loginUserId)
                            <div>マシーンの名前：{{ $m_for_ts->machine->machine_name }}</div>
                            <div>trainingのid:{{ $training->id }}</div>
                            <div>trainingの分:{{ $training->minutes }}</div>
                            {{-- <div>trainingの秒:{{ $training->seconds }}</div> --}}
                            {{-- <div>trainingのスピード:{{ $training->speed }}</div> --}}
                            <div>trainingの距離:{{ $training->distance }}</div>
                            <div>trainingの重さ:{{ $training->weight }}</div>
                            <div>trainingのカウント:{{ $training->count }}</div>


                            @php
                                
                                // 合計値を計算
                                $weight += ($training->weight * $training->count) / 1000;
                                $distance += $training->distance;
                            @endphp
                        @endif
                    @endforeach
                @endforeach


                <div>合計: {{ $weight }}t</div>
                <div>合計: {{ $distance }}km</div>
            </div>


        </div>
    @endforeach
</div>

<div>今までの累計数(km)</div>
<div>今月の累計数(t)</div>
<div>今月の累計数(km)</div>
<div>マシーン別トレーニング軌跡</div>
</div>
