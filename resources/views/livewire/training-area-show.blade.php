<div>
    <livewire:header />
    トレーニングエリア一覧
    <table>
        <tr>
            <th>ID</th>
            <th>トレーニングエリア</th>
            <th></th>
            <th>変更</th>
            <th>削除</th>
        </tr>
        @foreach($areas as $area)
        <tr>
            <td>{{$area->id}}</td>
            <td>{{$area->training_area}}</td>
            <td><img src="{{$area->area_img}}" alt="" class="wi1"></td>    
            <td><button onclick="location.href='/admin/training_area/edit/{{$area->id}}'">変更</button></td>
            <td><button wire:click="confirmTrainigAreaDelete({{$area->id}})">削除</button></td>
        </tr>
        @endforeach
    </table>
    @if($delete_yes_no)
    <div>
        <p>本当に{{$name}}を削除しますか？</p>
        <p class="cursor mr50 ml20 dis3" wire:click="delete_yes">はい</p>
        <p class="cursor mr50 ml20 dis3" wire:click="delete_no">いいえ</p>
    </div>
    @endif
    
</div>
