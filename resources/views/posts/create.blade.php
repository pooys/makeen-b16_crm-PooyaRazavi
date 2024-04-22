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
      <form action="/posts/create" method="post">
        @csrf
        <h2>مقالات</h2>
        <div class="mb-3 mt-3">
          <label class="form-label">مقالات جدید :</label>
          <input
            type="text"
            class="form-control"

            name="name"
          />

        </div>
            <textarea name="brand" id="" cols="30" rows="10"></textarea>
        <div class="mb-3 mt-3">
          <label class="form-label">توضیحات </label>
          <input
            type="text"
            class="form-control"

            name="brand"

          />

        </div>
        <div class="mb-3 mt-3">
            <select name="cat" id="cars">
                <option value="karbar">کاربران</option>
                <option value="mahsol">محصولات</option>
                <option value="sefaresh">سفارشات</option>

              </select>

        </div>






        <button type="submit" class="btn btn-light">ثبت</button>
      </form>
    </div>


</html>
