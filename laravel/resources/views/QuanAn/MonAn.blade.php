@extends('layouts.app')

@section('title', 'Nhu cầu')

@section('TT')
    Món ăn
@endsection

@section('sidebar')
    @parent
     <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2 text-center">Tên quán ăn</h5>
                <p class="text-white text-center">Địa chỉ quán ăn</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
      </div>
 <div class="card-header pb-0">
              <h6>Danh sách món ăn</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hinh</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên món ăn</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">1</span>
                      </td>
                      <td class="align-middle text-center">
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Bành xèo</span>
                      </td><td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">100.000</span>
                      </td>
                      <td class="align-middle text-end">
                      <button type="button" class="btn btn-success">Sửa</button>
                        <button type="button" class="btn btn-danger">Xóa</button>
                      </td>
                    </tr>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">2</span>
                      </td>
                      <td class="align-middle text-center">
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Bánh bột lọc</span>
                      </td>
                       </td><td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">100.000</span>
                      </td>
                      <td class="align-middle text-end">
                      <button type="button" class="btn btn-success">Sửa</button>
                        <button type="button" class="btn btn-danger">Xóa</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
    <div class="text-center">
       <h4>THÊM MÓN ĂN</h4>
    </div>
<form action="" method="Post">
<div class="mb-3">
<div class="row">
    <div class="col-4">
        <label for="exampleFormControlInput1" class="form-label">Tên món ăn</label>
        <input type="text" class="form-control" id="NhuCau" placeholder="Tên Nơi lưu trú">
  </div>
  <div class="col-4">
  <label for="exampleFormControlTextarea1" class="form-label">Giá món ăn</label>

<div class="input-group mb-3">
<span class="input-group-text">VNĐ</span>
<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
  </div>
</div>


<div class="mb-3">
  <label for="formFile" class="form-label">Hình</label>
  <input class="form-control" type="file" id="formFile">
</div>
</div>

<div  class="align-middle text-end" > 
    <button type="button" class="btn btn-outline-primary my-2">Lưu/ Thêm</button>
</div> 
 
</form>

   
@endsection

