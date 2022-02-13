@extends('layouts.appSua')

@section('title', 'Đồng Nai')

@section('TT')
   Chi tiết địa danh Đồng Nai
@endsection

@section('sidebar')
    @parent
<div class="container-fliud">
    <div class="text-center">
        <h2>Chi tiết địa danh</h2>
    </div>
    <div class="preview">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/img/team-3.jpg" height="550" width="1200">
                </div>
                <div class="carousel-item">
                    <img src="/assets/img/team-3.jpg" height="550" width="1200">
                </div>
                <div class="carousel-item">
                    <img src="/assets/img/team-3.jpg" height="550" width="1200">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div> 
<div style="margin-top:30px"></div>
<div class="row">
    <div class="col-6">
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Tên Địa danh: </b></span>{{$DiaDanh->Ten_Ddanh}}
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Tên gọi khác: </b></span>
                @if($DiaDanh->Ten_GoiKhac == null)
                    {{'Không có'}}
                @else
                    {{$DiaDanh->Ten_GoiKhac}}
                @endif
              
            </div>
        </div> 
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Địa chỉ: </b></span>{{$DiaDanh->Diachi_Ddanh}}
            </div>
        </div> 
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Cảnh vật: </b></span>{{$DiaDanh->Canhvat}}
            </div>
        </div> 
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Khí hậu: </b></span>{{$DiaDanh->Khihau}}
            </div>
        </div>  
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Tài nguyên: </b></span>{{$DiaDanh->Tainguyen}}
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Kinh độ: </b></span>{{$DiaDanh->Kinhdo}}
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Vĩ độ: </b></span>{{$DiaDanh->Vido}}
            </div>
        </div>
    </div>
    <div class="col-6">
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Đánh giá: </b></span>
                <div class="stars">
                    <span class="fa fa-star checked" style="color:red"></span>
                    <span class="fa fa-star checked" style="color:red"></span>
                    <span class="fa fa-star checked" style="color:red"></span>
                    <span class="fa fa-star checked" style="color:red"></span>
                    <span class="fa fa-star"></span>
                </div>                          
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Nhu cầu: </b></span>
                @foreach($NhuCau as $n)
                    @if($DiaDanh->Id_Nhucau == $n->id)
                        <span>
                            {{$n->Tennhucau}}
                        </span>

                    @endif
                    
                @endforeach
                                   
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Khác: </b></span>
                <div class="action">
                    <a href="{{route('ChiTietDiaDanh.dsQuanAn')}}"><button type="button" class="btn btn-outline-danger">Quán ăn</button></a>
                      <a href="{{route('ChiTietDiaDanh.dsNoiLuuTru')}}"><button type="button" class="btn btn-outline-danger">Nơi Lưu Trú</button></a>
                </div>                     
            </div>
        </div>
    </div>
</div>
<div style="margin-top:20px">
    <div class="align-middle text-end">
        <button type="submit" class="btn btn-outline-success ">Sửa</button>
        <button type="button" class="btn btn-outline-danger">Xóa</button>
        <button type="button" class="btn btn-outline-primary">Hủy</button>
    </div>
</div>
@endsection