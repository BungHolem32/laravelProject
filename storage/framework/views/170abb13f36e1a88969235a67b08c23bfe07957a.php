<nav class="nav-bar-tag container">
    <ul class="nav-bar-ul-element list-inline text-capitalize">
        <?php foreach($urls as $url): ?>
            <li class="nav-bar-li-element col-xs-2 text-center"><a href="<?php echo e($url); ?>"><?php echo e($url); ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>

