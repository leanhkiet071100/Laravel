@extends('layouts.app')

@section('title', 'địa danh')

@section('TT')
 Thêm quán ăn
@endsection

@section('sidebar')
    @parent

  <form action="{{route('QuanAn.ThemQuanAnPost')}}" method="Post"  enctype="multipart/form-data">
      <!-- @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif -->
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Tên quán ăn</label>
      <input type="text" class="form-control" id="NhuCau" placeholder="Tên quán ăn" name="tenquanan" value="{{old('tenquanan')}} ">
     @error('tenquanan')
        <span style="color:red"> {{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label" >Số điện thoại</label>
      <input type="text" class="form-control" id="NhuCau" placeholder="Số điện thoại" name="sdt" value="{{old('sdt')}}">
         @error('sdt')
        <span style="color:red"> {{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label" >Địa chỉ quán ăn</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="diachiquanan" value="">{{old('diachiquanan')}}</textarea>
         @error('diachiquanan')
        <span style="color:red"> {{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label">Hình</label>
      <input class="form-control" type="file" accept="image/*" name="hinh">
         @error('hinh')
        <span style="color:red"> {{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Chọn địa danh</label>
         @error('diadanh')
        <span style="color:red"> {{$message}}</span>
      @enderror
      <select class="form-select" aria-label="Default select example" name="DiaDanh">
        <option selected>Địa danh</option>
        @foreach($lsDiaDanh as $value)
          <option value="{{$value->id}}">{{$value->Ten_Ddanh}}</option>
        @endforeach
      </select>
    </div>
      <div class="align-middle text-end">
   <button type="submit" class="btn btn-outline-success ">Thêm</button>
   <button type="submit" class="btn btn-outline-danger">Hủy</button>
</div>
    @csrf

</form>

    
        
         
@endsection

