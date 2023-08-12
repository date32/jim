<div class="wi12 ccenter3 sp1 jim-img4">
    <livewire:header />

    <div class="f2 tcenter mt30 mb20">{{ $machine->machine_name }}のトレーニング軌跡</div>

    <div class="dis mb10">
        <div class="wi-50 sp-wimax mr10"><img src="{{ $machine->img }}" alt=""></div>
        <div class="wi-50 sp-wimax">

            <div class="f1-5">トレーニングエリア</div>
            <div>クリックすると鍛えることが出来るマシーンが参照出来ます</div>
            <div class="grid3 mb20">
                @foreach ($machineWithArea[0]->machineForTrainingAreas as $m_f_t)         
                        <div class="p10 original-box-shadow linkbox">
                            {{-- カード全体のリンクこのエリアを鍛えるマシーン一覧ページへ --}}
                            <a href="/record/machineserch/{{$m_f_t->trainingArea->id}}"></a>
                            <div class="wimax">【{{ $m_f_t->trainingArea->training_area }}】</div>
                            <div><img src="{{ $m_f_t->trainingArea->area_img }}" alt=""></div>
                        </div> 
                @endforeach
            </div>

            <div class="f1-5">トレーニング軌跡</div>
            @foreach ($trainings as $training)
                @if ($machine->type === '筋力')
                    {{-- pc --}}
                    <div class="sp-none">
                        <div class="bbd p10">
                            <div>日付: {{ $training->created_at->format('Y年m月d日') }}</div>
                            <div class="dis">
                                <div class="wi-25">強度: {{ $training->strength }}</div>
                                <div class="wi-25">重さ: {{ $training->weight }}kg</div>
                                <div class="wi-20">回数: {{ $training->count }}回</div>
                                <div class="wi-30">消費カロリー: {{ $training->calorie }}cal</div>
                            </div>
                        </div>
                    </div>
                    {{-- スマホ --}}
                    <div class="pc-none">
                        <div class="bbd p10">
                            <div>日付: {{ $training->created_at->format('Y年m月d日') }}</div>
                            <div class="flex">
                                <div class="wi-50">強度: {{ $training->strength }}</div>
                                <div class="wi-50">重さ: {{ $training->weight }}kg</div>
                            </div>
                            <div class="flex">
                                <div class="wi-50">回数: {{ $training->count }}回</div>
                                <div class="wi-50">消費カロリー: {{ $training->calorie }}cal</div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($machine->type === '持久力')
                    {{-- pc --}}
                    <div class="sp-none">
                        <div class="bbd p10 sp-none">
                            <div>日付:{{ $training->created_at->format('Y年m月d日') }}</div>
                            <div class="dis">
                                <div class="dis wi-25">
                                    <div>時間:{{ $training->minutes }}分</div>
                                    <div>{{ $training->seconds }}秒</div>
                                </div>
                                <div class="wi-25">速さ:{{ $training->speed }}km/h</div>
                                <div class="wi-20">距離:{{ $training->distance }}km</div>
                                <div class="wi-30">消費カロリー:{{ $training->calorie }}cal</div>
                            </div>
                        </div>
                    </div>

                    {{-- スマホ --}}
                    <div class="pc-none">
                        <div class="bbd p10">
                            <div>日付:{{ $training->created_at->format('Y年m月d日') }}</div>
                            <div class="flex">
                                <div class="wi-50 flex">
                                    <div>時間:{{ $training->minutes }}分</div>
                                    <div>{{ $training->seconds }}秒</div>
                                </div>
                                <div class="wi-50">速さ:{{ $training->speed }}km/h</div>
                            </div>
                            <div class="flex">
                                <div class="wi-50">距離:{{ $training->distance }}km</div>
                                <div class="wi-50">消費カロリー:{{ $training->calorie }}cal</div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
