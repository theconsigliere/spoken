<?php

/**************************************************************
-> Additional image sizes and better defaults for WordPress's 
-> own sizes
**************************************************************/
add_image_size('placeholder', 30, 30, false);
add_image_size('small', 400, 400, false);
add_image_size('small-medium', 1000, 1000, false);
add_image_size('high-res', 3500, 3500, false);
update_option('thumbnail_size_w', 500);
update_option('thumbnail_size_h', 500);
update_option('thumbnail_crop', 1);
update_option('medium_size_w', 1500);
update_option('medium_size_h', 1500);
update_option('large_size_w', 2000);
update_option('large_size_h', 2000);