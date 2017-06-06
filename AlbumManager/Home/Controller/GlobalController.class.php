<?php
namespace Home\Controller;
use Think\Controller;
class GlobalController extends WebAuthorityController {
	public function globalinfo(){
		$globalinfo=D('myalbum');
		$frist_row=$globalinfo;
		$this->assign('albumname',$albumname);
		$this->assign('simpleinfo',$simpleinfo);
		$this->assign('albumowner',$albumowner);
		$this->assign('musicsource',$musicsource);
		$this->assign('twitteraddr',$twitteraddr);
		$this->assign('facebookaddr',$copyright);
		$this->display();
	}
}