@extends('layouts.app')

@section('title', 'địa danh')

@section('TT')
    Danh sách địa danh
@endsection

@section('sidebar')
    @parent
      @if(session('success'))
        <script>
            alter('{{session('success')}}');
        </script>
      @endif
    <div class="card-header pb-0">
    <div class="row align-items-start">
        <div class="col-4">
           <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên địa danh</label>
            <input type="text" class="form-control" id="TenDiaDanhTimKiem" placeholder="Tên địa danh" name="TenDiaDanh">
          </div>
        </div>
     
        <div class="col-2 my-4">
            <button type="button" class="btn btn-success">Tìm kiếm</button>
</div>
    </div>

    <div class="card-header pb-0">
               <div class="row align-items-start">
        <div class="col-6">
        <h6>Danh sách đia danh</h6>
          </div>
          <div class="col-6 align-middle text-end">
            <a href="{{route('DiaDanh.ThemDiaDanh')}}" class="text-end" style="color: blue"> Thêm đia danh</a> 
          </div>
      </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center ">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên địa danh</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người đăng</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lsdiadanh as $value)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                       
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$value->Ten_Ddanh}}</p>
                    
                      </td>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->Diachi_Ddanh}}</span>
                      </td>
                     <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->Hoten_Nguoidung}}</span>
                      </td>
                
                    
                      @if($value->TrangThaiDiaDanh  == 1)
                          <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Đang hoạt động</span>
                      </td>
                      @else
                          <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Ngưng hoạt động</span>
                      </td>
                      @endif
                     
                      <td class="align-middle text-end">
                          <a href="{{route('DiaDanh.SuaDiaDanh', ['id'=>$value->id])}}" > <button type="button" class="btn btn-success">Sửa</button></a>
                          <a href="{{route('DiaDanh.ChiTietDiaDanh', ['id'=>$value->id])}}"><button type="button" class="btn btn-warning">Chi tiết</button></a>
                          <a onclick="return confirm('bạn có chắc muốn xoá {{$value->Ten_Ddanh}} ')" href="{{route('DiaDanh.XoaDiaDanh',  ['id'=>$value->id])}}" class="btn btn-danger">Xoá</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  
                </table>
                    
               
              </div>
           
            </div>
           <div class="container text-center my-5" >
                {{$lsdiadanh->links()}}
            </div>
@endsection

