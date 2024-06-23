@extends('layouts.authenticated')
@section('title', 'Detail User')
@section('content')
  <x-detail-breadcrumbs :id="'User ID #' . $user_id" :created="date('d F, H:i', strtotime($user->created_at)) > '12.00'
      ? date('d F, H:i:s', strtotime($user->created_at)) . ' PM'
      : date('d F, H:i:s', strtotime($user->created_at)) . ' AM'" />
  <div class="row">
    <div class="col-lg-4 col-md-12">
      <div class="card mb-4">
        <x-detail-user :id="$id . $user_id" :image="$image" :username="$username" :email="$email" :role="$role"
          :type="$type" :href="$href" :variant="$variant" :icon="$icon" :label="$label" :class="$class" />
      </div>
    </div>
  </div>
@endsection
