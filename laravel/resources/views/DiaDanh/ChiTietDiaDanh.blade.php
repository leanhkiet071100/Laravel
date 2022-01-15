@extends('layouts.app')

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
                    <img src="../assets/img/team-3.jpg" height="550" width="1200">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/team-3.jpg" height="550" width="1200">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/team-3.jpg" height="550" width="1200">
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
                <span><b>Tên sản phẩm: </b></span>Long Thành - Dầu Dây
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Tên gọi khác: </b></span>Không có
            </div>
        </div> 
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Địa chỉ: </b></span>Quốc lộ 50, Long Thành - Dầu Dây, tỉnh Đồng Nai
            </div>
        </div> 
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Cảnh vật: </b></span>Không có
            </div>
        </div> 
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Khí hậu: </b></span>Hai mùa (Khô, mưa)
            </div>
        </div>  
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Tài nguyên: </b></span>BÊ ĐÊ dê gái Lê Anh Kiệt
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Kinh độ: </b></span>9.312313
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Vĩ độ: </b></span>105.3213165
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
                <div>
                    <span title="Đi phượ7">Đi phượt,</span>
                    <span title="Cắm trại">Cắm trại,</span>
                    <span title="Nhà nghỉ">Nhà nghỉ,</span>
                    <span title="Khách sạn">Khách sạn</span>
                </div>                       
            </div>
        </div>
        <div style="margin-top:20px">
            <div class="container-fliud text-dark">
                <span><b>Khác: </b></span>
                <div class="action">
                    <button type="button" class="btn btn-outline-danger">Quán ăn</button>
                    <button type="button" class="btn btn-outline-danger">Nơi lưu trú</button>                 
                </div>                     
            </div>
        </div>
    </div>
</div>
<div style="margin-top:20px">
    <div class="align-middle text-end">
        <button type="button" class="btn btn-outline-success ">Sữa</button>
        <button type="button" class="btn btn-outline-danger">Xóa</button>
        <button type="button" class="btn btn-outline-primary">Hủy</button>
    </div>
</div>
@endsection