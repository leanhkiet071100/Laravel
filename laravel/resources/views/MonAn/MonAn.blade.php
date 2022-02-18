@extends('layouts.app')

@section('title', 'Nhu cầu')

@section('TT')
    Món ăn
@endsection

@section('sidebar')
    @parent

      @if(session('success'))
      <script>
      alert('{{session('success')}}');
    </script>
    @endif

     <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('$quanan->Hinh');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2 text-center">{{$quanan->Ten_Quan}}</h5>
                <p class="text-white text-center">{{$quanan->Diachi_Quan}}</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Read More
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
      </div>
      @if($monan == null)
  <div class="text-center">
       <h4>THÊM MÓN ĂN</h4>
    </div>
<form action="{{route('MonAnPost', ['id'=>$quanan->id])}}"  method="Post"   enctype="multipart/form-data">
   @csrf
<div class="mb-3">
<div class="row">
    <div class="col-4">
        <label for="exampleFormControlInput1" class="form-label">Tên món ăn</label>
        <input type="text" class="form-control" id="NhuCau" placeholder="Tên món ăn" name="TenMon" value="{{old('TenMon')}}">
          @error('TenMon')
        <span style="color:red"> {{$message}}</span>
      @enderror
  </div>
  <div class="col-4">
  <label for="exampleFormControlTextarea1" class="form-label">Giá món ăn</label>
  

<div class="input-group mb-3">
  <span class="input-group-text">VNĐ</span>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="GiaMon" value="{{old('GiaMon')}}">
    </div>
     @error('GiaMon')
        <span style="color:red"> {{$message}}</span>
      @enderror
  </div>
   


  <div class="mb-3">
    <label for="formFile" class="form-label">Hình</label>
    <input class="form-control" type="file" id="formFile" name="Hinh" value="{{old('Hinh')}}">
      @error('Hinh')
        <span style="color:red"> {{$message}}</span>
      @enderror
  </div>
</div>

<div  class="align-middle text-end" > 
    <button type="submit" class="btn btn-outline-primary my-2">Thêm</button>
</div> 
 
</form>
@else
     <div class="text-center">
       <h4>Sửa MÓN ĂN</h4>
    </div>
<form action="{{route('SuaMonAnPatch', ['id'=>$quanan->id, 'idmon' => $monan->id])}}"  method="Post"   enctype="multipart/form-data">
   @csrf
   @method('PATCH')
<div class="mb-3">
<div class="row">
    <div class="col-4">
        <label for="exampleFormControlInput1" class="form-label">Tên món ăn</label>
        <input type="text" class="form-control" id="NhuCau" placeholder="Tên món ăn" name="TenMon" value="{{old('TenMon') ?? $monan->Ten_Mon}}">
          @error('TenMon')
        <span style="color:red"> {{$message}}</span>
      @enderror
  </div>
  <div class="col-4">
  <label for="exampleFormControlTextarea1" class="form-label">Giá món ăn</label>
  

<div class="input-group mb-3">
  <span class="input-group-text">VNĐ</span>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="GiaMon" value="{{old('GiaMon') ?? $monan->Gia_ban}}">
    </div>
     @error('GiaMon')
        <span style="color:red"> {{$message}}</span>
      @enderror
  </div>
   


  <div class="mb-3">
    <label for="formFile" class="form-label">Hình</label>
    <input class="form-control" type="file" id="formFile" name="Hinh" value="{{old('Hinh' ?? $monan->Hinh_Mon)}}">
      @error('Hinh')
        <span style="color:red"> {{$message}}</span>
      @enderror
  </div>
</div>

<div  class="align-middle text-end" > 
    <button type="submit" class="btn btn-outline-primary my-2">Lưu</button>
</div> 
 
</form>
@endif
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
                    @foreach($lsmonan as $key => $value)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$key+1}}</span>
                      </td>
                      <td class="align-middle text-center">
                      <img src="{{$value->Hinh_Mon}}" class="avatar avatar-sm me-3" alt="user1">
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->Ten_Mon}}</span>
                      </td><td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->Gia_ban}}</span>
                      </td>
                      <td class="align-middle text-end">
                        <a href="{{route('SuaMonAn', ['idmon'=>$value->id, 'id'=>$quanan->id])}}">  <button type="button" class="btn btn-success">Sửa</button></a>
                     
                        <a onclick="return confirm('bạn có chắc muốn xoá món ăn này')" href="{{route('XoaMonAn',  ['idmon'=>$value->id, 'id'=>$quanan->id])}}" class="btn btn-danger">Xoá</a>
                      </td>
                    </tr>
                    @endforeach

                 
                  </tbody>
                </table>
              </div>
            </div>
  
   
@endsection

