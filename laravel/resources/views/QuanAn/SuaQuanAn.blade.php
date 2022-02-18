@extends('layouts.app')


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
    <input type="text" class="form-control" placeholder="Tên quán ăn"  name="tenquanan" value= "{{ old('tenquanan') ?? $quanan->Ten_Quan}}">
       @error('tenquanan')
        <span style="color:red"> {{$message}}</span>
      @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
  <input type="text" class="form-control" placeholder="Số điện thoại"  name="sdt" value="{{ old('sdt') ??$quanan->SDT_Quan}}">
  @error('sdt')
        <span style="color:red"> {{$message}}</span>
      @enderror
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ quán ăn</label>
  <textarea class="form-control" rows="3" name="diachiquanan">{{ old('diachiquanan') ??$quanan->Diachi_Quan}} </textarea>
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
   <option value="{{$value->id}} "@if($quanan->Id_Ddanh==$value->id) selected @endif >   {{$value->Ten_Ddanh}}  </option>
   @endforeach
</select>
</div>
  <div class="align-middle text-end">
   <button type="submit" class="btn btn-outline-success ">Lưu</button>
   <button type="button" class="btn btn-outline-danger">Hủy</button>
</div>
</form>

    
        
         
@endsection

