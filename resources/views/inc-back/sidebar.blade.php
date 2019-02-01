<div class="o-page__sidebar js-page-sidebar">
    <aside class="c-sidebar">

        <!-- Scrollable -->
        <div class="c-sidebar__body">
            <span class="c-sidebar__title">Dashboard</span>
            <ul class="c-sidebar__list">  
							<li>
									<a class="c-sidebar__link" href="{{ route('home') }}">
											<i class="c-sidebar__icon feather icon-settings"></i>Dashboard
									</a>
							</li>
            </ul>
						<span class="c-sidebar__title">Blog</span>
						<span class="c-sidebar__title text-center">Users</span>
						<br>
						<ul class="c-sidebar__list">
							<li>
									<a class="c-sidebar__link" href="{{ route('index_front') }}">
											<i class="c-sidebar__icon feather icon-anchor"></i>All Posts
									</a>
							</li>
						</ul>
						@if(auth()->user()->admin)
						<span class="c-sidebar__title text-center">Admin</span>
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link" href="{{ route('post.create') }}">
                        <i class="c-sidebar__icon feather icon-edit"></i>New Post
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link" href="{{ route('post.index') }}">
                        <i class="c-sidebar__icon feather icon-anchor"></i>All Posts
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link" href="{{ route('trashed_posts') }}">
                        <i class="c-sidebar__icon feather icon-trash"></i>Posts Trash
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link" href="{{ route('category.create') }}">
                        <i class="c-sidebar__icon feather icon-book"></i>Categories
                    </a>
                </li>
                <li>
                    <a class="c-sidebar__link" href="{{ route('tags.create') }}">
                        <i class="c-sidebar__icon feather icon-tag"></i>Tags
                    </a>
                </li>
								<li>
										<a class="c-sidebar__link" href="{{ route('users.index') }}">
												<i class="c-sidebar__icon feather icon-user-plus"></i>Users
										</a>
								</li>
            </ul>
						@endif
            <span class="c-sidebar__title">Settings</span>
            <ul class="c-sidebar__list">
                {{--  <li>
                    <a class="c-sidebar__link" href="">
                        <i class="c-sidebar__icon feather icon-settings"></i>General
                    </a>
                </li>  --}}
                <li>
                    <a class="c-sidebar__link" href="{{ route('show_profile') }}">
                        <i class="c-sidebar__icon feather icon-user"></i>My Profile
                    </a>
                </li>
            </ul>

        </div>


        <a class="c-sidebar__footer" href="{{ route('logout') }}">
            Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
        </a>
    </aside>
</div>