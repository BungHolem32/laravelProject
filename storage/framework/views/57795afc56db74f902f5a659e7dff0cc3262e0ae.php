<?php $__env->startSection('title','About Page'); ?>

<?php $__env->startSection('content'); ?>

    <section class="about-page">
        <header class="title">
            <h2>about title</h2>
        </header>

        <p class="content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cum deserunt doloremque dolores doloribus
            dolorum excepturi fuga harum hic iure laborum magnam magni repellat rerum sequi sint sunt ut, vel!

        </p>

    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout._html', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>