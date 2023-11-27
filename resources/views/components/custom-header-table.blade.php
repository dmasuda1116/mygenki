{{-- 色付きテーブル（ヘッダ用） --}}
@props([
'level' => 0,
])

<table class="table text-center" style="border-collapse: separate; table-layout: fixed;">
    <thead>
        <tr class="custom-item-font-color custom-item-main-color">
            <th colspan="2" scope="col" class="align-middle">わるい</th>
            <th colspan="2" scope="col" class="align-middle">よくない</th>
            <th colspan="2" scope="col" class="align-middle">ふつう</th>
            <th colspan="2" scope="col" class="align-middle">よい</th>
        </tr>
        <thead>
        <tbody>
            <tr>
                @foreach ([1,2,3,4,5,6,7,8] as $index)
                @if($index == $level)
                <td class="align-middle custom-item-font-color custom-level{{ $index }}-main-color"
                    style="border:5px red solid;">{{ $index }}</td>
                @else
                <td class="align-middle custom-item-font-color custom-level{{ $index }}-main-color">{{ $index }}</td>
                @endif
                @endforeach
            </tr>
        </tbody>
</table>