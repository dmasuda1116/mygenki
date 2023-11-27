{{-- 色付きテーブル（ヘッダ用） --}}
@props([
'level' => 0,
'data_list' => [
[
'level' => '8',
'range' => '９割～',
'value' => '100',
'text' => 'すっきり',
'state' => '(快調)',
],
[
'level' => '7',
'range' => '８割～',
'value' => '80',
'text' => 'すごくいい',
'state' => '(好調)',
],
[
'level' => '6',
'range' => '７割～',
'value' => '70',
'text' => 'いいよ',
'state' => '(順調)',
],
[
'level' => '5',
'range' => '６割～',
'value' => '60',
'text' => 'そこそこ',
'state' => '(不快)',
],
[
'level' => '4',
'range' => '５割～',
'value' => '50',
'text' => 'いまいち',
'state' => '(不満)',
],
[
'level' => '3',
'range' => '４割～',
'value' => '40',
'text' => 'よくない',
'state' => '(不満)',
],
[
'level' => '2',
'range' => '３割～',
'value' => '30',
'text' => 'わるい',
'state' => '(絶不調)',
],
[
'level' => '1',
'range' => '～３割',
'value' => '20',
'text' => 'くるしい',
'state' => '(要休養)',
],
],
])

<table class="table table-bordered text-center align-middle" style="border-collapse: collapse;">
    <thead>
        <tr class="custom-item-font-color custom-item-main-color">
            <th scope="col" style="width:20%;">元気の量</th>
            <th scope="col" style="width:35%;">元気レベル</th>
            <th scope="col" colspan="2" style="width:45%;">調子は？</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_list as $item)

        @if($item['level'] == $level)
        <tr class="custom-item-font-color custom-item-sub-color"
            style="border-top:5px red solid; border-bottom:5px red solid;">
            <td style="border-left:5px red solid;">{{ $item['range'] }}</td>
            <td>
                <div class="progress custom-level{{ $item['level'] }}-sub-color">
                    <div class="progress-bar custom-level{{ $item['level'] }}-main-color" role="progressbar"
                        style="width:{{ $item['value'] }}%;" aria-valuenow="{{ $item['value'] }}" aria-valuemin="0"
                        aria-valuemax="100">
                        {{ $item['level'] }}
                    </div>
                </div>
            </td>
            <td class="text-start pr-0" style="border-right:0px none;">{{ $item['text'] }}</td>
            <td class="text-end pl-0" style="border-right:5px red solid; border-left:0px none;">{{ $item['state'] }}
            </td>
        </tr>

        @else

        <tr class="custom-item-font-color custom-item-sub-color">
            <td>{{ $item['range'] }}</td>
            <td>
                <div class="progress custom-level{{ $item['level'] }}-sub-color">
                    <div class="progress-bar custom-level{{ $item['level'] }}-main-color" role="progressbar"
                        style="width:{{ $item['value'] }}%;" aria-valuenow="{{ $item['value'] }}" aria-valuemin="0"
                        aria-valuemax="100">
                        {{ $item['level'] }}
                    </div>
                </div>
            </td>
            <td class="text-start pr-0" style="border-right:0px none;">{{ $item['text'] }}</td>
            <td class="text-end pl-0" style="border-left:0px none;">{{ $item['state'] }}</td>
        </tr>
        @endif

        @endforeach
    </tbody>
</table>