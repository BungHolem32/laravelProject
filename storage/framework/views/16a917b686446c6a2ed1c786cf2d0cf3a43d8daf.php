<!doctype html>
<html lang="en">
<head>

    <?php /*HEADER */ ?>
    <?php echo $__env->make('_layout._head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php /*TITLE PAGE*/ ?>
    <title>
        <?php if (! empty(trim($__env->yieldContent('title')))): ?>
        <?php echo $__env->yieldContent('title'); ?>
        <?php else: ?>
            My App Without Name
        <?php endif; ?>
    </title>

    <?php /*HEADER DYNAMIC*/ ?>
    <?php $__env->startSection('head'); ?><?php echo $__env->yieldSection(); ?>

    <?php /*TOP SCRIPT*/ ?>
    <?php echo $__env->yieldPushContent('top-script'); ?>
</head>
<body>
<div class="wrapper container-fluid no-padding">
    <?php /*HEADER*/ ?>
    <header class="header-part-wrapper container">
        <?php echo $__env->make('_partials._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </header>


    <?php /*NAVBAR*/ ?>
    <section class="nav-bar-wrapper ">
        <?php echo $__env->make('_partials._nav-bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </section>


    <?php /*CONTENT*/ ?>
    <main class="main-content container">
        <div class="aside-wrapper"></div>

        <?php $__env->startSection('content'); ?>
        <?php echo $__env->yieldSection(); ?>
    </main>


    <?php /*FOOTER*/ ?>
    <footer class="footer-part-wrapper container">
        <?php echo $__env->make('_layout._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </footer>


    <?php /*BOTTOM SCRIPT*/ ?>
    <?php echo $__env->yieldPushContent('bottom-script'); ?>
</div>
</body>
</html>