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
          <a href="students.html" class="link active">الفصول</a>
          <a href="grades.html" class="link">الدرجات</a>
          <a href="quizes.html" class="link">الامتحانات</a>
        </div>
      </div>
      <div class="header--content">
        <a href=" ../profile.html" class="user"
          ><img src=" ../src/assets/images/user.jpg" class="logo"
        /></a>
        <a href="  register.html" class="sign-out">تسجيل خروج</a>
      </div>
    </header>
    <main class="students">
      <article class="filter-section">
        <div class="article-title">
          <h1 class="title">الفصول</h1>
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
       
        <div class="table-holder">
          <table class="rwd-table">
           <thead>
             <tr>
               <th>#</th>
               <th>اسم الفصل</th>
               <th>تاريخ الانشاء</th>
               <th> الاجراءات</th>
             </tr>
           </thead>
           <tbody>
            @foreach($classes as $key => $class)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->created_at }}</td>
                    <td>
                        <a href="{{ route('class.students', $class->id) }}" class="btn btn-primary">عرض الطلاب</a>
                    </td>
                </tr>
            @endforeach
          </tbody>
          
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
  </body>
  <script src="../src/js/main.js"></script>
</html>
