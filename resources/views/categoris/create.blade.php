<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>دسته بندی</title>
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
                <a class="nav-link" href="javascript:void(0)">محصولات </a>
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
      <div class="container">
        <form action="/categoris/create" method="post">
          @csrf
          <h2>افزودن دسته بندی</h2>
          <div class="mb-3 mt-3" >
            <label class="form-label">دسته بندی  :</label>
            <input
              type="text"
              class="form-control"

              name="name"
            />








          <button type="submit" class="btn btn-primary ">ثبت</button>
        </form>
      </div>
</body>
</html>
