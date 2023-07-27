<div>
    <livewire:header />
    <div>{{ $machine->machine_name }}のトレーニング軌跡</div>
    <div><img src="{{ $machine->img }}" alt="" class="wi1"></div>
    @foreach ($trainings as $training)
        @if ($machine->type === '筋力')
            <div class="dis">
                <div>重さ:{{ $training->weight }}kg</div>
                <div>回数:{{ $training->count }}回</div>
                <div>日付:{{ $training->created_at->format('Y年m月d日') }}</div>
            </div>
        @endif

        @if ($machine->type === '持久力')
            <div class="dis">
                <div>時間:{{ $training->minutes }}分</div>
                <div>{{ $training->seconds }}秒</div>
                <div>速さ:{{ $training->speed }}km/h</div>
                <div>距離:{{ $training->distance }}km</div>
                <div>日付:{{ $training->created_at->format('Y年m月d日') }}</div>
            </div>
        @endif
    @endforeach
    <div><a href="/record">今までの累計数へ戻る</a></div>
</div>
