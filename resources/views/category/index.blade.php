@extends('layouts.app')
@section('content')

<div class="card">
 <div class="card-header">すべてのカテゴリー</div>
 <div class="card-body">
  @if(count($categories) >0)
   <table class="table table-bordered">
    <thead>
     <tr>
      <th>カテゴリー名</th>
      <th><a href="{{ route('category.create')}}" class="btn btn-success"><i class="fas fa-plus"></i>　追加</a></th>
     </tr>
    </thead>
    <tbody>
     @foreach($categories as $category)
      <tr>
          <td>{{ $category->name}}</td>
          <td><a href="{{ route('category.edit',['id'=>$category->id])}}" class="btn btn-info">編集</a></td>
          <td>
            <form action="{{ route('category.destroy',['id'=>$category->id])}}" method="post">
             @csrf
             @method('DELETE')
             <button class="btn btn-danger">削除</i></button>
            </form>
          </td>
      </tr>
     @endforeach
    </tbody>
   </table>
   <div class="form-group text-center">
    <a href="{{route('groups.create')}}" class="btn btn-primary">グループ作成に戻る</a>
   </div>
 @else
  <p class="text-center">カテゴリーはありません</p>
 @endif
 </div>
</div>
@endsection
