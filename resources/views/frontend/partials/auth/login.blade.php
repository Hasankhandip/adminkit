 <section class="account-section">
     <div class="row g-0 flex-wrap-reverse">
         <div class="col-md-6 col-xl-5 col-lg-6">
             <div class="account-form-wrapper">
                 <div class="logo">
                     <a href="{{ route('index') }}"><img
                             src="https://script.viserlab.com/binaryecom/assets/images/logoIcon/logo.png"
                             alt="logo" /></a>
                 </div>

                 <form class="account-form verify-gcaptcha" method="POST"
                     action="https://script.viserlab.com/binaryecom/user/login">
                     <input type="hidden" name="_token" value="CPtJZDsHshJNHKnIlTXPS1uvrYewGIsHFuUcYivK"
                         autocomplete="off" />
                     <div class="form--group">
                         <label class="form--label">Username</label>
                         <input class="form-control form--control" name="username" type="text" value=""
                             placeholder="Enter Username" required />
                     </div>
                     <div class="form--group">
                         <label class="form--label">Password</label>
                         <input class="form-control form--control" id="password" name="password" type="password"
                             placeholder="Enter Password" required />
                     </div>

                     <div class="mb-3">
                         <script src="https://www.google.com/recaptcha/api.js"></script>
                         <div class="g-recaptcha" data-sitekey="6LdPC88fAAAAADQlUf_DV6Hrvgm-pZuLJFSLDOWV"
                             data-callback="verifyCaptcha"></div>
                         <div id="g-recaptcha-error"></div>
                     </div>

                     <div class="form--group custom--checkbox">
                         <input class="form--control" id="remember" name="remember" type="checkbox" />
                         <label class="form--label" for="remember"> Remember Me </label>
                     </div>
                     <div class="form--group button-wrapper">
                         <button class="account--btn" type="submit">Sign In</button>
                         <a class="custom--btn" href="{{ route('register.index') }}"><span>Create
                                 Account</span></a>
                     </div>
                 </form>
                 <p class="text--dark">
                     Forgot your login credentials ?
                     <a class="text--base ms-2" href="https://script.viserlab.com/binaryecom/user/password/reset">Reset
                         Password</a>
                 </p>
             </div>
         </div>
         <div class="col-md-6 col-xl-7 col-lg-6">
             <div class="account-thumb">
                 <img src="https://script.viserlab.com/binaryecom/assets/images/frontend/login/61756759612201635084121.jpg"
                     alt="thumb" />
                 <div class="account-thumb-content">
                     <p class="welc">Welcome to</p>
                     <h3 class="title">Multi Level Marketing Rock</h3>
                     <p class="info">
                         Login to Access Account, changes to your Acconnt as per your
                         Need.
                     </p>
                 </div>
             </div>
         </div>
     </div>
     <div class="shape shape1">
         <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/08.png" alt="shape" />
     </div>
     <div class="shape shape2">
         <img src="https://script.viserlab.com/binaryecom/assets/templates/basic/images/shape/waves.png"
             alt="shape" />
     </div>
 </section>
