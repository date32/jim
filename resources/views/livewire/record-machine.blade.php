<div class="wi12 ccenter3 sp1 jim-img4">
    <livewire:header />
    <div class="f2 tcenter mt30 mb20">{{ $machine->machine_name }}のトレーニング軌跡</div>
    <div><img class="wi-50 ccenter3 mb20 sp1" src="{{ $machine->img }}" alt=""></div>
    @foreach ($trainings as $training)
        @if ($machine->type === '筋力')
            <div class="dis wi-50 ccenter3 bbd p10 sp1 flex">
                <div class="wi-25">重さ: {{ $training->weight }}kg</div>
                <div class="wi-25">回数: {{ $training->count }}回</div>
                <div class="wi-50">日付: {{ $training->created_at->format('Y年m月d日') }}</div>
            </div>
        @endif

        @if ($machine->type === '持久力')
            <div class="dis wi8 ccenter3 bbd p10 sp1">
                <div class="dis wi-25 flex sp1">
                    <div>時間:{{ $training->minutes }}分</div>
                    <div>{{ $training->seconds }}秒</div>
                </div>         
                <div class="wi-25 sp1">速さ:{{ $training->speed }}km/h</div>
                <div class="wi-25 sp1">距離:{{ $training->distance }}km</div>
                <div class="wi-25 sp1">日付:{{ $training->created_at->format('Y年m月d日') }}</div>
            </div>
        @endif
    @endforeach
    <div class="wi8 ccenter3 mt20 mb20 sp1"><a class="a" href="/record">戻る</a></div>
</div>