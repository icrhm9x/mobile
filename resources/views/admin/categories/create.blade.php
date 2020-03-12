@extends('admin.layouts.master',['title' => 'Thêm mới danh mục'])

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
  </ol>
</nav>
    <form class="bg-white rounded border p-3" method="POST" action="{{ route('category.store') }}">
      @csrf
      <div class="form-group">
        <label for="name" class="font-weight-bold">Tên danh mục</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Tên danh mục">
      </div>
      <div class="form-group">
        <label class="font-weight-bold">Status</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
          <label class="form-check-label" for="status1">
            Hiển thị
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status2" value="0">
          <label class="form-check-label" for="status2">
            Không hiển thị
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-success">Lưu</button>
    </form>
@endsection