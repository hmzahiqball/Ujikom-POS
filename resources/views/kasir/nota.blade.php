<!DOCTYPE html>
<html>
<head>
    <title>Nota Pembelian</title>
    <style>
        body { font-family: monospace; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 4px; text-align: left; border-bottom: 1px dashed #000; }
    </style>
</head>
<body onload="window.print()">

<h3 style="text-align: center;">Nota Pembelian</h3>
<p>Tanggal: {{ $data['tanggal'] }}</p>
<p>No. Transaksi: {{ $data['kode_penjualan'] }}</p>
<p>Status: Success</p>
<p>Kasir: {{ $data['nama_karyawan'] }}</p>
<p>Member: {{ $data['nama_customer'] ?? 'Non-Member' }}</p>

<h4>Detail Produk</h4>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Diskon</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['detail_produk'] as $produk)
            <tr>
                <td>{{ $produk['nama_produk'] }}</td>
                <td>{{ $produk['kuantitas'] }}</td>
                <td>Rp. {{ number_format($produk['harga'], 0, ',', '.') }}</td>
                <td>{{ $produk['diskon'] ?? 0 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p>Total + Pajak: Rp. {{ number_format($data['total'], 0, ',', '.') }}</p>
<p>Bayar: Rp. {{ number_format($data['bayar'], 0, ',', '.') }}</p>
<p>Kembalian: Rp. {{ number_format($data['kembalian'], 0, ',', '.') }}</p>

<p style="text-align: center;">Terima kasih atas kunjungannya!</p>

</body>
</html>
