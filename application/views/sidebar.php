<div class="col-xs-12 col-sm-12 col-lg-4">
    <!-- start slidebar -->

    <aside class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
            <?php foreach($categories as $category){?>
                <li class="cat-item cat-item-1"><a href="blog/category_blog?id=<?php echo $category->category_id;?>"><?php echo $category->category_name;?></a></li>
            <?php }?>
        </ul>
    </aside>

    <aside class="widget widget_recent_entries">
        <h3 class="widget-title">Recent Posts</h3>
        <ul>
            <li><a href="http://ukieweb.com/envato/ukiecard/style1/blog.html#">Excepteur sint occaecat cupidatat non proident</a></li>
            <li><a href="http://ukieweb.com/envato/ukiecard/style1/blog.html#">Duis aute irure dolor in reprehenderit</a></li>
            <li><a href="http://ukieweb.com/envato/ukiecard/style1/blog.html#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</a></li>
        </ul>
    </aside>


    <aside class="widget widget_tag_cloud">
        <h3 class="widget-title">Tags</h3>
        <div class="tagcloud">
            <?php foreach($tags as $tag){?>
                <a href="blog/tag_blog?id=<?php echo $tag->tag_id;?>" class="hover-animate"><?php echo $tag->tag_name;?></a>
            <?php }?>
        </div>
    </aside>

    <!-- end slidebar -->
</div>