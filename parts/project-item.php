<a href="<?php echo $args['link']; ?>" class="project-item <?php echo $args['class']; ?>" id="">
  <?php echo $args['image']; ?>
  <div class="project-item__top ">
  <?php $none = ''; if (!$args['tag']) {$none = 'project-item__tag_none';} ?>
    <div class="project-item__tag <?php echo $none ?>"><span><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58782 5.76486C5.86104 5.38139 5.83055 4.97753 5.6411 4.25105C5.26641 2.81429 5.41561 2.02679 6.70728 1.09446L7.33773 0.639404L7.49021 1.40182C7.65226 2.21208 7.91839 2.71323 8.60171 3.6772C8.62886 3.71549 8.62886 3.71549 8.65612 3.75395C9.64041 5.14259 9.99992 5.97969 9.99992 7.49988C9.99992 9.34406 8.1356 10.9999 5.99992 10.9999C3.86412 10.9999 1.99992 9.34428 1.99992 7.49988C1.99992 7.46541 1.99995 7.46645 1.99411 7.3141C1.94893 6.13578 2.16682 5.21356 3.04845 4.21781C3.23473 4.00742 3.44646 3.80522 3.68473 3.61173L4.21073 3.18461L4.46375 3.81317C4.65071 4.27761 4.86977 4.64271 5.11722 4.91063C5.32681 5.13756 5.48229 5.42291 5.58782 5.76486Z" fill="#FD5E53" />
        </svg>
      </span><?php echo $args['tag']; ?></div>    
    <button class="project-item__favorite">
      <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1027 0.696073C13.1724 0.172464 14.1056 -1.53839e-06 15.5532 1.61018e-05C19.2579 0.0153583 22 3.13984 22 7.11988C22 10.1578 20.3062 13.0923 17.1512 15.9299C15.4951 17.4193 13.3807 18.8933 11.8664 19.6775L11 20.1261L10.1336 19.6775C8.61932 18.8933 6.50489 17.4193 4.84884 15.9299C1.69383 13.0923 0 10.1578 0 7.11988C0 3.09727 2.71644 0 6.45455 0C7.85028 0 8.83132 0.188775 9.92181 0.728134C10.3015 0.915918 10.6582 1.13866 10.99 1.39576C11.335 1.12339 11.7066 0.88993 12.1027 0.696073Z" fill="white" />
      </svg>

    </button>

  </div>
  <div class="project-item__heading">
    <div class="project-item__heading-one"><?php echo $args['headingOne']; ?></div>
    <div class="project-item__heading-two"><?php echo $args['headingTwo']; ?></div>

  </div>
  <div class="project-item__meta">
    <div class="project-item__meta-one"><?php echo $args['metaOne']; ?></div>
    <div class="project-item__meta-two"><?php echo $args['metaTwo']; ?></div>
  </div>

  <?php if ($args['rieltor']) :?>
  <div class="project-item-rieltor">
    <div class="project-item-rieltor__avatar"></div>
    <div class="project-item-rieltor__text">
      <small><?php echo $args['name']; ?></small>
      <small><?php echo $args['phone']; ?></small>
    </div>      
  </div>
  <?php endif;?>
</a>