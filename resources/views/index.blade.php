<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="container">
    <div class="card">
      <p class="card-title">Todo List</p>
      <div class="todo">
        <form action="/todo/create" method="post" class="todo-form">
          @csrf
        <input type="text" class="input-create" name="content" value="" />
          <input class="button-add" type="submit" value="追加" />
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($items as $item)
          <tr>
            <td>
              {{$item->created_at}}
            </td>
            <form action="/todo/update" method="post">
              @csrf
              <td>
                <input type="text" class="input-update" name="content" value="{{$item->content}}" />
                <input type="hidden" name="id" value="{{$item->id}}" />
              </td>
              <td>
                <button type="submit" class="button-update">更新</button>
              </td>
            </form>
            <td>
            <form action="/todo/delete" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}" />
                <button type="submit" class="button-delete">削除</button>
            </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
  
</body>
</html>