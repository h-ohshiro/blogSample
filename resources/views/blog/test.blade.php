@extends('../layouts/app')
@section('title', 'ブログ')
          <tr>
              <td>{{ $blog->id }}</td>
              <td><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></td>
              <td>{{ $blog->updated_at }}</td>
              <td><button type="button" class="btn btn-primary" onclick="location. href='/blog/edit/{{ $blog->id }}'">編集</button></td>
              <form method="post" action="{{ route('delete',$blog->id) }}" onSubmit="return checkDelete()">
            　@csrf
              <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
              </form>
          </tr>
      </table>
  </div>
        <script>
        function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        } else {
            return false;
        }
        }
        </script>
