@extends('layouts.app')


@section('CSS')
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
@endsection


@section('title', 'địa danh')

@section('TT')
    Sửa quán ăn
@endsection

@section('sidebar')
    @parent
    <form action="{{route('QuanAn.SuaQuanAnPost', ['id'=>$quanan->id])}}" method="Post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tên quán ăn</label>
    <input type="text" class="form-control" placeholder="Tên quán ăn"  name="tenquanan" value= "{{$quanan->Ten_Quan}}">
       @error('tenquanan')
        <span style="color:red"> {{$message}}</span>
      @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
  <input type="text" class="form-control" placeholder="Số điện thoại"  name="sdt" value="{{$quanan->SDT_Quan}}">
  @error('sdt')
        <span style="color:red"> {{$message}}</span>
      @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ quán ăn</label>
  <textarea class="form-control" rows="3" name="diachiquanan">{{$quanan->Diachi_Quan}} </textarea>
      @error('diachiquanan')
        <span style="color:red"> {{$message}}</span>
      @enderror
</div>
<div class="mb-3">
  <label for="formFileMultiple" class="form-label">Hình</label>
  <input class="form-control" type="file" id="formFileMultiple" name="hinh" >
      @error('diadanh')
        <span style="color:red"> {{$message}}</span>
      @enderror
  <img src="{{$quanan->Hinh_Quan}}" alt=""  style="width:100px; max-height: 100px; object-fit:contain">
      @error('hinh')
        <span style="color:red"> {{$message}}</span>
      @enderror
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Chọn địa danh</label>
<select class="form-select" aria-label="Default select example" name="DiaDanh">
   @foreach($lsDiaDanh as $value)
   <option value="{{$value->id}}"> @if($quanan->Id_Ddanh==$value->id)  {{$value->Ten_Ddanh}} @else {{$value->Ten_Ddanh}}  @endif </option>
   @endforeach
</select>
</div>
  <div class="align-middle text-end">
   <button type="submit" class="btn btn-outline-success ">Lưu</button>
   <button type="button" class="btn btn-outline-danger">Hủy</button>
</div>
</form>

    
        
         
@endsection

