@extends('layouts.app')

@section('title', 'địa danh')

@section('TT')
 Thêm quán ăn
@endsection

@section('sidebar')
    @parent
    <form action="" method="Post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tên quán ăn</label>
  <input type="text" class="form-control" id="NhuCau" placeholder="Tên quán ăn">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
  <input type="text" class="form-control" id="NhuCau" placeholder="Số điện thoại">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ quán ăn</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="formFileMultiple" class="form-label">Hình</label>
  <input class="form-control" type="file" id="formFileMultiple" multiple>
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Chọn đia danh</label>
<select class="form-select" aria-label="Default select example">
  <option selected>Địa danh</option>
  <option value="1">Đồng Nai</option>
  <option value="2">Quy Nhơn</option>
  <option value="3">Bà rịa - bến tre</option>
</select>
</div>
    <button type="button" class="btn btn-outline-primary my-2">Thêm</button>
</form>

    
        
         
@endsection

