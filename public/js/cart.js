function addToCart(id) {
    fetch('/kasir/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ id: id })
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('cartBox').innerHTML = html;
    });
}


// UPDATE QTY
function updateQty(id, qty) {
    fetch('/kasir/cart/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ id: id, qty: qty })
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('cartBox').innerHTML = html;
    });
}


// DELETE
function deleteCart(id) {
    fetch('/kasir/cart/delete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ id: id })
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('cartBox').innerHTML = html;
    });
}


// CHECKOUT + MODAL STRUK
function checkout(event) {
    event.preventDefault();

    let uang = document.getElementById('uang').value;

    fetch('/kasir/checkout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ uang: uang })
    })
    .then(res => res.json())
    .then(data => {

        if (data.success) {

            let html = `
                <p><b>Total:</b> ${data.total}</p>
                <p><b>Uang:</b> ${data.uang}</p>
                <p><b>Kembalian:</b> ${data.kembalian}</p>
                <hr>
            `;

            data.items.forEach(item => {
                html += `<p>${item.nama} x ${item.qty} = ${item.subtotal}</p>`;
            });

            document.getElementById('strukContent').innerHTML = html;
            document.getElementById('strukModal').style.display = 'block';

        } else {
            alert(data.message || "Gagal transaksi");
        }
    });
}


// CLOSE MODAL
function closeStruk() {
    document.getElementById('strukModal').style.display = 'none';
    location.reload();
}


// PRINT STRUK
function printStruk() {
    let content = document.getElementById('strukContent').innerHTML;
    let win = window.open('', '', 'width=400,height=600');

    win.document.write('<h3>STRUK PEMBELIAN</h3>');
    win.document.write(content);
    win.print();
}