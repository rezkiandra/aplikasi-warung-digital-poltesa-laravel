@extends('layouts.authenticated')
@section('title', 'Detail Kategori')
@section('content')
  <div class="card mb-4 col-lg-6">
    <div class="card-body">
      <a href="{{ route('admin.product_category') }}">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      <div class="d-flex justify-content-between flex-wrap my-2 py-3">
        <div class="d-flex align-items-center me-4 mt-3 gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-danger rounded">
              <i class="mdi mdi-laravel mdi-24px"></i>
            </div>
          </div>
          <div>
            <h4 class="mb-0">{{ $category->name }}</h4>
            <span>Nama Kategori</span>
          </div>
        </div>
        <div class="d-flex align-items-center me-4 mt-3 gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-info rounded">
              <i class="mdi mdi-tailwind mdi-24px"></i>
            </div>
          </div>
          <div>
            <h4 class="mb-0">{{ \App\Models\Products::where('category_id', $category->id)->count() }}</h4>
            <span>Jumlah Produk</span>
          </div>
        </div>
      </div>
      <h5 class="pb-3 border-bottom mb-3">Detail Kategori</h5>
      <div class="info-container">
        <ul class="list-unstyled mb-4">
          <li class="mb-3 h5">
            <span>ID:</span>
            <span>#{{ $category->id }}</span>
          </li>
          <li class="mb-3">
            <span class="h6">Dibuat pada:</span>
            <span class="badge bg-label-success rounded">
              {{ date('d M Y, H:i', strtotime($category->created_at)) }}
              {{ $category->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
            </span>
          </li>
          <li class="mb-3">
            <span class="h6">Diupdated pada:</span>
            <span class="badge bg-label-info rounded">
              {{ date('d M Y, H:i', strtotime($category->updated_at)) }}
              {{ $category->updated_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
            </span>
          </li>
        </ul>
        <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
          <x-basic-button :label="'Edit'" :icon="'pencil-outline'" :href="route('admin.edit.category', $category->slug)" :variant="'primary'" />
          <form action="{{ route('admin.destroy.category', $category->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
              <i class="mdi mdi-trash-can-outline text-danger me-2"></i>Delete
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
