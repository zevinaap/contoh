<table border="1" width="100%">
    <tr>
        <th>Nama</th>
        <th>Qty</th>
        <th>Subtotal</th>
        <th>Aksi</th>
    </tr>

    @php $total = 0; @endphp

    @if(session('cart'))
        @foreach(session('cart') as $id => $item)
            @php $total += $item['subtotal']; @endphp

            <tr>
                <td>{{ $item['nama'] }}</td>

                <td>
                    <input type="number"
                           value="{{ $item['qty'] }}"
                           onchange="updateQty({{ $id }}, this.value)">
                </td>

                <td>{{ $item['subtotal'] }}</td>

                <td>
                    <button onclick="deleteCart({{ $id }})">Hapus</button>
                </td>
            </tr>
        @endforeach
    @endif
</table>

<h3>Total: {{ $total }}</h3>