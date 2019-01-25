<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    <?php echo $__env->yieldContent('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"></link>
</head>
<body>
    <header>
        <nav class="my-navbar" style="box-shadow: 0 1px 10px 0 rgba(0,0,0,.5);">
            <a href="<?php echo e(route('home')); ?>" class="my-navbar-brand">ToDo App</a>
            <div class="my-navbar-control">
            <?php if(Auth::check()): ?>
                <span class="my-navbar-item">ようこそ, <?php echo e(Auth::user()->name); ?>さん</span>
                | 
                <a href="#" id="logout" class="my-navbar-itme">ログアウト</a>
                <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form" style="display:none;">
                <?php echo csrf_field(); ?>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="my-navbar-item">ログイン</a>
                |
                <a href="<?php echo e(route('register')); ?>" class="my-navbar-item">会員登録</a>
            <?php endif; ?>
            </div>
        </nav>
    </header>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
<?php if(Auth::check()): ?>
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
<?php endif; ?>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>