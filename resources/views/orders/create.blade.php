<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت محصولات</title>
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
                <a class="nav-link" href="javascript:void(0)">ثبت نام</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="http://localhost/projects/crmm/product/list1.php">محصولات </a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">سفارشات</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../users/list.php">کاربران</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">وبلاگ</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>

                   <div class="container">
      <form action="/orders/create" method="post">
        @csrf
        <h2>ثبت سفارش جدید</h2>
        <div class="mb-3 mt-3">
          <label class="form-label">سفارش جدید :</label>
          <input
            type="text"
            class="form-control"

            name="name"
          />
          @if ($errors->has('name'))
          <li style="color: red">{{$errors->first('name')}}</li>

  @endif
        </div>

        <div class="mb-3 mt-3">
          <label class="form-label">برند </label>
          <input
            type="text"
            class="form-control"

            name="brand"

          />
          @if ($errors->has('brand'))
          <li style="color: red">{{$errors->first('brand')}}</li>

  @endif
        </div>

        <div class="mb-3 mt-3">
          <label class="form-label">مدل :</label>
          <input
            type="text"
            class="form-control"

            name="model"
          />
        </div>

        <div class="mb-3">
          <label class="form-label">قیمت :</label>
          <input
            type="text"
            class="form-control"

            name="price"
          />
        </div>



        <button type="submit" class="btn btn-light">ثبت</button>
      </form>
    </div>


</html>
