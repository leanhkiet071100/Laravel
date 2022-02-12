@extends('layouts.app')

@section('title', 'địa danh')

@section('TT')
    Quán ăn
@endsection

@section('sidebar')
    @parent

    <div class="card-header pb-0">
    <div class="row align-items-start">
        <div class="col-4">
           <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên quán ăn</label>
            <input type="text" class="form-control" id="TenDiaDanhTimKiem" placeholder="Tên quán ăn">
          </div>
        </div>
        <div class="col-3">
            <label for="exampleFormControlInput1" class="form-label">Miền</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>All</option>
              <option value="1">Bắc</option>
              <option value="2">Trung</option>
              <option value="3">Nam</option>
            </select>
        </div>
        <div class="col-3">
             <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên địa danh</label>
            <input type="text" class="form-control" id="TenDiaDanhTimKiem" placeholder="Tên địa danh">
          </div>
        </div>
        <div class="col-2 my-4">
            <button type="button" class="btn btn-success">Tìm kiếm</button>
</div>
    </div>

    <div class="card-header pb-0">
               <div class="row align-items-start">
        <div class="col-6">
        <h6>Danh sách quán ăn</h6>
          </div>
          <div class="col-6 align-middle text-end">
            <a href="{{route('QuanAn.ThemQuanAn')}}" class="text-end" style="color: blue"> Thêm quán ăn</a> 
          </div>
      </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center ">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên quán ăn</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ quán</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số điện thoại quán</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa danh</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lsquanan as $value)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{$value->Hinh_Quan}}" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                       
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$value->Ten_Quan}}</p>
                    
                      </td>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->Diachi_Quan}}</span>
                      </td>
                     <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->SDT_Quan}}</span>
                      </td>
                      <td class="align-middle text-center">
                        @foreach($lsDiaDanh as $valueDD)
                        <span class="text-secondary text-xs font-weight-bold">@if($value->Id_Ddanh==$valueDD->id) {{$valueDD->Ten_Ddanh}}   @endif</span>
                        @endforeach
                      </td>
                    
                      @if($value->TrangThaiQuanAn  == 1)
                          <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Đang hoạt động</span>
                      </td>
                      @else
                          <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Ngưng hoạt động</span>
                      </td>
                      @endif
                     
                      <td class="align-middle text-end">
                          <a href="{{route('QuanAn.SuaQuanAn', ['id'=>$value->id])}}" > <button type="button" class="btn btn-success">Sửa</button></a>
                          <a href="{{route('QuanAn.MonAn')}}"><button type="button" class="btn btn-warning">Món ăn</button></a>
                          <a onclick="return confirm('bạn có chắc muốn xoá quán {{$value->Ten_Quan}} ')" href="{{route('QuanAn.XoaQuanAn',  ['id'=>$value->id])}}" class="btn btn-danger">Xoá</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  
                </table>
                    
               
              </div>
           
            </div>
           <div class="container text-center my-5" >
                      {{$lsquanan->links()}}
            </div>
@endsection

