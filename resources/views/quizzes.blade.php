<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- fontaswesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@200..1000&display=swap"
      rel="stylesheet"
    />
    <!-- main css file -->
    <link rel="stylesheet" href=" ../src/style/main.min.css" />
    <title>school system</title>
  </head>
  <body dir="rtl" class="main">
    <header class="header container">
      <div class="header--links">
        <div class="links-shower"><i class="fa-solid fa-bars"></i></div>
        <div class="links-holder">
          <span><i class="fa-solid fa-xmark"></i></span>
          <a href=" ../index.html" class="link">الصفحة الرئيسية</a>
          <a href="students.html" class="link">الطلبة</a>
          <a href="grades.html" class="link">الدرجات</a>
          <a href="quizes.html" class="link active">الامتحانات</a>
        </div>
      </div>
      <div class="header--content">
        <a href=" ../profile.html" class="user"
          ><img src=" ../src/assets/images/user.jpg" class="logo"
        /></a>
        <a href="  register.html" class="sign-out">تسجيل خروج</a>
      </div>
    </header>
    <main class="quizes">
      <article class="filter-section">
        <div class="article-title">
          <h1 class="title">الامتحانات</h1>
        </div>
        <div class="filters-holder container">
          <div class="search-container">
            <form class="">
              <input id="search-box" type="text" class="search-box" name="q" />
              <label for="search-box">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
              </label>
            </form>
          </div>
        </div>
      </article>
      <article class="container">
        <div class="quizes--links">
          <a href="quizes.html" class="link active">الاختبارات السابقة</a>
          <a href="{{route('create-quiz')}}" class="link">انشاء اختبار جديد</a>
        </div>
        <div class="table-holder">
          <table class="rwd-table">
            <tr>
              <th>رقم الامتحان</th>
              <th>عدد الاسئلة</th>
              <th>مجموع الدرجات</th>
              <th>حالة الإختبار</th>
              <th>الاعدادات</th>
            </tr>
         
            @foreach($quizes as $quiz)
            <tr>
              <td data-th="رقم الامتحان">{{ $quiz->id }}</td>
              <td data-th=" الاجراءات">
                <a href="{{route('show-quiz', $quiz->id)}}" class="btn">عرض</a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </article>
    </main>
    <footer class="footer container">
      <div class="copy-rights">
        <i class="fa-regular fa-copyright"></i> كل الحقوق محفوظة
        <span class="year"></span>
      </div>
      <div class="social-meida">
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-solid fa-at"></i></a>
        <a href=""><i class="fa-brands fa-whatsapp"></i></a>
      </div>
    </footer>
    <div class="delete-card">
      <h2 class="title">هل انت متاكد من عملية المسح</h2>
      <div class="card-footer">
        <button class="btn add">نعم</button>
        <button class="btn cancel-delete-card red">إلغاء</button>
      </div>
    </div>
    <div class="status-card">
      <h2 class="title">تعديل حالة الامتحان</h2>
      <select
        class="form-select user-selector"
        aria-label="Default select example"
      >
        <option value="" selected>نشط</option>
        <option value="">غير نشط</option>
      </select>
      <div class="card-footer">
        <button class="btn add">تاكيد</button>
        <button class="btn cancel-status-card red">إلغاء</button>
      </div>
    </div>
    <span class="layout"></span>
  </body>
  <script src="../src/js/main.js"></script>
</html>
