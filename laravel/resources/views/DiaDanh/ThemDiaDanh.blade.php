    @extends('layouts.app')

    @section('title', 'Danh sách địa danh')

    @section('TT')
    Thêm địa danh
    @endsection

    @section('sidebar')
        @parent
<form action="{{route('DiaDanh.ThemDiaDanhPost')}}" method="Post"  enctype="multipart/form-data">
    @csrf

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên địa danh</label>
                    <input type="text" class="form-control" placeholder="Tên địa danh" name="TenDiaDanh" value="{{old('TenDiaDanh')}}">
                    @error('TenDiaDanh')
                        <span style="color:red"> {{$message}}</span>
                    @enderror
                </div>
            </div>
        <div class="col-4">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên gọi khác</label>
                    <input type="text" class="form-control"  placeholder="Tên gọi khác" name="TenGoiKhac" value="{{old('TenGoiKhac')}}">
                    @error('TenGoiKhac')
                        <span style="color:red"> {{$message}}</span>
                    @enderror
            </div>
        </div>
        <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Lựa chọn miền</label>
        <select class="form-select" aria-label="Default select example" name="Mien">
                @foreach($Mien as $value)
                <option value="{{$value->id}}">{{$value->Ten_Mien}}</option>
                @endforeach
        </div>
       
      </select>
    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control"  placeholder="Địa chỉ" name="DiaChi" value="{{old('DiaChi')}}">
            @error('DiaChi')
                <span style="color:red"> {{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Cảnh vật</label>
            <textarea class="form-control"  rows="3" name="CanhVat">{{old('CanhVat')}}</textarea>
            @error('CanhVat')
                        <span style="color:red"> {{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            
            <label for="exampleFormControlTextarea1" class="form-label">Khí hậu</label>
            <textarea class="form-control" id="KhiHau" rows="3" name="KhiHau">{{old('KhiHau')}}</textarea>
                @error('KhiHau')
                        <span style="color:red"> {{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tài nguyên</label>
            <textarea class="form-control" id="TaiNguyen" rows="3" name="TaiNguyen" value="">{{old('TaiNguyen')}}</textarea>
            @error('TaiNguyen')
                <span style="color:red"> {{$message}}</span>
            @enderror
        </div>
    </div>
    <div >
        <label for="exampleFormControlTextarea1" class="form-label">Nhu cầu</label>
        <div class="row">
            @foreach($NhuCau as $Key => $value)
                <div class="col-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="NhuCau"  value="{{$value->id}}">
                    <label class="form-check-label" for="{{$value->id}}">
                        {{$value->Tennhucau}}
                    </label>
                </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kinh độ</label>
                    <input type="text" class="form-control" placeholder="Kinh Độ" name="KinhDo" value="{{old('KinhDo')}}">
                    @error('KinhDo')
                        <span style="color:red"> {{$message}}</span>
                    @enderror
                </div>
            </div>
        <div class="col-4">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Vĩ độ</label>
                    <input type="text" class="form-control" placeholder="Vĩ dộ" name="ViDo" value="{{old('ViDo')}}">
                    @error('ViDo')
                        <span style="color:red"> {{$message}}</span>
                    @enderror
            </div>
        </div>
    </div>
    <div class="mb-3">
    <label for="formFile" class="form-label">Hình ảnh</label>
    <!-- <input class="form-control" type="file" id="HinhAnh" name="Hinh" value="{{old('Hinh')}}">
        @error('Hinh')
            <span style="color:red"> {{$message}}</span>
        @enderror
    </div> -->
    <div class="align-middle text-end">
    <button type="submit" class="btn btn-outline-success ">Thêm</button>
    <button type="button" class="btn btn-outline-danger">Hủy</button>
    </div>
</form>
</div>

    @endsection