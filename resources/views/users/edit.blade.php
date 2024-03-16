<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <a class="nav-link" href="list.php">کاربران</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">وبلاگ</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>

                    <div class="container">
                        <form action="/users/edit/{{ $user->id }}" method="post">
                            @csrf
                          <h2>ویرایش کاربر </h2>

                          <div class="mb-3 mt-3">
                            <label class="form-label">نام و نام خانوادگی:</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="نام و نام خانوادگی را وارد نمایید"
                              name="name"
                              value="{{ $user->name }}"
                            />
                          </div>

                          <div class="mb-3 mt-3">
                            <label class="form-label">کد ملی</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="کد ملی را وارد نمایید"
                              name="codemeli"
                              value="{{ $user->codemeli }}"

                            />
                          </div>

                          <div class="mb-3 mt-3">
                            <label class="form-label">شماره همراه:</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="شماره همراه را وارد نمایید"
                              name="mobile"
                              value="{{ $user->mobile }}"

                            />
                          </div>

                          <div class="mb-3">
                            <label class="form-label">تاریخ تولد:</label>
                            <input
                              type="date"
                              class="form-control"
                              placeholder="تاریخ تولد را وارد نمایید"
                              name="tarikht_tavalod"
                              value="{{ $user->tarikht_tavalod }}"

                            />
                          </div>

                          <div class="mb-3">
                            <label class="form-label">جنسیت:</label>
                            <select class="form-control" name="sex">
                              <option value="mard" {{ ($user->sex =="mard") ? "selected" : ""}}>مرد</option>
                              <option value="zan" {{ ($user->sex =="zan") ? "selected" : ""}}>زن</option>

                            </select>


                          <div class="mb-3">
                            <label class="form-label">رمز عبور:</label>
                            <input
                              type="password"
                              class="form-control"
                              placeholder="رمز عبور را وارد نمایید"
                              name="password"
                              value="{{ $user->password }}"


                            />
                          </div>

                          <button type="submit" class="btn btn-light">ثبت</button>
                        </form>
                      </div>
</body>
</html>
