@extends('layouts.app')

@section('title', 'địa danh')

@section('TT')
  Duyệt địa danh
@endsection

@section('sidebar')
    @parent
  <div class="card-header pb-0">
    <div class="row align-items-start">
        <div class="col">
        <h6>Danh sách địa danh cần duyệt</h6>
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
                        <p class="text-xs font-weight-bold mb-0">Manager</p>
                    
                      </td>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Đào thị mộng cầm</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Đã duyệt</span>
                      </td>
                   
                      <td class="align-middle text-end">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
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
                        <span class="badge badge-sm bg-gradient-secondary">chưa chuyệt</span>
                      </td>
                  
                      <td class="align-middle text-end" >
                            <a href="" > <button type="button" class="btn btn-success">Duyệt</button></a>
                            <a href="{{route('DiaDanh.ChiTietDiaDanh')}}"><button type="button" class="btn btn-warning">Chi tiết</button></a>
                            <button type="button" class="btn btn-danger">Đéo duyệt</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>




@endsection

@section('Them')

@endsection