<?php $__env->startSection('title', 'Coffee Shop'); ?>

<?php $__env->startSection('content'); ?>

<div id="container" class="col-md-12">
    <img src="/img/coffeeshoplogopng.png"style="height: 400px; margin-top: 70px">
    <div class="linha"></div>
</div>
<div id="sobre-container" class="col-md-12">
    <h1>Sobre</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Consequuntur recusandae nesciunt velit dicta fugiat laborum. 
        Quam, reiciendis inventore. 
        Nam eius et non quaerat ab quos animi quis esse excepturi similique. 
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Quidem, tempore. Sunt voluptates pariatur cupiditate est officia laboriosam sapiente. 
        Adipisci officiis quia dolores repellendus error numquam illo blanditiis dolorum nihil aliquid? Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Praesentium magnam pariatur officiis non quam dolorum iure architecto accusamus animi facilis? 
        Repudiandae eaque ratione cum dolore? Quas beatae dicta voluptas itaque? Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
        Alias animi quam officia magnam deserunt perferendis odio velit rem asperiores vel excepturi voluptates nostrum, quia molestiae? 
        Quo iure omnis quos perspiciatis.
    </p>
</div>
<section class="socialMedia" id="contato">
    <h1 class="tit">Contato</h1>
    <ul class="sci">
            <li data-text="Facebook" data-color="#1877f2">
                <a href="https://www.facebook.com/joaovictor.lizdasilveira/" target="_blank" rel="external" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li data-text="GitHub" data-color="#ff0000">
                <a href="https://github.com/BaronSatoshi" target="_blank" rel="external" class="github"><i class="fa fa-github" aria-hidden="true"></i></a>
            </li>
            <li data-text="Linkedin" data-color="#0099ff">
                <a href="https://www.linkedin.com/in/joão-victor-liz-da-silveira-b347a71b5/"  target="_blank" rel="external" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </li>
            <li data-text="Instagram" data-color="#e4405f">
                <a href="https://www.instagram.com/joaovc_liz/"  target="_blank" rel="external" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
        </ul>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\loja\coffeeShop\resources\views/welcome.blade.php ENDPATH**/ ?>