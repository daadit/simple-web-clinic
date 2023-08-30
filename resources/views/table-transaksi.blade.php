@foreach ($detail as $number => $data)
    <tr>
        <td width="8%">{{ ++$number }}</td>
        <td>{{ $data->barangnama }}</td>
        <td>@currency($data->barangharga)</td>
        <td>{{ $data->dtjumlah }}</td>
        <td>@currency($data->dttotal)</td>
        <td class="text-center">
            <button class="btn btn-light-primary text-primary" type="button" onclick="deleteDataDetail({{ $data->dtid }})">
                <i class="ti ti-trash"></i>
            </button>
        </td>
    </tr>
@endforeach