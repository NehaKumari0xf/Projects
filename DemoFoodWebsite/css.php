<style>
    * {
    padding : 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;
    scroll-behavior: smooth;
    list-style: none;
    text-decoration: none;
}

:root {
    --main-color: #ff702a;
    --text-color: #fff;
    --bg-color: #1e1c2a;
    --big-font: 5rem;
    --h2-font:2.25rem;
    --p-font:0.9rem;
}

*::selection {
    background:  #ff702a;
    color: #fff;
}

body {
    color: #fff;
    background: #1e1c2a;
}

header {
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 30px 170px;
    background:  var(--bg-color);
}

.logo {
    color :#ff702a;
    font-weight: 600;
    font-size: 2.4rem;
}

.navbar {
    display: flex;
}

.navbar a{
    color: #fff;
    font-size: 1.1rem;
    padding: 10px 20px;
    font-weight: 500;
}

.navbar a:hover{
    color: #ff702a;
    transition: .4s;
}

#menu {
    font-size: 2rem;
    cursor: pointer;
    display: none;
    
}

section {
    padding: 70px 17%;
}

.home{
    width: 100%;
    min-height: 95vh;
    display: grid;
    grid-template-columns: repeat(2,1fr);
    grid-gap: 1.5rem;
    align-items: center;
}

.home-img img{
    max-width: 100%;
    width: 450px;
   height: auto;
}

.home-text h1{
    font-size: 5rem;
    color: #ff702a;
}

.home-text h2{
    font-size: 2.25rem;
    margin: 1rem 0 2rem;
}

.btn{
    display: inline-block;
    padding: 10px 20px;
    background: #ff702a;
    color: #fff;
    border-radius: 0.5rem;
}

.btn:hover{
    transform: scale(1.2) translateY(10px);
    transition: .4s;
}

.about {
    display: grid;
    grid-template-columns: repeat(2,2fr);
    grid-gap:1.5rem;
    align-items: center;
}

.about-img img{
    max-width: 100%;
    width: 350px;
    height: auto;   
}

.about-text span{
    color: #ff702a;
    font-weight: 600;
}

.about-text h2{
    font-size: 2.20rem;
}

.about-text p{
    font-size: 0.9rem;
}

.heading{
    text-align: center;
}

.heading span{
    color: #ff702a;
    font-weight: 600;
}

.heading h2{
    font-size: 2.25rem;   
}
.menu-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,auto));
    grid-gap:1.5rem;
    align-items:center;
}

.box {
    position: relative;
    margin-top: 4rem;
    height: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: whitesmoke;
    padding: 20px;
    border-radius: 0.5rem;
}

.box-img{
    width: 220px;
    height: 220px;
}

.box-img img{
     width: 100%;
     height: 100%;
}

.box h2{
    font-size: 1.3rem;
    color:#1e1c2a;
}

.box h3{
    color:#1e1c2a;
    font-size: 1rem;
    font-weight: 400;
    margin: 4px 0 10px;
}

.box span{
    font-size: 0.9rem;
    color:#ff702a;
    font-weight: 600;
}

.box .bx{
    background-color: #ff702a;
    position: absolute;
    right: 0;
    top:0;
    font-size: 20px;
    padding: 7px 10px;
    border-radius: 0.05rem 0 0.05rem;
}

.service-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240,auto));
    grid-gap: 1.5rem;
    margin-top: 4rem;
}

.s-box{
    text-align: center;
    padding: 20px 30px;
}

.s-box img{
    width: 90px;
}

.s-box h3{
    margin: 4px 0 10px;
    color:#ff702a;
    font-size: 1.2rem;
}

.s-box p{
    line-height: 1.7;
}

.cta{
    background:#feeee7;
    padding: 70px 0;
    text-align: center;
    width: 66%;
    margin: 100px auto;
    border-radius: 10px;
}

.cta h2{
    font-size: 2rem ;
    color:#1e1c2a;
    margin-bottom: 30px;
}

.mainfooter{
    display: flex;
    flex-wrap: wrap;
}

.footer{
    padding: 10px 0;
}

.col{
    width: 25%;
}

.col h4{
    font-size: 1.2rem;
    color: white;
    margin-bottom: 25px;
    position: relative;
}

.col h4::before{
    content: "";
    position: absolute;
    height: 2px;
    width: 50px;
    left: 0;
    bottom: -8px;
    background:#ff702a;
}

.col ul li:not(last-child){
    margin-bottom: 15px;
}

.col ul li a{
    color: #9897a9;
    font-size: 1.1rem ;
    display: block;
    text-transform: capitalize;
    transition: .4s;
}

.col ul li a:hover{
    color: white;
    transform: translateY(-12px);
}

.col .social{
    width: 220px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.col .social a{
    height: 40px;
    width: 40px;
    background: #ff702a;
    color: white;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    border-radius: 50%;
    transition: .4s;
}

.col .social a:hover{
    transform: scale(1.2);
    color: #1e1c2a;
    background: white;
}
</style>