@extends('layouts.app')

@section('title', 'Nhu cầu')

@section('TT')
   NƠI LƯU TRÚ
@endsection

@section('sidebar')
    @parent
    
    <div class="card-header pb-0">
    <div class="text-dark">
      <h4>Tìm kiếm nơi lưu trú</h4>
    </div>
    <div class="row align-items-start">
        <div class="col-4">
           <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên nơi lưu trú</label>
            <input type="text" class="form-control" id="TenNoiLuuTruTimKiem" placeholder="Tên nơi lưu trú">
          </div>
        </div>
        <div class="col-3">
            <label for="exampleFormControlInput1" class="form-label">Địa danh</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>All</option>
              <option value="1">Tây bắc</option>
              <option value="2">Dak lak</option>
              <option value="3">Amata</option>
            </select>
        </div>
       
        <div class="col-2 my-4">
            <button type="button" class="btn btn-success">Tìm kiếm</button>
    </div>
    <div class="text-dark">
      <h4>Danh sách nơi lưu trú</h4>
    </div>
    </div>
    <div class="card-header pb-0">
              <h6>Danh sách nơi lưu trú</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa danh</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">1</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Đi phượt</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Số 12 đường N14 Trung Hòa Trảng Bom</span>
                      </td> <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Bến tre</span>
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
                        <span class="text-secondary text-xs font-weight-bold">Cắm trại</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Số 12 đường N14 Trung Hòa Trảng Bom</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Quy nhơn</span>
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

<div class="text-dark">
  <h4>Thêm nơi lưu trú</h4>
</div>
<form action="" method="Post">
  <div class="row">
    <div class="col-4">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Tên nơi lưu trú</label>
          <input type="text" class="form-control" id="NhuCau" placeholder="Tên Nơi lưu trú">
        </div>
    </div>
  </div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ nơi lưu trú</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<label for="exampleFormControlInput1" class="form-label">Chọn đia danh</label>
<div class="row">
  <div class="col-4">
<select class="form-select" aria-label="Default select example">
  <option selected>Địa danh</option>
  <option value="1">Đồng Nai</option>
  <option value="2">Quy Nhơn</option>
  <option value="3">Bà rịa - bến tre</option>
</select>
  </div>
</div>

<div class="align-middle text-end">
 <button type="button" class="btn btn-outline-primary my-2">Lưu/ Thêm</button>
</div>
    

</form>
 
@endsection

