@extends('layouts.authenticated')
@section('title', 'Bank')
@section('content')
  <h4 class="mb-1">Bank</h4>
  <p class="mb-3">Sebuah bank akan menyediakan berbagai macam pihak untuk melakukan transaksi</p>

  <x-basic-button :label="'Tambah bank'" :icon="'plus'" :class="'w-0 text-uppercase mb-4'" :variant="'primary'" :href="route('admin.create.bank')" />
  <x-bank-table :title="'Data Bank'" :fields="['No', 'Nama Bank', 'Total Penjual', 'Dibuat Pada', 'Aksi']" :datas="$banks" />
@endsection
