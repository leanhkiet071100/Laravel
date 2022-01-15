@extends('layouts.app')

@section('title', 'địa danh')

@section('TT')
    Quán ăn
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
              <h6>Danh sách quán ăn</h6>
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
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                       
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">Quán haha</p>
                    
                      </td>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Đào thị mộng cầm</span>
                      </td>
                   
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Số 12 đường N12 Trung hòa</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Đồng Nai</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Đang hoạt động</span>
                      </td>
                      <td class="align-middle text-end">
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                      <a href="{{route('QuanAn.SuaQuanAn')}}" > <button type="button" class="btn btn-success">Sửa</button></a>
                          <button type="button" class="btn btn-danger">Xóa</button>
                          <a href="{{route('QuanAn.MonAn')}}" > <button type="button" class="btn btn-warning">Món ăn</button></a>
                         
                      </div>
                      </div>
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
                        <p class="text-xs font-weight-bold mb-0">Quán hihi</p>
                  
                      </td>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Lưu Thành Công</span>
                      </td>
                   
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Số 12 đường N12 Trung hòa</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Đồng Nai</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Đã đóng cửa</span>
                      </td>
                      <td class="align-middle text-end" >
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                      <a href="{{route('QuanAn.SuaQuanAn')}}" > <button type="button" class="btn btn-success">Sửa</button></a>
                          <button type="button" class="btn btn-danger">Xóa</button>
                          <a href="{{route('QuanAn.MonAn')}}" > <button type="button" class="btn btn-warning">Món ăn</button></a>
                      </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
@endsection

