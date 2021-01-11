
<header class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="header">
        <a href="/" class="logo">
          <img srcset="<?php echo get_template_directory_uri()?>/dist/images/logo/logo.png, <?php echo get_template_directory_uri()?>/dist/images/logo/logo@2x.png 2x" src="<?php echo get_template_directory_uri()?>/dist/images/logo/logo.png" alt="">
        </a>
        <nav>
          <?php wp_nav_menu([
						'container_class' => 'primary-menu'
					]); ?>
        </nav>
        <div class="header__right">
        <a href="#" class="favorite">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.1027 2.69607C14.1724 2.17246 15.1056 2 16.5532 2.00002C20.2579 2.01536 23 5.13984 23 9.11988C23 12.1578 21.3062 15.0923 18.1512 17.9299C16.4951 19.4193 14.3807 20.8933 12.8664 21.6775L12 22.1261L11.1336 21.6775C9.61932 20.8933 7.50489 19.4193 5.84884 17.9299C2.69383 15.0923 1 12.1578 1 9.11988C1 5.09727 3.71644 2 7.45455 2C8.85028 2 9.83132 2.18878 10.9218 2.72813C11.3015 2.91592 11.6582 3.13866 11.99 3.39576C12.335 3.12339 12.7066 2.88993 13.1027 2.69607Z" fill="#FD5E53"/>
          </svg>
        </a>
        <div class="phone">
          +7 (3452) 58-98-81
        </div>
        </div>

      </div>      
    </div>
  </div>
</header>

