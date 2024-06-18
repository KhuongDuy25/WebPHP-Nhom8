<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>
  </head>

<style>
    *,
*::before,
*::after {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body,
input {
  font-family: "Poppins", sans-serif;
}

main {
  width: 100%;
  min-height: 100vh;
  overflow: hidden;
  background-color: #000000c3;
  padding: 2rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.box {
  position: relative;
  width: 100%;
  max-width: 1020px;
  height: 640px;
  background-color: #fff;
  border-radius: 3.3rem;
  box-shadow: 0 60px 40px -30px rgba(0, 0, 0, 0.27);
}

.inner-box {
  position: absolute;
  width: calc(100% - 4.1rem);
  height: calc(100% - 4.1rem);
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.forms-wrap {
  position: absolute;
  height: 100%;
  width: 45%;
  top: 0;
  left: 0;
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 1fr;
  transition: 0.8s ease-in-out;
}

form {
  max-width: 260px;
  width: 100%;
  margin: 0 auto;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
  grid-column: 1 / 2;
  grid-row: 1 / 2;
  transition: opacity 0.02s 0.4s;
}

form.sign-up-form {
  opacity: 0;
  pointer-events: none;
}

.logo{
    display: flex;
}
.lt{
    padding-left: 10px;
}
.heading h2 {
  font-size: 2.1rem;
  font-weight: 600;
  color: #151111;
}

.heading h6 {
  color: #bababa;
  font-weight: 400;
  font-size: 0.75rem;
  display: inline;
}

.toggle {
  color: #151111;
  text-decoration: none;
  font-size: 0.75rem;
  font-weight: 500;
  transition: 0.3s;
}

.toggle:hover {
  color: #8371fd;
}

.input-wrap {
  position: relative;
  height: 37px;
  margin-bottom: 2rem;
}

.input-field {
  position: absolute;
  width: 100%;
  height: 100%;
  background: none;
  border: none;
  outline: none;
  border-bottom: 1px solid #bbb;
  padding: 0;
  font-size: 0.95rem;
  color: #151111;
  transition: 0.4s;
}

label {
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  font-size: 0.95rem;
  color: #bbb;
  pointer-events: none;
  transition: 0.4s;
}

.input-field.active {
  border-bottom-color: #151111;
}

.input-field.active + label {
  font-size: 0.75rem;
  top: -2px;
}

.sign-btn {
  display: inline-block;
  width: 100%;
  height: 43px;
  background-color: #151111;
  color: #fff;
  border: none;
  cursor: pointer;
  border-radius: 0.8rem;
  font-size: 0.8rem;
  margin-bottom: 2rem;
  transition: 0.3s;
}

.sign-btn:hover {
  background-color: #8371fd;
}

.text {
  color: #bbb;
  font-size: 0.7rem;
}

.text a {
  color: #bbb;
  transition: 0.3s;
}

.text a:hover {
  color: #8371fd;
}

main.sign-up-mode form.sign-in-form {
  opacity: 0;
  pointer-events: none;
}

main.sign-up-mode form.sign-up-form {
  opacity: 1;
  pointer-events: all;
}

main.sign-up-mode .forms-wrap {
  left: 55%;
}

main.sign-up-mode .carousel {
  left: 0%;
}

.carousel {
  position: absolute;
  height: 100%;
  width: 55%;
  left: 45%;
  top: 0;
  background-color: #b2744c;
  border-radius: 2rem;
  display: flex;
  justify-content: center;
  align-items: center;
  padding-bottom: 2rem;
  overflow: hidden;
  
  
}
.container{
    position: relative;
    top: 50px;
}
.cup{
    position: relative;
    width: 280px;
    height: 300px;
    background: linear-gradient(to right, #f9f9f9,#d9d9d9);
    border-bottom-left-radius: 45%;
    border-bottom-right-radius: 45%;
}
.top{
    position: absolute;
    top: -30px;
    left: 0;
    width: 100%;
    height: 60px;
    background: linear-gradient( to right, #f9f9f9,#d9d9d9);
    border-radius: 50%;
    
}
.circle{
    position: absolute;
    top: 5px;
    left: 10px;  
    width: 260px;
    height: 50px;
    background: linear-gradient( to left, #f9f9f9,#d9d9d9);
    border-radius: 50%;
    box-sizing: border-box;
    overflow: hidden;
}
.tea{
    position: absolute;
    top: 20px;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#dd6e45,#e28462);
    border-radius: 50%;
}
.handle{
position: absolute;
right: -70px;
top: 40px;
width: 160px;
height: 180px;
border: 25px solid #dcdcdc;
border-left: 25px solid transparent;
border-bottom: 25px solid transparent;
border-radius: 50%;
transform: rotate(42deg);
}
.plate{
    position: absolute;
    bottom: -50px;
    left: 50%;
    transform: translateX(-50%);
    width: 500px;
    height: 200px;
    background: linear-gradient(to right , #f9f9f9,#e7e7e7);
    border-radius: 50%;
    box-shadow:0 35px 35px rgba(0, 0, 0, 0.2) ;
}
.plate::before{
    content: '';
    position: absolute;
    top: 10px;
left: 10px;
bottom: 10px;
right: 10px;
border-radius: 50%;
background: linear-gradient(to left , #f9f9f9,#e7e7e7);

}
.plate::after{
    content: '';
    position: absolute;
    top: 30px;
left: 30px;
bottom: 30px;
right: 30px;
border-radius: 50%;
background: linear-gradient(rgba(0, 0, 0, 0.2) 25% );
}
.vapour{
    position: relative;
    display: flex;
    z-index: 1;
    padding: 0 20px;
}
.vapour span{
    position: relative;
    bottom: 50px;
    display: block;
    margin: 0 2px 50px;
    min-width: 8px;
    height: 120px;
    background: #fff;
    border-radius: 50%;
    animation: animate 5s linear infinite;
    opacity: 0;
    filter: blur(8px);
    animation-delay: calc(var(--i) * 0.3s);
}

@keyframes animate{
    0%{
        transform:  translateY(0) scaleX(1);
    }
    15%{
        opacity: 1;
    }
    50%{
        transform:  translateY(-150px) scaleX(5);
    }
    95%{
        opacity: 0;
    }
    100%{
        transform:  translateY(-300px) scaleX(10);
    }
}
.text1{
    
    position: relative;
    width: 100%;
    text-align: center;
    filter: url(#fire);
}
.text1 h2{
    position: relative;
    color: #0b6111;
    font-weight: 550;
    font-size: 3em;
    
    text-shadow: 0 0 10px #ff8c3b,
    0 0 40px #ff8c3b,
    0 0 80px #ff8c3b,
    0 0 160px #ff8c3b,
    0 0 240px #ff8c3b;


}
svg{
    width: 0;
    height: 0;

}


</style>


  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="./xulydk.php" class="sign-in-form" method="post">
              <div class="logo">
               
           <div class="text1">
        <h2>COFFEE HOUSE</h2>
    </div>
    <svg>
        <filter id="fire">
            <feTurbulence id="turbulence" baseFrequency="0.1 0.1 " numOctaves="2" seed="3">

            </feTurbulence>
            <feDisplacementMap in="SourceGraphic" scale="10"></feDisplacementMap>
        </filter>
    </svg>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account? </h6>
                <a href="./dangnhap.php" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                  name="username"
                    type="text"
                    placeholder="Username"
                    class="input-field" 
                    required
                  />
                </div>
                <div class="input-wrap">
                  <input
                  name="email"
                    type="email"
                    placeholder="Email"
                    class="input-field"
                    required
                  />
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="input-field"
                    
                    required
                  />
                </div>
                

                <input type="submit" name="submit" value="Sign Up" class="sign-btn" />

                <p class="text">
                By signing up, I agree to the
                  <a href="#">Terms of Services</a> and Privacy Policy.
                </p>
              </div>
            </form>
            </div>

          <div class="carousel">
          <div class="container">
    <div class="plate"></div>
<div class="cup">
    <div class="top">
        <div class="vapour">
            <span style="--i:1;"></span>
            <span style="--i:2;"></span>
            <span style="--i:10;"></span>
            <span style="--i:14;"></span>
            <span style="--i:3;"></span>
            <span style="--i:16;"></span>
            <span style="--i:4;"></span>
            <span style="--i:17;"></span>
            <span style="--i:20;"></span>
            <span style="--i:7;"></span>
            <span style="--i:18;"></span>
            <span style="--i:8;"></span>
            <span style="--i:9;"></span>    
            <span style="--i:11;"></span>   
            <span style="--i:13;"></span>  
            <span style="--i:15;"></span> 
            <span style="--i:6;"></span>
            <span style="--i:19;"></span>
            <span style="--i:12;"></span>
            <span style="--i:5;"></span>

        </div>
        <div class="circle">
            <div class="tea"></div>
        </div>
    </div>
    <!-- <p>DLV COFFEE</p> -->
    <div class="handle"></div>
</div>
</div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>