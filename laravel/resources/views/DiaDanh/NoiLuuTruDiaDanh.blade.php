@extends('layouts.appSua')

@section('title', 'Nhu cầu')

@section('TT')
   NƠI LƯU TRÚ
@endsection

@section('sidebar')
    @parent
       <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('$quanan->Hinh');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2 text-center">{{$DiaDanh->Ten_Ddanh}}</h5>
                <p class="text-white text-center"></p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
      </div>



    <form action="{{route('DiaDanh.TimNoiLuuTru', ['id'=>$DiaDanh->id])}}" method="GET">
    <div class="card-header pb-0">
    <div class="text-dark">
      <h4>Tìm kiếm nơi lưu trú</h4>
    </div>
    <div class="row align-items-start">
        <div class="col-4">
           <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên nơi lưu trú</label>
            <input type="text" class="form-control" id="TenNoiLuuTruTimKiem" placeholder="Tên nơi lưu trú" name="NoiLuuTru">
          </div>
        </div>
       
       
       
        <div class="col-2 my-4">
            <button type="submit" class="btn btn-success">Tìm kiếm</button>
    </div>
    </form>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trang thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lsnoiluutru as $key => $value)
                   <tr>
                        <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{$value->Hinh_Noiluutru}}" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                       
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->Ten_Noiluutru}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->Diachi_Noiluutru}}</span>
                  
                         @if($value->TrangThaiNoiLuuTru  == 1)
                          <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Đang hoạt động</span>
                      </td>
                      @else
                          <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Ngưng hoạt động</span>
                      </td>
                      @endif
                      <td class="align-middle text-end">
                    <a href="{{route('NoiLuuTru.SuaNoiLuuTru', ['id'=>$value->id])}}" > <button type="button" class="btn btn-success">Sửa</button></a>
                      <a onclick="return confirm('bạn có chắc muốn Xoá {{$value->Ten_Noiluutru}} ')" href="{{route('NoiLuuTru.XoaNoiLuuTru',  ['id'=>$value->id])}}" class="btn btn-danger">Xoá</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                
              </div>
            </div>
            <div class="container text-center my-5" >
                {{$lsnoiluutru->links()}}
            </div>






@endsection

