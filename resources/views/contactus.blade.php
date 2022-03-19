@extends('layouts.app')
@section('content')

<style>

.container {
  margin: 0 auto;
  position: relative;
  width: 100%;
  min-height: 100vh;
  padding: 2rem;
  background-color: #fafafa;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.form {
  width: 100%;
  max-width: 820px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  overflow: hidden;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.contact-form {
  background-color: #27be8c;
  position: relative;
}

.circle {
  border-radius: 50%;
  background: linear-gradient(135deg, transparent 20%, #149279);
  position: absolute;
}

.circle.one {
  width: 130px;
  height: 130px;
  top: 130px;
  right: -40px;
}

.circle.two {
  width: 80px;
  height: 80px;
  top: 10px;
  right: 30px;
}

.contact-form:before {
  content: "";
  position: absolute;
  width: 26px;
  height: 26px;
  background-color: #27be8c;
  transform: rotate(45deg);
  top: 50px;
  left: -13px;
}

form {
  padding: 2.3rem 2.2rem;
  z-index: 10;
  overflow: hidden;
  position: relative;
}

.title {
  color: #fff;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
  margin-bottom: 0.7rem;
}

.input-container {
  position: relative;
  margin: 1rem 0;
}

.input {
  width: 100%;
  outline: none;
  border: 2px solid #fafafa;
  background: none;
  padding: 0.6rem 1.2rem;
  color: #fff;
  font-weight: 500;
  font-size: 0.95rem;
  letter-spacing: 0.5px;
  border-radius: 25px;
  transition: 0.3s;
}

textarea.input {
  padding: 0.8rem 1.2rem;
  min-height: 150px;
  border-radius: 22px;
  resize: none;
  overflow-y: auto;
}

.input-container label {
  position: absolute;
  top: 50%;
  left: 15px;
  transform: translateY(-50%);
  padding: 0 0.4rem;
  color: #fafafa;
  font-size: 0.9rem;
  font-weight: 400;
  pointer-events: none;
  z-index: 1000;
  transition: 0.5s;
}

.input-container.textarea label {
  top: 1rem;
  transform: translateY(0);
}

.btn {
  padding: 0.6rem 1.3rem;
  background-color: #fff;
  border: 2px solid #fafafa;
  font-size: 0.95rem;
  color: #27be8c;
  line-height: 1;
  border-radius: 25px;
  outline: none;
  cursor: pointer;
  transition: 0.3s;
  margin: 0;
}

.btn:hover {
  background-color: transparent;
  color: #fff;
}

.btn[name="clear"] {
  color: rgba(0, 0, 0, 0.616)
}

.btn[name="clear"]:hover {
  background-color: transparent;
  color: #fff;
}

.input-container span {
  position: absolute;
  top: 0;
  left: 25px;
  transform: translateY(-50%);
  font-size: 0.8rem;
  padding: 0 0.4rem;
  color: transparent;
  pointer-events: none;
  z-index: 500;
}

.input-container span:before,
.input-container span:after {
  content: "";
  position: absolute;
  width: 10%;
  opacity: 0;
  transition: 0.3s;
  height: 5px;
  background-color: #27be8c;
  top: 50%;
  transform: translateY(-50%);
}

.input-container span:before {
  left: 50%;
}

.input-container span:after {
  right: 50%;
}

.input-container.focus label {
  top: 0;
  transform: translateY(-50%);
  left: 25px;
  font-size: 0.8rem;
}

.input-container.focus span:before,
.input-container.focus span:after {
  width: 50%;
  opacity: 1;
}

.contact-info {
  padding: 2.3rem 2.2rem;
  position: relative;
}

.contact-info .title {
  color: #1abc9c;
}

.text {
  color: #333;
  margin: 1.5rem 0 2rem 0;
}

.information {
  display: flex;
  color: #555;
  margin: 0.7rem 0;
  align-items: center;
  font-size: 0.95rem;
}

.icon {
  width: 28px;
  margin-right: 0.7rem;
}

.social-media {
  padding: 2rem 0 0 0;
}

.social-media p {
  color: #333;
}

.social-icons {
  display: flex;
  margin-top: 0.5rem;
}

.social-icons a {
  width: 35px;
  height: 35px;
  border-radius: 5px;
  background: linear-gradient(45deg, #1abc9c, #149279);
  color: #fff;
  text-align: center;
  line-height: 35px;
  margin-right: 0.5rem;
  transition: 0.3s;
}

.social-icons a:hover {
  transform: scale(1.05);
}

.contact-info:before {
  content: "";
  position: absolute;
  width: 160px;
  height: 160px;
  border: 22px solid #1abc9c;
  border-radius: 50%;
  bottom: -90px;
  right: 50px;
  opacity: 0.3;
}

.big-circle {
  position: absolute;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  background: linear-gradient(to bottom, #1cd4af, #159b80);
  bottom: 50%;
  right: 50%;
  transform: translate(-40%, 38%);
}

.big-circle:after {
  content: "";
  position: absolute;
  width: 360px;
  height: 360px;
  background-color: #fafafa;
  border-radius: 50%;
  top: calc(50% - 180px);
  left: calc(50% - 180px);
}

.square {
  position: absolute;
  height: 400px;
  top: 50%;
  left: 50%;
  transform: translate(181%, 11%);
  opacity: 0.2;
}

@media (max-width: 850px) {
  .form {
    grid-template-columns: 1fr;
  }

  .contact-info:before {
    bottom: initial;
    top: -75px;
    right: 65px;
    transform: scale(0.95);
  }

  .contact-form:before {
    top: -13px;
    left: initial;
    right: 70px;
  }

  .square {
    transform: translate(140%, 43%);
    height: 350px;
  }

  .big-circle {
    bottom: 75%;
    transform: scale(0.9) translate(-40%, 30%);
    right: 50%;
  }

  .text {
    margin: 1rem 0 1.5rem 0;
  }

  .social-media {
    padding: 1.5rem 0 0 0;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 1.5rem;
  }

  .contact-info:before {
    display: none;
  }

  .square,
  .big-circle {
    display: none;
  }

  form,
  .contact-info {
    padding: 1.7rem 1.6rem;
  }

  .text,
  .information,
  .social-media p {
    font-size: 0.8rem;
  }

  .title {
    font-size: 1.15rem;
  }

  .social-icons a {
    width: 30px;
    height: 30px;
    line-height: 30px;
  }

  .icon {
    width: 23px;
  }

  .input {
    padding: 0.45rem 1.2rem;
  }

  .btn {
    padding: 0.45rem 1.2rem;
  }
}

::-webkit-input-placeholder { /* Edge */
  font-weight: 500;
  color: #fff !important;
}

:-ms-input-placeholder { /* Internet Explorer */
  font-weight: 500;
  color: #fff !important;
}

::placeholder {
  font-weight: 500;
  color: rgba(255, 255, 255, 0.74) !important;
}

.alert.alert-success {
  color: rgb(255, 255, 255);
  font-weight: 550;
  background-color:rgba(232, 232, 232, 0.5);
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
}

</style>

<script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>


<body>
  <div class="container">
    <span class="big-circle"></span>
    <img src="{{asset('images/shape_contactus.png')}}" class="square" alt="" />
    <div class="form">
      <div class="contact-info">
        <h3 class="title">Let's get in touch</h3>
          <p class="text">
            We love feedbacks! Communicate to us your comments or suggestions on everything about the application! 
          </p>

          <p class="font-normal">
            Below are some ways to contact us:
          </p>

        <div class="info">
          <div class="information">
            <img src="{{asset('images/location_contactus.png')}}" class="icon" alt="" />
            <p>712 San Andres Bukid Makati City</p>
          </div>
          <div class="information">
            <img src="{{asset('images/email_contactus.png')}}" class="icon" alt="" />
            <p>eulat@protonmail.com</p>
          </div>
          <div class="information">
            <img src="{{asset('images/phone_contactus.png')}}" class="icon" alt="" />
            <p>123-456-789</p>
          </div>
        </div>

        <div class="social-media">
          <p>Connect with us :</p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <span class="circle one"></span>
        <span class="circle two"></span>

        <form action="{{ route('send.email') }}" class="contact100-form validate-form" autocomplete="off" method="post">
          @csrf
          @if(session()->has('message'))
              <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
      @endif
          <h3 class="title">Contact us</h3>
          <div class="wrap-input100 validate-input" data-validate = "Name is required">
          <div class="input-container validate-input">
            <input type="text" name="name" class="input" required/>
            <label for="">Username</label>
            <span>Username</span>
            @error('name')
            <span class="text-danger"> {{ $message }} </span>
        @enderror
          </div>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Name is required">
        <div class="input-container validate-input">
            <input type="email" name="email" class="input" required/>
            <label for="">Email</label>
            <span>Email</span>
          </div>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Name is required">
        <div class="input-container validate-input">
            <input type="text" name="subject" class="input" required/>
            <label for="">Subject</label>
            <span>Subject</span>

            @error('subject')
            <span class="text-danger"> {{ $message }} </span>
        @enderror
          </div>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Name is required">
        <div class="input-container textarea validate-input">
            <textarea name="content" class="input" required></textarea>
            <label for="">Message</label>
            <span>Message</span>
            <span class="focus-input100"></span>
            @error('content')
               <span class="text-danger"> {{ $message }} </span>
             @enderror
          </div>
        </div>
          <div class="container-contact100-form-btn">
            <input type="submit" value="Send" class="btn" />
            <input type="reset" value="Reset" name="clear" class="btn"/>
          </div>
          
        </form>
      </div>
    </div>
  </div>

  <script>
    const inputs = document.querySelectorAll(".input");

function focusFunc() {
let parent = this.parentNode;
parent.classList.add("focus");
}

function blurFunc() {
let parent = this.parentNode;
if (this.value == "") {
  parent.classList.remove("focus");
}
}

inputs.forEach((input) => {
input.addEventListener("focus", focusFunc);
input.addEventListener("blur", blurFunc);
});

  </script>

<footer class="text-gray-100 bg-green-600">
  <div class="max-w-3xl mx-auto py-6">
      <h1 class="text-center text-lg lg:text-2xl">
          Be one of the first movers, join others and never miss <br> out on new news, discussions and information.
      </h1>

      <h3 class="text-center text-base lg:text-base font-medium mt-8">
        Copyright 2021. E-Ulat. Designed by MQR
      </h3>
    

 

      <hr class="h-px mt-6 bg-gray-700 border-none">

      <div class="flex flex-col items-center justify-between mt-4 md:flex-row">
          <div>
              <a href="#" class="text-xl font-bold text-gray-100 hover:text-white">E-Ulat</a>
          </div>

          <div class="flex mt-4 md:m-0">
              <div class="-mx-4">
                  <a href="{{route('home')}}" class="px-4 text-sm text-gray-100 font-medium hover:text-white">Home</a>
                  <a href="{{route('terms&conditions')}}" class="px-4 text-sm text-gray-100 font-medium hover:text-white">Terms and Conditions</a>
                  <a href="{{route('aboutus')}}" class="px-4 text-sm text-gray-100 font-medium hover:text-white">About</a>
                  <a href="{{route('contactus')}}" class="px-4 text-sm text-gray-100 font-medium hover:text-white">Contact Us</a>
              </div>
          </div>
      </div>
  </div>
</footer>
</body>

@endsection