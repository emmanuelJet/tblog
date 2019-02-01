<div class="o-page__sidebar js-page-sidebar">
    <aside class="c-sidebar">

        <!-- Scrollable -->
        <div class="c-sidebar__body">
            <span class="c-sidebar__title">Dash</span>
            <ul class="c-sidebar__list">
                <?php if(auth()->user()->admin): ?>
                    <li>
                        <a class="c-sidebar__link" href="<?php echo e(route('home')); ?>">
                            <i class="c-sidebar__icon feather icon-hash"></i>Dashboard
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <span class="c-sidebar__title">Blog</span>
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link" href="<?php echo e(route('post.create')); ?>">
                        <i class="c-sidebar__icon feather icon-edit"></i>New post
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link" href="<?php echo e(route('post.index')); ?>">
                        <i class="c-sidebar__icon feather icon-anchor"></i>all posts
                    </a>
                </li>
                <?php if( auth()->user()->admin): ?>
                <li>
                    <a class="c-sidebar__link" href="<?php echo e(route('trashed_posts')); ?>">
                        <i class="c-sidebar__icon feather icon-trash"></i>Posts Trash
                    </a>
                </li>
                <?php endif; ?>

                <li>
                    <a class="c-sidebar__link" href="<?php echo e(route('category.create')); ?>">
                        <i class="c-sidebar__icon feather icon-book"></i>Categories
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link" href="<?php echo e(route('tags.create')); ?>">
                        <i class="c-sidebar__icon feather icon-tag"></i>Tags
                    </a>
                </li>
            </ul>
            <span class="c-sidebar__title">Settings</span>
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link" href="">
                        <i class="c-sidebar__icon feather icon-settings"></i>General
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link" href="<?php echo e(route('show_profile')); ?>">
                        <i class="c-sidebar__icon feather icon-user"></i>my profile
                    </a>
                </li>
            <?php if( auth()->user()->admin): ?>
                    <li>
                        <a class="c-sidebar__link" href="<?php echo e(route('users.index')); ?>">
                            <i class="c-sidebar__icon feather icon-user-plus"></i>Users
                        </a>
                    </li>
            <?php endif; ?>
            </ul>

        </div>


        <a class="c-sidebar__footer" href="<?php echo e(route('logout')); ?>">
            Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
        </a>
    </aside>
</div>