<footer class="footer">
    <div class="container container-footer">
        <div class="col-lg-6 col-lg-push-3 col-md-6 col-md-push-3 col-sm-10 col-xs-10 column-footer">
            <div class="wrap-logo">
                <img src="<?php echo e(asset('img/jet.png')); ?>" alt="jblog logo" class="logo-footer">
            </div>
            <h1 class="description-site desc-footer">Welcome to the jblog</h1>
						<hr>
            <div class="s-social">
								<h3 class="description-site desc-footer">Our Social Page</h3>
								<br>
                <a href="https://facebook.com/jet774" class="url-social" target="_blank">
                    <i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/jetworld219" class="url-social" target="_blank">
                    <i class="fa fa-twitter"></i>
                </a>
								<a href="https://linkedin.com/in/jet774" class="url-social" target="_blank">
									<i class="fa fa-instagram"></i>
								</a>
								<a href="https://google.com/jet774" class="url-social" target="_blank">
									<i class="fa fa-google-plus"></i>
								</a>
								<a href="https://whatsapp.com/in/jet774" class="url-social" target="_blank">
									<i class="fa fa-whatsapp"></i>
								</a>
            </div>
            <br>
            <p class="text-copyright">Copyright ©Jetech Unlimited. 2018. All rights reserved </p>
        </div>
    </div>

</footer>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bs-animation.js')); ?>"></script>
<script src="<?php echo e(asset('js/stopExecutionOnTimeout.js')); ?>"></script>

<script>
    var items = document.querySelectorAll('.menuItem');

    for(var i = 0, l = items.length; i < l; i++) {if (window.CP.shouldStopExecution(1)){break;}
        items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";

        items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
    }
    window.CP.exitedLoop(1);


    document.querySelector('.center').onclick = function(e) {
        e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
    }

    //# sourceURL=pen.js
</script>
</body>

</html>