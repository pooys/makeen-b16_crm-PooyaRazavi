<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>محصولات</title>
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="javascript:void(0)">phone market</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">ورود</a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="creat.php">ثبت نام</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="list.php">محصولات </a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">سفارشات</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">کاربران</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">وبلاگ</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>

  <div class="container mt-3">
    <h2>محصولات</h2>
    <button type="submit" class="btn btn-light">
      <a href="create.html">محصول جدید</a>
    </button>
    <br />
    <br />
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>نام محصول  </th>
          <th> برند</th>
         <th> مدل</th>
          <th>قیمت</th>

        </tr>
      </thead>
      @foreach ($products as $product)
      <tbody>




            <tr>
              <td>{{$product->id}}</td>
              <td {{$product->name_product}}></td>
              <td {{$product->brand}}></td>
              <td {{$product->model}}></td>
              <td {{$product->price}}></td>

              <td>
                    <a href="/products/edit/{{$product->id}}">edit</a>
                    <form action="/products/delete/{{$product->id}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
              </td>
            </tr>



        </td>
        </tr>

      </tbody>
      @endforeach
    </table>

  </div>

    </body>


</body>
</html>
