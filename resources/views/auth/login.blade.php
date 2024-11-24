<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- fontaswesome -->
    <link
      rel="stylesheet"
      href="src/fontawesome-free-6.6.0-web/css/all.min.css"
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
  <body dir="rtl">
    <div class="login-container">
      <div class="login-box">
        <div class="content">
          <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="input-box" style="margin-bottom: 10px;">
                  <input type="text" name="email" placeholder=" " required />
                  <span class="">رقم المستخدم - الايميل</span>
                  <span></span>
              </div>
              <div class="input-box" style="margin-bottom: 10px;margin-top: 10px;">
                  <input type="password" name="password" placeholder=" " required />
                  <span>كلمة المرور</span>
                  
                  <span></span>
              </div>
              <div class="input-box">
                  <button type="submit">تسجيل دخول</button>
                  <div>
                      <a href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                  </div>
              </div>
          </form>
          
    </div>
      </div>
    </div>
  </body>
</html>
