@extends('layouts.app')

@section('title', 'Nhu cầu')

@section('TT')
    Danh sách Nhu cầu
@endsection

@section('sidebar')
    @parent
<form action="" method="Post">
  <div class="row col-4">
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tên nhu cầu</label>
  <input type="text" class="form-control" id="NhuCau" placeholder="Tên nhu cầu">
</div>
</div>

  <button type="button" class="btn btn-outline-primary my-2">Lưu/ Thêm</button>

    
</form>

    <div class="card-header pb-0">
              <h6>Danh sách nhu cầu</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên nhu cầu</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lsnhucau as $key => $value)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$key+1}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$value->Tennhucau}}</span>
                      </td>
                      <td class="align-middle text-end">
                      <button type="button" class="btn btn-success">Sửa</button>
                        <button type="button" class="btn btn-danger">Xóa</button>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
@endsection

