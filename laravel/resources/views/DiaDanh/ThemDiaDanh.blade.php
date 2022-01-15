@extends('layouts.app')

@section('title', 'Danh sách địa danh')

@section('TT')
   Thêm địa danh
@endsection

@section('sidebar')
    @parent
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên địa danh</label>
                <input type="text" class="form-control" id="TenDiaDanh" placeholder="Tên địa danh">
             </div>
        </div>
    <div class="col-4">
        <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên gọi khác</label>
                <input type="text" class="form-control" id="TenGoiKhac" placeholder="Tên gọi khác">
        </div>
    </div>
   <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
        <input type="email" class="form-control" id="DiaChi" placeholder="Địa chỉ">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Cảnh vật</label>
        <textarea class="form-control" id="CanhVat" rows="3"></textarea>
    </div>
     <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Khí hậu</label>
        <textarea class="form-control" id="KhiHau" rows="3"></textarea>
    </div>
     <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">TaiNguyen</label>
        <textarea class="form-control" id="TaiNguyen" rows="3"></textarea>
    </div>
</div>
<div >
    <label for="exampleFormControlTextarea1" class="form-label">Nhu cầu</label>
    <div class="row">
        <div class="col-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    đi phượt
                </label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Cắm trại
                </label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                   du lịch
                </label>
            </div>
        </div>
        
    </div>
</div>
<div>
       <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kinh độ</label>
                <input type="text" class="form-control" id="KinhDo" placeholder="Kinh Độ">
             </div>
        </div>
    <div class="col-4">
        <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Vĩ độ</label>
                <input type="text" class="form-control" id="ViDo" placeholder="Vĩ dộ">
        </div>
    </div>
</div>
<div class="mb-3">
  <label for="formFile" class="form-label">Hình ảnh</label>
  <input class="form-control" type="file" id="HinhAnh">
</div>
<div class="align-middle text-end">
   <button type="button" class="btn btn-outline-success ">Thêm</button>
   <button type="button" class="btn btn-outline-danger">Hủy</button>
</div>
  
@endsection