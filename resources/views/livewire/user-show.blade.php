<div class="wi12 ccenter3 sp1">
    <livewire:header />
    <livewire:menu-list />
    <div class="f2 tcenter mt30">ユーザー一覧</div>
    <div class="ccenter3 wi5 mt30 mb30 sp1">
        @if (!$delete_yes_no)
        <table>
            <tr class="bb">
                <th class="wi1">ID</th>
                <th class="wi3">ユーザー名</th>
                <th class="wi1"></th>
            </tr>
            @foreach ($users as $user)
                <tr class="bbd">
                    <td class="tcenter">{{ $user->id }}</td>
                    <td class="tcenter">{{ $user->name }}</td>
                    <td>
                        <div>
                            <button class="original-button2"
                                wire:click="confirmUserDelete({{ $user->id }})">削除</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
        @if ($delete_yes_no)
            <div>
                <p class="tcenter">本当に{{ $name }}を削除しますか？</p>
                <div class="dis ccenter">
                    <p class="cursor original-button3" wire:click="delete_yes">はい</p>
                    <p class="cursor original-button2" wire:click="delete_no">いいえ</p>
                </div>
            </div>
        @endif
    </div>
</div>

