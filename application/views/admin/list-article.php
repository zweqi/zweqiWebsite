<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin table Examples</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <base href="<?php echo site_url(); ?>"/>
    <link rel="icon" type="image/png" href="assets/admin/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/admin/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="assets/admin/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/admin/css/admin.css">
<!--    <link rel="stylesheet" href="assets/admin/css/jquery.mobile-1.4.5.min.css">-->
    <style>
        #big-img-container{
            width: 400px;
            max-height: 400px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background: #fff;
            position: absolute;
            display: none;
            overflow: hidden;
            z-index: 100;
        }
        #big-img{
            width: 100%;
        }
        #loading{
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -16px;
            margin-top: -16px;
        }
    </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<?php include 'sidebar.php'; ?>

<!-- content start -->
<div class="admin-content">

    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">文章列表</strong> /
            <small>List article</small>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
                    <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
                    <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核
                    </button>
                    <button id="btn-delete" type="button" class="am-btn am-btn-default"><span
                            class="am-icon-trash-o"></span> 删除
                    </button>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
            <div class="am-form-group">
                <select id="categoryId" data-am-selected="{btnSize: 'sm'}">
                    <option value="-1">所有类别</option>
                    <?php
                        foreach($categories as $category){
                    ?>
                        <option value="<?php echo $category->category_id;?>"><?php echo $category->category_name;?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
            <div class="am-input-group am-input-group-sm">
                <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12">
            <form class="am-form">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-check"><input type="checkbox" id="checkAll"/></th>
                        <th class="table-id">ID</th>
                        <th class="table-author am-hide-sm-only">缩略图</th>
                        <th class="table-title">标题</th>
                        <th class="table-type">类型</th>
                        <th class="table-date am-hide-sm-only">修改日期</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($articles as $article) {
                        ?>
                        <tr>
                            <td><input type="checkbox" class="article-id" value="<?php echo $article->article_id; ?>"/>
                            </td>
                            <td><?php echo $article->article_id; ?></td>
                            <td><img class="img-thumb" src="<?php echo $article->img_src; ?>" data-src="<?php echo $article->img_src; ?>" alt="" width="100" height="100"></td>
                            <td><a href="#"><?php echo $article->title; ?></a></td>
                            <td class="am-hide-sm-only"></td>
                            <td class="am-hide-sm-only"><?php echo $article->add_time; ?></td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a href=""><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                class="am-icon-pencil-square-o"></span> 编辑</a>
                                        </button>
                                        <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span
                                                class="am-icon-copy"></span> 复制
                                        </button>
                                        <a href="admin/article/del_article?id=<?php echo $article->article_id;?>"><button id="delete" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                            <span class="am-icon-trash-o"></span> 删除</a>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="am-cf">
                    共 15 条记录
                    <div class="am-fr">
                        <ul class="am-pagination">
                            <li class="am-disabled"><a href="#">«</a></li>
                            <li class="am-active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <hr/>
                <p>注：.....</p>
            </form>
        </div>

    </div>
</div>
<!-- content end -->
</div>

<div id="big-img-container">
    <img src="" alt="" id="big-img">
    <img src="assets/admin/i/loading.gif" alt="" id="loading">
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu"
   data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/admin/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/admin/js/jquery.min.js"></script>
<!--<script src="assets/admin/js/jquery.mobile-1.4.5.min.js"></script>-->
<!--<![endif]-->
<script src="assets/admin/js/amazeui.min.js"></script>
<script src="assets/admin/js/app.js"></script>
<script src="assets/admin/js/util.js"></script>
<script>
    $(function () {
        $('#checkAll').on('click', function () {
            var that = this;
            $('.article-id').each(function (index, elem) {
                this.checked = that.checked;
            });
        });
        $('#btn-delete').on('click', function () {
            if (confirm('是否确定删除记录，不可恢复?!')) {
                var ids = "";
                $('.article-id:checked').each(function () {
                    ids += this.value + ',';//1,2,
                });
                ids = ids.substring(0, ids.length - 1);
                $.get('admin/article/delete?articleIds=' + ids, function (data) {
                    if (data == 'success') {
                        //location.href = 'admin/list-article';
                        location.reload();
                    } else {
                        alert('删除数据不成功，请重试!');
                    }
                }, 'text');
            }
        });
        $('#categoryId').on('change', function(){
            location.href = 'admin/article/get_category_articles/'+this.value;
        });

        /*$imgBig = $('#big-img-container');
        $('.img-thumb').hover(function(){
            var oImg = new Image();
            oImg.src = $(this).data('src');
            oImg.onload = function(){
                $('#loading').hide();
                $('#big-img').attr('src', this.src);
            };
            var thumbOffset = $(this).offset();
            $imgBig.css({
                left: thumbOffset.left + 200,
                top: thumbOffset.top - 50
            }).show();


        }, function(){
            $imgBig.hide();
        });*/

//        if(util.isMobile.any()){
//            $imgBig = $('#big-img-container');
//            $('.img-thumb').on('tap', function(){
//                alert('haha');
//            });
//        }
    });
</script>
</body>
</html>
