<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<nav class="ss-icon closed" tabindex="0">
    <span id="center-bar"></span>
    <a href="test.php">Twitter</a>
    <a href="#">Facebook</a>	
    <a href="#">Pinterest</a>	
    <a href="#">Google+</a>		
    <a href="#">Ello</a>
</nav>

<script>
    function clickSet() {
        circularnav.classList.toggle("closed")
        circularnav.classList.toggle("clicked");
        if (circularnav.classList.contains("closed")) {
            // freshly closed button
            var pseudoBefore = window.getComputedStyle(
            document.querySelector('.ss-icon'), ':before'
            ).animation
        }
    }

    var circularnav = document.getElementsByClassName("ss-icon")[0];
    circularnav.addEventListener("click", clickSet, false);

    circularnav.addEventListener("keydown", function (e) {
        if (e.keyCode === 13) {  
            clickSet();
        }
    });

</script>
<style type="text/css">
    @-webkit-keyframes getcrossedpos {
        45% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 33%;
        }
        50% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 45%;
        }
        100% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            top: 45%;
        }
    }
    @keyframes getcrossedpos {
        45% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 33%;
        }
        50% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 45%;
        }
        100% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            top: 45%;
        }
    }
    @-webkit-keyframes straightenpos {
        0% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            top: 45%;
        }
        55% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 33%;
        }
        100% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 33%;
        }
    }
    @keyframes straightenpos {
        0% {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            top: 45%;
        }
        55% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 33%;
        }
        100% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 33%;
        }
    }
    @-webkit-keyframes getcrossedneg {
        45% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 60%;
        }
        50% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 45%;
        }
        100% {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            top: 45%;
        }
    }
    @keyframes getcrossedneg {
        45% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 60%;
        }
        50% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
            top: 45%;
        }
        100% {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            top: 45%;
        }
    }
    @font-face {
        font-family: "SSSocialCircle";
        src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/ss-social-circle.woff") format("woff");
        font-weight: normal;
        font-style: normal;
    }
    * {
        box-sizing: border-box;
    }

    .ss-icon {
        font-family: "SSSocialCircle";
        text-decoration: none;
        text-rendering: optimizeLegibility;
        -ms-font-feature-settings: "liga" 1;
        -o-font-feature-settings: "liga";
        -webkit-font-feature-settings: "liga";
        font-feature-settings: "liga";
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    nav {
        position: absolute;
        left: 43%;
        top: 33%;
        width: 7rem;
        height: 7rem;
        z-index: initial;
        line-height: 7rem;
        border-radius: 50%;
        -webkit-transition: .3s;
        transition: .3s;
        background: #f00;
        outline: none;
    }
    nav:hover, nav:focus {
        background: #333;
    }
    nav:before, nav:after, nav > span {
        position: absolute;
        left: 27%;
        content: "";
        display: block;
        width: 46%;
        top: 33%;
        height: 8%;
        background: #fff;
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transition: .5s;
        transition: .5s;
    }
    nav span {
        top: 46%;
    }
    nav:after {
        top: 60%;
    }
    nav.clicked:before {
        -webkit-animation: getcrossedpos .6s forwards;
        animation: getcrossedpos .6s forwards;
    }
    nav.clicked:after {
        -webkit-animation: getcrossedneg .6s forwards;
        animation: getcrossedneg .6s forwards;
    }
    nav.clicked span#center-bar {
        opacity: 0;
    }
    nav:hover {
        cursor: pointer;
    }
    nav.clicked {
        background: #000;
        outline: none;
    }
    nav a {
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        background: red;
        text-align: center;
        line-height: 1.5;
        color: #fff;
        text-decoration: none;
        position: absolute;
        font-size: 4rem;
        text-align: center;
        left: 1rem;
        top: 1rem;
        -webkit-transition: .4s;
        transition: .4s;
        z-index: -1;
    }
    nav a:hover, nav a:focus {
        background-color: #000;
    }
    nav a:nth-child(1) {
        -webkit-transform: rotate(-72deg);
        transform: rotate(-72deg);
    }
    nav.clicked a:nth-child(1) {
        -webkit-transform: rotate(-72deg) translateX(7rem) rotate(--72deg);
        transform: rotate(-72deg) translateX(7rem) rotate(--72deg);
    }
    nav a:nth-child(2) {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    nav.clicked a:nth-child(2) {
        -webkit-transform: rotate(0deg) translateX(7rem) rotate(-0deg);
        transform: rotate(0deg) translateX(7rem) rotate(-0deg);
    }
    nav a:nth-child(3) {
        -webkit-transform: rotate(72deg);
        transform: rotate(72deg);
    }
    nav.clicked a:nth-child(3) {
        -webkit-transform: rotate(72deg) translateX(7rem) rotate(-72deg);
        transform: rotate(72deg) translateX(7rem) rotate(-72deg);
    }
    nav a:nth-child(4) {
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg);
    }
    nav.clicked a:nth-child(4) {
        -webkit-transform: rotate(144deg) translateX(7rem) rotate(-144deg);
        transform: rotate(144deg) translateX(7rem) rotate(-144deg);
    }
    nav a:nth-child(5) {
        -webkit-transform: rotate(216deg);
        transform: rotate(216deg);
    }
    nav.clicked a:nth-child(5) {
        -webkit-transform: rotate(216deg) translateX(7rem) rotate(-216deg);
        transform: rotate(216deg) translateX(7rem) rotate(-216deg);
    }
    nav a:nth-child(6) {
        -webkit-transform: rotate(288deg);
        transform: rotate(288deg);
    }
    nav.clicked a:nth-child(6) {
        -webkit-transform: rotate(288deg) translateX(7rem) rotate(-288deg);
        transform: rotate(288deg) translateX(7rem) rotate(-288deg);
    }

</style>