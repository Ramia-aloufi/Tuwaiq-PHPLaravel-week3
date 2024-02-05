@extends('layouts.dashboard')

@section('dashboard_content')
<div class="container ">
  <div class="row ">
    <h1 class="text-center mb-4"> الفئات</h1>
  </div>
  <div class="row gap-4 justify-content-center">
  <div class="col-md-3 card bg-white p-0">
    <div class="card-header">
        <h3 class="card-title">
            @if(isset($existingValue))
                تحديث الفئة
            @else
                اضافة فئة جديدة
            @endif
        </h3>
    </div>
    @if(isset($existingValue))
        <form action="{{ route('update-group', ['x' => $existingValue->id]) }}" class="card-body" method="post">
        <input type="text" hidden class="form-control form-control-sm" name="id" value="{{ isset($existingValue) ? $existingValue->id : '' }}">


    @else
        <form action="{{ route('save-group') }}" class="card-body" method="post">
    @endif

    @csrf

    <label for="itemGroupName">اسم الفئة</label>
    <input type="text" class="form-control form-control-sm" name="itemGroupName" value="{{ isset($existingValue) ? $existingValue->itemGroupName : '' }}">

    <button class=" py-2 px-4 btn mt-2 " style="background:#c6b777;
         color: #fff;">
        @if(isset($existingValue))
            تحديث
        @else
            حفظ
        @endif
    </button>
    </form>
</div>

    @if(isset($data))
    <div class=" col-md-6 card bg-white p-0">
     <div class="card-header">
      <h3 class="card-title">الفئات</h3>
     </div>
     <div class="card-body">
      <table class="table table-bordered">
         <thead>
             <tr>
                <th>رقم الفئه</th>
                <th>اسم الفئه</th>
                <th colspan="2">اجراء</th>
            </tr>
        </thead>
         <tbody>

             @foreach($data as $item)
                 <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->itemGroupName }}</td>
                    <td><a href="{{ route('edit-group',['x'=>$item->id ])}}"><i class="bi bi-pencil-square text-warning"></i></a></td>
                    <td><a href="{{ route('delete-group',['x'=>$item->id ])}}"><i class="bi bi-trash-fill text-error"></i></a></td>
                </tr>
            @endforeach
            @endif
        </tbody>
      </table>
     </div>
    </div>
</div>
</div>
@endsection