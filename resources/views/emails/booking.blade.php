@component('mail::message')
# Pesanan dibuat
 
Halo {{$detail->nama}}, terimakasih untuk reservasinya<br>
Berikut adalah detail mengenai reservasi anda<br>
- No Pesanan : {{$kode}}
- Nama Pemesan : {{$detail->nama}}
- Nama Gedung : {{$product->nama}}
- Tanggal Reservasi : @dateonly($detail->created_at)

- No HP : {{$detail->no_hp}}
- Total : @currency($detail->total)

- Status : Belum di bayar
 
@component('mail::button', ['url' => $url])
Lihat Pesanan
@endcomponent
 
Thanks,<br>
Admin
@endcomponent