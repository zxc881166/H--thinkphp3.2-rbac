<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function index() {

		    $article = D('Article');
		    $article_cate = D('article_cate');
		    $cate = $article_cate -> select();
		    $count = M('article')->count();
        $p = getpage($count, 6);
		    $show = $p -> show();		
        $list = $article->page(I('get.p'))->join('web_article_cate ON web_article_cate.cate_id = web_article.cate_id') -> order('a_id desc')-> limit(6)->select();
       	$this -> assign('list', $list);
       	$this -> assign('page', $show);
        $this->display();
    }

}
