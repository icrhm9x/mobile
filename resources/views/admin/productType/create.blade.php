@extends('admin.layouts.master',['title' => 'Thêm mới loại danh mục'])

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{ route('productType.index') }}">Loại danh mục</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thêm mới loại danh mục</li>
  </ol>
</nav>
    <form class="bg-white rounded border p-3" method="POST" action="{{ route('productType.store') }}">
      @csrf
      <div class="form-group">
        <label for="name" class="font-weight-bold">Loại danh mục</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Tên loại danh mục">
        {{ notifyError($errors, 'name') }}
      </div>
      <div class="form-group">
        <label for="idCategory" class="font-weight-bold">Danh mục</label>
        <select class="form-control" id="idCategory" name="idCategory">
          @foreach ($category as $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>
          @endforeach
        </select>
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