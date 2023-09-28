<div>
    @foreach ($trainings as $training)

    <div class="wi-30">消費カロリー: {{ $training->calorie }}cal</div>

    
    @endforeach

    <div class="pagination-links">
        {{ $trainings->links() }}
    </div>
    
</div>
