<?php if (!defined('THINK_PATH')) exit(); $config = D('Basic')->select(); $navs = D('Menu')->getBarMenus(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>" />
  <meta name="description" content="<?php echo ($config["description"]); ?>" />
  <link rel="stylesheet" href="/Public/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/Public/css/home/main.css" type="text/css" />
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="/">
          <img src="/Public/images/logo.png" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-left">
      <li><a href="/" <?php if($result['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
        <?php if(is_array($navs)): foreach($navs as $key=>$nav): ?><li><a href="/index.php?c=cat&{nav.menu_id}" <?php if($nav['menu_id'] == $result['catId']): ?>class="curr"<?php endif; ?>><?php echo ($nav["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</header>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-9">
        <div class="banner">
          <div class="banner-left">
            <a target="_blank" href="/index.php?c=detail&id=<?php echo ($result['topPicNews'][0]['news_id']); ?>"><img width="670px" height="360px" src="<?php echo ($result['topPicNews'][0]['thumb']); ?>" alt=""></a>
          </div>
          <div class="banner-right">
            <ul>
            <?php if(is_array($result['topSmailNews'])): $i = 0; $__LIST__ = $result['topSmailNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <a target="_blank" href="/index.php?c=detail&id={vo.news_id}"><img width="150" height="113" src="<?php echo ($vo["thumb"]); ?>" alt=""></a>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
              
            </ul>
          </div>
        </div>
        <div class="news-list">
          <dl>
            <dt>一个悲伤的故事，马云彻底被王兴抛弃了</dt>
            <dd class="news-img">
              <img src="/Public/images/img4.jpg" alt="">
            </dd>
            <dd class="news-intro">
              手段太刚猛，吃不消，美团这块肉，马云注定无福消遣。
            </dd>
            <dd class="news-info">
              秋远俊二 <span>15:22</span> 阅读(1万)
            </dd>
          </dl>
          <dl>
            <dt>一个悲伤的故事，马云彻底被王兴抛弃了</dt>
            <dd class="news-img">
              <img src="/Public/images/img4.jpg" alt="">
            </dd>
            <dd class="news-intro">
              手段太刚猛，吃不消，美团这块肉，马云注定无福消遣。
            </dd>
            <dd class="news-info">
              秋远俊二 <span>15:22</span> 阅读(1万)
            </dd>
          </dl>
          <dl>
            <dt>一个悲伤的故事，马云彻底被王兴抛弃了</dt>
            <dd class="news-img">
              <img src="/Public/images/img4.jpg" alt="">
            </dd>
            <dd class="news-intro">
              手段太刚猛，吃不消，美团这块肉，马云注定无福消遣。
            </dd>
            <dd class="news-info">
              秋远俊二 <span>15:22</span> 阅读(1万)
            </dd>
          </dl>
          <dl>
            <dt>一个悲伤的故事，马云彻底被王兴抛弃了</dt>
            <dd class="news-img">
              <img src="/Public/images/img4.jpg" alt="">
            </dd>
            <dd class="news-intro">
              手段太刚猛，吃不消，美团这块肉，马云注定无福消遣。
            </dd>
            <dd class="news-info">
              秋远俊二 <span>15:22</span> 阅读(1万)
            </dd>
          </dl>
        </div>
      </div>
      <!-- 文章右侧栏目 -->
        <div class="col-sm-3 col-md-3">
    <div class="right-title">
      <h3>文章排行</h3>
      <span>TOP ARTICLES</span>
    </div>
    <div class="right-content">
      <ul>
        <li class="num1 curr">
          <a href="">习近平谈气候变化</a>
          <div class="intro">
            中美双方应该不断挖掘合作潜力、培育合作亮点，加快双边投资协定谈判...
          </div>
        </li>
        <li class="num2"><a href="">普京回应俄战机被击落</a></li>
        <li class="num3"><a href="">普京回应俄战机被击落</a</li>
        <li class="num4"><a href="">普京回应俄战机被击落</a></li>
        <li class="num5"><a href="">普京回应俄战机被击落</a></li>
        <li class="num6"><a href="">普京回应俄战机被击落</a></li>
        <li class="num7"><a href="">普京回应俄战机被击落</a></li>
        <li class="num8"><a href="">普京回应俄战机被击落</a></li>
        <li class="num9"><a href="">普京回应俄战机被击落</a></li>
        <li class="num10"><a href="">普京回应俄战机被击落</a></li>
      </ul>
    </div>
    <div class="right-hot">
      <img src="/Public/images/img5.jpg" alt="">
    </div>
    <div class="right-hot">
      <img src="/Public/images/img6.jpg" alt="">
    </div>
  </div>
    </div>
  </div>
</section>
</body>
</html>