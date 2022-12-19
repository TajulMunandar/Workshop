<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/signin.css" rel="stylesheet">
    <style>
        :root {
  //--background: #4285f4;
  //--primary-color: rgba(39, 94, 254, 1);
  --background: #4285f4;
  --primary-color: #000;
}

body {
  background: var(--background);
  overflow: hidden;
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.container {
  z-index: 10;
  position: absolute;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  background: var(--primary-color);
  height: 100vh;
  max-width: 100vw;
  animation: lift 0.8s ease-in-out;
  animation-delay: 1.6s;
  animation-fill-mode: forwards;
}

.title {
  font-size: 81px;
  color: #4285f4;
  text-align: center;
  font-family: "Lexend Deca", sans-serif;
  animation: wave 2s, jump 2s;
  position: relative;
  top: 0;
  padding: 4px;
  //transform: translate3d(0, 16%, 0);
  opacity: 0;
  z-index: 3;
  animation-fill-mode: forwards;
}

span:nth-of-type(1) {
  //left: 0rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.25s;
}

span:nth-of-type(2) {
  //left: 0.8rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.1s;
}

span:nth-of-type(3) {
  //left: 1.6rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.15s;
}

span:nth-of-type(4) {
  //left: 2.4rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.2s;
}

span:nth-of-type(5) {
  //left: 3.2rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.25s;
}

span:nth-of-type(6) {
  //left: 4rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.3s;
}

/* span:nth-of-type(7) {
  //left: 4.8rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.35s;
}

span:nth-of-type(8) {
  //left: 5.6rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.4s;
}

span:nth-of-type(9) {
  //left: 6.4rem;
  animation: wave 0.4s, jump 1.1s ease-in-out alternate 0.45s;
} */

@keyframes wave {
  0% {
    top: 0%;
  }
  100% {
    top: 100%;
  }
}

@keyframes jump {
  0% {
    transform: translate3d(0, 0, 0);
    opacity: 0;
  }
  90% {
    transform: translate3d(0, -16%, 0);
    opacity: 1;
  }
  100% {
    transform: translate3d(0, -32%, 0);
    opacity: 1;
  }
}

@keyframes lift {
  0% {
    transform: translate3d(0, 0, 0);
    opacity: 1;
    visibility: visible;
  }
  100% {
    transform: translate3d(0, -100%, 0);
    opacity: 1;
    visibility: hidden;
  }
}

@keyframes appear {
  0% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

    </style>
    <title>{{ $title }}</title>
</head>
<body>



<main class="form-signin w-100 m-auto border">
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session()->has('LoginErorr'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('LoginErorr') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <form action="/login" method="POST">
    @csrf
    <img class=" login-logo w-75" src="img/logo.svg" alt="" >
    <h1 class="h3 mb-3 fw-normal">Login!</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="nim" name="nim" placeholder="20205730100***" required>
      <label for="nim">Nim</label>

    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password">Kata Sandi</label>

    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
    <p class="mt-3 mb-3 text-center">&copy; 2022</p>
  </form>
</main>


</body>
</html>
