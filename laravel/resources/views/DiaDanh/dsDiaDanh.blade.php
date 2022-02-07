@extends('layouts.app')

@section('title', 'địa danh')

@section('TT')
    Danh sách địa danh
@endsection

@section('sidebar')
    @parent

    <div class="card-header pb-0">
    <div class="row align-items-start">
        <div class="col-3">
           <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên địa danh</label>
            <input type="text" class="form-control" id="TenDiaDanhTimKiem" placeholder="Tên địa danh">
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
        <div class="col-4">
             <label for="exampleFormControlInput1" class="form-label">Nhu cầu</label>
          <div class="row"> 
            <div class="col-6"><div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Đi phượt
              </label>
           </div>
          </div>
            <div class="col-6"> 
              <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
              <label class="form-check-label" for="flexCheckChecked">
                Cắm trại
              </label>
            </div>
          </div>
        </div>
      
    </div>
      <div class="col-2 my-3">
          <button type="button" class="btn btn-success">Tìm kiếm</button>
      </div>
       
   </div>
</div>
    <div class="card-header pb-0">
      <div class="row align-items-start">
        <div class="col-6">
        <h6>Danh sách địa danh</h6>
          </div>
          <div class="col-6 align-middle text-end">
            <a href="{{route('DiaDanh.ThemDiaDanh')}}" class="text-end">Thêm địa danh</a>
          </div>
   </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên địa danh</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người đăng</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lượt xem</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="#" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                       
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$list->}}</p>
                    
                      </td>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Đào thị mộng cầm</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Đang hoạt động</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">100</span>
                      </td>
                      <td class="align-middle text-end">
                               <a href="{{route('DiaDanh.SuaDiaDanh')}}" > <button type="button" class="btn btn-success">Sửa</button></a>
                          <a href="{{route('DiaDanh.ChiTietDiaDanh')}}"><button type="button" class="btn btn-warning">chi tiết</button></a>
                          <button type="button" class="btn btn-danger">Xóa</button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3" alt="user2">
                          </div>
                          
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Programator</p>
                  
                      </td>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Lưu Thành Công</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Đã xóa</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">1</span>
                      </td>
                      <td class="align-middle text-end" >
                          <a href="{{route('DiaDanh.SuaDiaDanh')}}" > <button type="button" class="btn btn-success">Sửa</button></a>
                          <a href="{{route('DiaDanh.ChiTietDiaDanh')}}"><button type="button" class="btn btn-warning">chi tiết</button></a>
                          <button type="button" class="btn btn-danger">Xóa</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
@endsection

@section('Them')

@endsection