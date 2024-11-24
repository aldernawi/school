<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- fontaswesome -->
    <link
      rel="stylesheet"
      href="src/fontawesome-free-6.6.0-web/css/all.min.css"
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
    <link rel="stylesheet" href="src/style/main.min.css" />
    <title>gate</title>
  </head>
  <body dir="rtl" class="main">
    <header class="header container">
      <div class="header--links">
        <div class="links-shower"><i class="fa-solid fa-bars"></i></div>
        <div class="links-holder">
          <span><i class="fa-solid fa-xmark"></i></span>
          <a href="index.html" class="link active">الصفحة الرئيسية</a>
          <a href="admin/users/students.html" class="link">المستخدمين</a>
          <a href="admin/classes.html" class="link">الفصول</a>
          <a href="admin/grades.html" class="link">الدرجات</a>
          <a href="teacher/students.html" class="link">الطلبة</a>
          <a href="teacher/grades.html" class="link">الدرجات</a>
          <a href="teacher/quizes.html" class="link">الامتحانات</a>
          <a href="student/grades.html" class="link">الدرجات</a>
          <a href="student/quizes.html" class="link">الامتحانات</a>
        </div>
      </div>
      @auth
            <div class="header--content">
                  
                <button type="button" class="sign-out"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    تسجيل الخروج
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        @else
            <div class="header--content">
                <a href="{{ route('login') }}" class="sign-out">تسجيل الدخول</a>
            </div>
        @endauth
    </header>
    <main>
      <article class="backview">
        <img src="src/assets/images/backview.jpg" alt="" class="image" />
        <span class="text">مدرسة في بيتك</span>
      </article>
      <article class="about-us container">
        <img src="src/assets/images/about-us.jpg" alt="" class="img" />
        <div class="content">
          <h4 class="title">عن المدرسة</h4>
          <span class="text"
            >مرحبًا بكم في [اسم المدرسة]، المدرسة الرائدة في تعليم الأطفال عبر
            الإنترنت. نحن نقدم تجربة تعليمية فريدة وممتعة للأطفال من جميع
            الأعمار، مع التركيز على تطوير مهاراتهم الأكاديمية والاجتماعية في
            بيئة آمنة وتفاعلية.
          </span>
        </div>
      </article>
      <article class="vision container">
        <div class="contect">
          <h5 class="contect--title">رؤيتنا</h5>
          <span class="contect--text"
            >نسعى في المدرسة إلى تقديم تعليم عالي الجودة يمكن الوصول إليه من أي
            مكان في العالم. نؤمن بأن التعليم يجب أن يكون ممتعًا ومحفزًا، ونهدف
            إلى غرس حب التعلم في نفوس الأطفال منذ الصغر</span
          >
        </div>
      </article>
      <article class="our-approach container">
        <div class="content">
          <h4 class="title">منهجنا</h4>
          <span class="text"
            >يعتمد منهجنا على أحدث الأساليب التعليمية والتكنولوجية لضمان تقديم
            محتوى تعليمي شيق وجذاب. نقدم دروسًا تفاعلية تشمل الألعاب التعليمية،
            والأنشطة العملية، والفيديوهات التوضيحية، مما يساعد الأطفال على فهم
            المواد الدراسية بشكل أفضل.
          </span>
        </div>
      </article>
      <article class="static container">
        <img src="src/assets/images/vision.jpg" alt="" class="background-img" />
        <div class="box">
          <i class="fa-solid fa-school icon"></i>
          <h5 class="title">اداريين</h5>
          <span class="sub-title">10</span>
        </div>
        <div class="box">
          <i class="fa-solid fa-chalkboard-user icon"></i>
          <h5 class="title">اساتذة</h5>
          <span class="sub-title">20</span>
        </div>
        <div class="box">
          <i class="fa-solid fa-children icon"></i>
          <h5 class="title">طلاب</h5>
          <span class="sub-title">50</span>
        </div>
      </article>
      <article class="join-us container">
        <div class="content">
          <h4 class="title">انضموا إلينا</h4>
          <span class="text"
            >نحن في المدرسة نؤمن بأن كل طفل يستحق فرصة الحصول على تعليم متميز.
            انضموا إلينا اليوم لنبدأ رحلة التعلم معًا!
          </span>
          <a href="register.html" class="link">انضم الآن</a>
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
    <div class="create-task">
      <h2 class="title">إنشاء طلب جديد</h2>
      <div class="add-service">
        <input type="text" id="type" placeholder="نوع الخدمة" class="field" />
        <input
          type="text"
          id="place"
          placeholder="مكان التنفيد"
          class="field"
        />
        <input
          type="number"
          id="price"
          placeholder="سعر الخدمة بالدينار اليبي"
          class="field"
        />
        <input type="date" id="start" placeholder="تاريخ البدء" class="field" />
        <input
          type="date"
          id="end"
          placeholder="تاريخ الإنتهاء"
          class="field"
        />
        <textarea id="desc" placeholder="وصف الخدمة" class="field"></textarea>
        <button class="btn add">إضافة</button>
        <button class="btn cancel-task red">إلغاء</button>
      </div>
    </div>
    <span class="layout"></span>
  </body>
  <script src="src/js/main.js"></script>
  <!-- bootstrap -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
</html>
