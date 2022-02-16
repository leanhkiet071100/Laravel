@extends('layouts.appSua')

@section('title', 'Nhu cầu')

@section('TT')
   NƠI LƯU TRÚ
@endsection

@section('sidebar')
    @parent
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('NoiLuuTru.TimNoiLuuTru')}}" method="GET">
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
       
        <div class="col-3">
            <label for="exampleFormControlInput1" class="form-label">Địa danh</label>
            <select class="form-select" aria-label="Default select example" name="DiaDanh">
              <option value="0" selected>All</option>
              @foreach($lsdiadanh as $key =>$value)
              <option value="{{$value->id}}">{{$value->Ten_Ddanh}}</option>
            
              @endforeach
            </select>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa danh</th>
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
                      </td> <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                          @foreach($lsdiadanh as $valueDD)
                            @if($value->Id_Ddanh == $valueDD->id)
                              {{$valueDD->Ten_Ddanh}} 
                              @endif
                          @endforeach
                        </span>
                      </td>
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


<div class="text-dark">
  <h4>Thêm nơi lưu trú</h4>
</div>


@if($lsnoiluutru1 == null)
<form action="{{route('NoiLuuTru.ThemNoiLuuTruPost')}}" method="Post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên nơi lưu trú</label>
            <input type="text" class="form-control" placeholder="Tên Nơi lưu trú" name="TenNoiLuuTru" value="{{old('TenNoiLuuTru')}}">
            @error('TenNoiLuuTru')
              <span style="color:red"> {{$message}}</span>
            @enderror
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" placeholder="Số điện thoại" name="SDTNoiLuuTru" value="{{old('SDTNoiLuuTru')}}">
            @error('SDTNoiLuuTru')
              <span style="color:red"> {{$message}}</span>
            @enderror
          </div>
      </div>
    </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ nơi lưu trú</label>
    <textarea class="form-control" rows="3" name="DiaChiNoiLuuTru">{{old('DiaChiNoiLuuTru')}}</textarea>
      @error('DiaChiNoiLuuTru')
        <span style="color:red"> {{$message}}</span>
      @enderror
  </div>
  <label for="exampleFormControlInput1" class="form-label">Chọn đia danh</label>
  <div class="row">
    <div class="col-4">
  <select class="form-select" aria-label="Default select example" name="DiaDanh">
    <option selected>Địa danh</option>
    @foreach($lsdiadanh as $key =>$value)
      <option value="{{$value->id}}">{{$value->Ten_Ddanh}}</option>
    @endforeach
  </select>
  </div>
  </div>
  <div class="mb-3">
      <label for="formFileMultiple" class="form-label">Hình</label>
      <input class="form-control" type="file" accept="image/*" name="Hinh">
      @error('Hinh')
        <span style="color:red"> {{$message}}</span>
      @enderror
    </div>
  <div class="align-middle text-end">
    <button type="submit" class="btn btn-outline-primary my-2">Thêm</button>
  </div>
</form>
@else
<form action="{{route('NoiLuuTru.SuaNoiLuuTruPatch', ['id'=> $lsnoiluutru1->id])}}" method="Post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
      <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên nơi lưu trú</label>
            <input type="text" class="form-control" placeholder="Tên Nơi lưu trú" name="TenNoiLuuTru" value="{{old('TenNoiLuuTru') ?? $lsnoiluutru1->Ten_Noiluutru}}">
            @error('TenNoiLuuTru')
              <span style="color:red"> {{$message}}</span>
            @enderror
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" placeholder="Số điện thoại" name="SDTNoiLuuTru" value="{{old('SDTNoiLuuTru') ?? $lsnoiluutru1->SDT_Noiluutru}}">
            @error('SDTNoiLuuTru')
              <span style="color:red"> {{$message}}</span>
            @enderror
          </div>
      </div>
    </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ nơi lưu trú</label>
    <textarea class="form-control" rows="3" name="DiaChiNoiLuuTru">{{old('DiaChiNoiLuuTru') ?? $lsnoiluutru1->Diachi_Noiluutru}}</textarea>
      @error('DiaChiNoiLuuTru')
        <span style="color:red"> {{$message}}</span>
      @enderror
  </div>
  <label for="exampleFormControlInput1" class="form-label">Chọn đia danh</label>
  <div class="row">
    <div class="col-4">
  <select class="form-select" aria-label="Default select example" name="DiaDanh">
    @foreach($lsdiadanh as $value)
      <option value="{{$value->id}}" @if($lsnoiluutru1->Id_Ddanh == $value->id) selected @endif>
        {{$value->Ten_Ddanh}}
      </option>
    @endforeach
  </select>
  </div>
  </div>
  <div class="mb-3">
      <label for="formFileMultiple" class="form-label">Hình</label>
      <input class="form-control" type="file" accept="image/*" name="Hinh" value="$lsnoiluutru1->Hinh_Noiluutru">
      @error('Hinh')
        <span style="color:red"> {{$message}}</span>
      @enderror
    </div>
  <div class="align-middle text-end">
    <button type="submit" class="btn btn-outline-primary my-2">Lưu</button>
  </div>
</form>
@endif
@endsection

