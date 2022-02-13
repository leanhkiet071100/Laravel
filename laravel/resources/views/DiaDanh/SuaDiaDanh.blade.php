    @extends('layouts.appSua')

    @section('title', 'Danh sách địa danh')

    @section('TT')
    Sửa địa danh
    @endsection

    @section('sidebar')
    @parent

<form action="{{route('DiaDanh.SuaDiaDanhpatch', ['id'=>$DiaDanh->id])}}" method="Post"  enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên địa danh</label>
                    <input type="text" class="form-control" placeholder="Tên địa danh" name="TenDiaDanh" value="{{old('TenDiaDanh')  ?? $DiaDanh->Ten_Ddanh}}">
                    @error('TenDiaDanh')
                        <span style="color:red"> {{$message}}</span>
                    @enderror
                </div>
            </div>
        <div class="col-4">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên gọi khác</label>
                    <input type="text" class="form-control"  placeholder="Tên gọi khác" name="TenGoiKhac" value="{{old('TenGoiKhac') ?? $DiaDanh->Ten_Goikhac}}">
                    @error('TenGoiKhac')
                        <span style="color:red"> {{$message}}</span>
                    @enderror
            </div>
        </div>
        <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Lựa chọn miền</label>
        <select class="form-select" aria-label="Default select example" name="Mien">
                @foreach($Mien as $value)
                <option value="{{$value->id}}" @if ( $value->id == $DiaDanh->Id_Mien) selected @endif>
                      {{$value->Ten_Mien}}
                </option>
                @endforeach
        </div>
      </select>
    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control"  placeholder="Địa chỉ" name="DiaChi" value="{{old('DiaChi') ?? $DiaDanh->Diachi_Ddanh}}">
            @error('DiaChi')
                <span style="color:red"> {{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Cảnh vật</label>
            <textarea class="form-control"  rows="3" name="CanhVat">{{old('CanhVat') ?? $DiaDanh->Canhvat}}</textarea>
            @error('CanhVat')
                        <span style="color:red"> {{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            
            <label for="exampleFormControlTextarea1" class="form-label">Khí hậu</label>
            <textarea class="form-control" id="KhiHau" rows="3" name="KhiHau">{{old('KhiHau') ?? $DiaDanh->Khihau}}</textarea>
                @error('KhiHau')
                        <span style="color:red"> {{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tài nguyên</label>
            <textarea class="form-control" id="TaiNguyen" rows="3" name="TaiNguyen" value="">{{old('TaiNguyen') ?? $DiaDanh->Tainguyen}}</textarea>
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
                        @if($value->id == $DiaDanh->Id_Nhucau)
                        <input class="form-check-input" type="radio" name="NhuCau"  value="{{$value->id}}" id="nhucau" checked >
                        @else
                        <input class="form-check-input" type="radio" name="NhuCau"  value="{{$value->id}}" id="nhucau" >
                        @endif
                        <label class="form-check-label" for="" >
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
                    <input type="text" class="form-control" placeholder="Kinh Độ" name="KinhDo" value="{{old('KinhDo') ?? $DiaDanh->Kinhdo}}">
                    @error('KinhDo')
                        <span style="color:red"> {{$message}}</span>
                    @enderror
                </div>
            </div>
        <div class="col-4">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Vĩ độ</label>
                    <input type="text" class="form-control" placeholder="Vĩ dộ" name="ViDo" value="{{old('ViDo') ??  $DiaDanh->Vido}}">
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
    <button type="submit" class="btn btn-outline-success ">Lưu</button>
    <button type="button" class="btn btn-outline-danger">Hủy</button>
    </div>
</form>
</div>

    @endsection