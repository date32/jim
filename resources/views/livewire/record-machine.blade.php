<div class="wi12 ccenter3 sp1 jim-img4">
    <livewire:header />

    <div class="f2 tcenter mt30 mb20">{{ $machine->machine_name }}のトレーニング軌跡</div>

    <div class="dis">
        <div class="wi-50 sp-wimax"><img src="{{ $machine->img }}" alt=""></div>
        <div class="wi-50 sp-wimax">
            @foreach ($trainings as $training)
                @if ($machine->type === '筋力')
                    <div class="bbd p10">
                        <div class="dis sp-grid3">
                            <div class="wi-20 sp-wimax">強度: {{ $training->strength }}</div>
                            <div class="wi-20 sp-wimax">重さ: {{ $training->weight }}kg</div>
                            <div class="wi-20 sp-wimax">回数: {{ $training->count }}回</div>
                            <div class="wi-40 sp-none sp-wimax">日付: {{ $training->created_at->format('Y年m月d日') }}</div>
                        </div>
                        <div class="pc-none p10">日付: {{ $training->created_at->format('Y年m月d日') }}</div>
                    </div>
                @endif

                @if ($machine->type === '持久力')
                    <div class="bbd p10">
                        <div class="dis sp1">
                            <div class="dis wi-25 flex sp-wimax sp1">
                                <div>時間:{{ $training->minutes }}分</div>
                                <div>{{ $training->seconds }}秒</div>
                            </div>
                            <div class="wi-25 sp1 sp-wimax">速さ:{{ $training->speed }}km/h</div>
                            <div class="wi-25 sp1 sp-wimax">距離:{{ $training->distance }}km</div>
                            <div class="wi-25 sp1 sp-wimax">消費カロリー:{{ $training->calorie }}cal</div>
                        </div>
                        <div class="sp1">日付:{{ $training->created_at->format('Y年m月d日') }}</div>
                    </div>
                   
                @endif
            @endforeach
        </div>
    </div>


    <div class="wi8 ccenter3 mt20 mb20 sp1"><a class="a" href="/record">戻る</a></div>
</div>
