<div class="wi12 ccenter3 sp1 jim-img3">
    <livewire:header />
    <div class="f2 tcenter mt30 mb20">トレーニングの記録</div>
    <div class="dis mb10">

        @if (!count($areaWithTraining) == 0)


            {{-- 今までの累計 --}}
            <div class="wi-40 mr20 sp1">
                <div class="f1-5 tcenter">今までの累計数</div>
                <div class="tcenter">消費カロリー:{{ $calorie }}cal</div>

                <div class="dis4">

                    @foreach ($areaWithTraining as $area)
                        @php
                            $weight = 0; // 重さの合計を初期化
                            $distance = 0; // 距離の合計を初期化
                            $count = 0; // 距離の合計を初期化
                        @endphp

                        <div class="wi-40 dis p10 original-box-shadow mr10 mb10 flex">

                            {{-- 鍛えるエリアを表示 --}}

                            <div class="wi-50">
                                <div class="wi- ccenter4">【{{ $area->training_area }}】</div>


                                @foreach ($area->machineForTrainingAreas as $m_for_ts)
                                    @foreach ($m_for_ts->machine->trainings as $training)
                                        @if ($training->user_id === $loginUserId)
                                            @php
                                                // 合計値を計算
                                                $weight += ($training->weight * $training->count) / 1000;
                                                $distance += $training->distance;
                                                $count += $training->count;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach

                                <div class="wi- ccenter4">
                                    @if ($m_for_ts->machine->type === '筋力')
                                        <div>合計: {{ $weight }}t</div>
                                        <div>合計: {{ $count }}回</div>
                                    @endif
                                    @if ($m_for_ts->machine->type === '持久力')
                                        <div>合計: {{ $distance }}km</div>
                                    @endif
                                </div>
                            </div>

                            <div class="wi-50"><img src="{{ $area->area_img }}" alt=""></div>

                        </div>
                        {{-- <div class="bbd"></div> --}}
                    @endforeach

                </div>

            </div>

            {{-- 今月の累計 --}}
            <div class="wi-40 mr20 sp1">
                <div class="f1-5 tcenter">{{ $monthNumber }}月の累計数</div>
                <div class="tcenter">消費カロリー:{{ $monthCalorie }}cal</div>

                @foreach ($areaWithTraining as $area)
                    @php
                        $weight = 0; // 重さの合計を初期化
                        $distance = 0; // 距離の合計を初期化
                        $count = 0; // 距離の合計を初期化
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
                                            $count += $training->count;
                                        @endphp
                                    @endif
                                @endif
                            @endforeach
                        @endforeach

                        <div class="wi-25 ccenter4">
                            @if ($m_for_ts->machine->type === '筋力')
                                <div>合計: {{ $weight }}t</div>
                                <div>合計: {{ $count }}回</div>
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
                <div class="f1-5 tcenter mb10">マシーン別<br>トレーニング軌跡</div>

                @foreach ($machines as $machine)
                    <div class="dis flex mb10">
                        <div class="wi-50 ccenter4"><a class="a"
                                href="/record/machine/{{ $machine->id }}">{{ $machine->machine_name }}</a></div>
                        <div class="wi-50"><img src="{{ $machine->img }}" alt="" class="wi1"></div>
                    </div>
                @endforeach
            </div>


        @else
            <div class="ccenter3">トレーニングエリア・マシーン名を登録しよう</div>
        @endif

    </div>

</div>
