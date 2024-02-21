@extends('layouts.authenticated')

@section('title', 'Detail Category')

@section('content')
  <div class="card mb-4 col-lg-6">
    <div class="card-body">
      <a href="{{ route('admin.product_category') }}">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      <div class="d-flex justify-content-between flex-wrap my-2 py-3">
        <div class="d-flex align-items-center me-4 mt-3 gap-3">
          <div class="avatar">
            @if ($category->name == 'Admin')
              <div class="avatar-initial bg-label-danger rounded">
                <i class="mdi mdi-laptop mdi-24px"></i>
              </div>
            @elseif ($category->name == 'Seller')
              <div class="avatar-initial bg-label-info rounded">
                <i class="mdi mdi-store-outline mdi-24px"></i>
              </div>
            @elseif ($category->name == 'Customer')
              <div class="avatar-initial bg-label-warning rounded">
                <i class="mdi mdi-account-outline mdi-24px"></i>
              </div>
            @elseif ($category->name == 'Super Admin')
              <div class="avatar-initial bg-label-primary rounded">
                <i class="mdi mdi-shield-crown-outline mdi-24px"></i>
              </div>
            @elseif ($category->name == 'Maintainer')
              <div class="avatar-initial bg-label-success rounded">
                <i class="mdi mdi-bug-check-outline mdi-24px"></i>
              </div>
            @elseif ($category->name == 'Developer')
              <div class="avatar-initial bg-label-dark rounded">
                <i class="mdi mdi-code-block-tags mdi-24px"></i>
              </div>
            @else
              <div class="avatar-initial bg-label-secondary rounded">
                <i class="mdi mdi-chart-donut mdi-24px"></i>
              </div>
            @endif
          </div>
          <div>
            <h4 class="mb-0">{{ $category->name }}</h4>
            <span>Category name</span>
          </div>
        </div>
        <div class="d-flex align-items-center me-4 mt-3 gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-warning rounded">
              <i class="mdi mdi-account-group-outline mdi-24px"></i>
            </div>
          </div>
          <div>
            {{-- <h4 class="mb-0">{{ $category_user_count }}</h4> --}}
            <span>Total users</span>
          </div>
        </div>
      </div>
      <h5 class="pb-3 border-bottom mb-3">Category Details</h5>
      <div class="info-container">
        <ul class="list-unstyled mb-4">
          <li class="mb-3 h5">
            <span>ID:</span>
            <span>#{{ $category->id }}</span>
          </li>
          <li class="mb-3">
            <span class="h6">Created At:</span>
            <span
              class="badge bg-label-success rounded-pill">{{ date('d F Y, H:i:s', strtotime($category->created_at)) }}</span>
          </li>
          <li class="mb-3">
            <span class="h6">Updated At:</span>
            <span
              class="badge bg-label-info rounded-pill">{{ date('d F Y, H:i:s', strtotime($category->updated_at)) }}</span>
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
