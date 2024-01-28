@extends('layouts.dashboard')

@section('dashboard_content')
<div class="container ">
    <div class="row">
      <h1 class="text-center mb-4"> المنتجات</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-3 card">
       <div class="card-header">
        <h3 class="card-title">
        @if(isset($existingValue))
                تحديث المنتج
            @else
              اضافة منتج جديد
            @endif
        </h3>
       </div>
       @if(isset($existingValue))
        <form action="{{ route('update-item', ['x' => $existingValue->id]) }}" class="card-body" method="post">
        <input type="text" hidden class="form-control form-control-sm" name="id" value="{{ isset($existingValue) ? $existingValue->id : '' }}">
        @else
        <form action="{{route('save-item')}}" class="card-body" method ="post">
    @endif
        @csrf
        <div class="form-group">
         <label for="itemName">اسم المنتج</label>
         <input type="text" class="form-control form-control-sm" name="itemName" value="{{ isset($existingValue) ? $existingValue->itemName : '' }}">
        </div>

        <div class="form-group">
         <label for="price"> السعر</label>
         <input type="text" class="form-control form-control-sm" name="price" value="{{ isset($existingValue) ? $existingValue->price : '' }}" >
        </div>

        <div class="form-group">
         <label for="qty"> الكمية</label>
         <input type="text" class="form-control form-control-sm" name="qty" value="{{ isset($existingValue) ? $existingValue->qty : '' }}" >
        </div>

        <div class="form-group">
         <label for="color"> اللون</label>
         <input type="text" class="form-control form-control-sm" name="color" value="{{ isset($existingValue) ? $existingValue->color : '' }}">
        </div>
        <div class="form-group">
             <label for="itemGroupNum">الفئه</label>
             <select class="form-control form-control-sm" name="itemGroupNum">
    @foreach($group as $item)
        <option value="{{ $item->id }}" {{ (isset($existingValue) && $existingValue->itemGroupNum == $item->id) ? 'selected' : '' }}>
            {{ $item->itemGroupName }}
        </option>
    @endforeach
</select>

        </div>
        <button class="btn btn-primary mt-2">
        @if(isset($existingValue))
            تحديث
        @else
            حفظ
        @endif
        </button>
   
       </form>
      </div>
   
      <div class="col-md-6 card">
        <div class="card-header">
            <h3 class="card-title">المنتجات</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
               <thead>
                  <tr>
                      <th>رقم </th>
                      <th>اسم </th>
                      <th>السعر </th>
                     <th>اللون </th>
                     <th>الكميه </th>
                     <th>الفئه </th>
                     <th colspan="2">اجراء</th>

                  </tr>
             </thead>
             <tbody>
                  @foreach($data as $row)
                      <tr>
                          <td>{{ $row->id }}</td>
                          <td>{{ $row->itemName }}</td>
                          <td>{{ $row->price }}</td>
                          <td>{{ $row->color }}</td>
                          <td>{{ $row->qty }}</td>
                         <td>{{ $row->itemGroupNum }}</td>
                         <td><a href="{{ route('edit-item',['x'=>$row->id ])}}"><i class="bi bi-pencil-square text-warning"></i></a></td>
                    <td><a href="{{ route('delete-item',['x'=>$row->id ])}}"><i class="bi bi-trash-fill text-error"></i></a></td>




                     </tr>
                 @endforeach
              </tbody>
         </table>
        </div>
      </div>
    </div> 
</div>
@endsection