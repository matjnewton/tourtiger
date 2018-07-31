<?php if(have_rows('body_snippets', 'option')): ?>
                        
<?php while(have_rows('body_snippets', 'option')): the_row(); ?>
                           
<?php $snippet = get_sub_field('snippet'); ?>
<?php if($snippet):
echo $snippet;                             
endif; ?>
                                   
<?php endwhile; ?> 
                        
<?php endif; ?>