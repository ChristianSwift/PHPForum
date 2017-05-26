<?php
namespace Home\Controller;
use Think\Controller;
class AjaxController extends Controller {
    public function index(){
        $ajax_response = array();
      	$ajax_response['code'] = 403;
      	$ajax_response['message'] = 'Parameter missing ...';
      	$this->ajaxReturn($ajax_response,'xml');
    }
  	public function getinfo(){
    	if ($_SERVER['REQUEST_METHOD']!="POST") {
        	$ajax_response = array();
      		$ajax_response['code'] = 405;
      		$ajax_response['message'] = 'You need to request in POST mode ...';
          $this->ajaxReturn($ajax_response,'xml');
      }
      switch($_POST['act']) {
         case "thumb":
           $ajax_response = array();
           $ajax_response['code'] = 403;
           $ajax_response['message'] = 'This is a option that is still in development, please try again later.';
           $this->ajaxReturn($ajax_response,'xml');
           break;
         case "full":
           $ajax_handle=D('myalbum');
           $ajax_result=$ajax_handle->select();
           if ($ajax_result) {
            $this->ajaxReturn($ajax_result,'xml');
           }
           else {
             $ajax_response = array();
             $ajax_response['code'] = 500;
             $ajax_response['message'] = 'Could not fetch your database server, please check your database server configure ...';
             $this->ajaxReturn($ajax_response,'xml');
           }
           break;
         default:
          $ajax_response = array();
          $ajax_response['code'] = 403;
      	  $ajax_response['message'] = 'Your request is unavailable ...';
         	$this->ajaxReturn($ajax_response,'xml');
          break;
       }
    }
  	public function postmsg() {
      if($_SERVER['REQUEST_METHOD']!="POST") {
      	$ajaxcmt_results = array();
      	$ajaxcmt_results['code'] = 405;
      	$ajaxcmt_results['info'] = 'You need to request in POST mode ...';
      	$this->ajaxReturn($ajaxcmt_results,'xml');
      }
      if($_POST['name'] == '' || $_POST['ctu'] == '' || $_POST['message'] == '') {
       	$ajaxcmt_results = array();
      	$ajaxcmt_results['code'] = 403;
      	$ajaxcmt_results['info'] = 'Please make sure to provide required values ...';
      	$this->ajaxReturn($ajaxcmt_results,'xml');
      }
      $name=$_POST['name'];
      $ctu=$_POST['ctu'];
      $message=$_POST['message'];
      $cmt_info = array();
      $cmt_info['name'] = $name;
      $cmt_info['contact'] = $ctu;
      $cmt_info['message'] = $message;
      $cmt_info['pushtime'] = date('Y-m-d h:i:s');
      $comments_handle=M('myalbum_comments');
      $cmt_result=$comments_handle->add($cmt_info);
      if($cmt_result) {
        $cmt_results = array();
      	$cmt_results['code'] = 200;
      	$cmt_results['info'] = 'User reply successfully.';
      	$this->ajaxReturn($cmt_results,'xml');
      }
      else {
        $cmt_results = array();
      	$cmt_results['code'] = 500;
      	$cmt_results['info'] = 'Could not fetch your database server, please check your database server configure ...';
      	$this->ajaxReturn($cmt_results,'xml');
      }
    }
  	public function upload() {
      if($_SERVER['REQUEST_METHOD']!="POST") {
      	$upload_results = array();
      	$upload_results['code'] = 405;
      	$upload_results['info'] = 'You need to request in POST mode ...';
      	$this->ajaxReturn($upload_results,'xml');
      }
      if($_POST['full_url'] == '' || $_POST['thumb_url'] == '' || $_POST['img_description'] == '' || $_POST['upload_time'] == '') {
       	$upload_results = array();
      	$upload_results['code'] = 403;
      	$upload_results['info'] = 'Please make sure to provide required values ...';
      	$this->ajaxReturn($upload_results,'xml');
      }
      $furl=$_POST['full_url'];
      $turl=$_POST['thumb_url'];
      $dinfo=$_POST['img_description'];
      $mtime=$_POST['upload_time'];
      $picdata = array();
      $picdata['furl'] = $furl;
      $picdata['turl'] = $turl;
      $picdata['dinfo'] = $dinfo;
      $picdata['mtime'] = $mtime;
      $upload_handle=M('myalbum');
      $upload_result=$upload_handle->add($picdata);
      if($upload_result) {
        $upload_results = array();
      	$upload_results['code'] = 200;
      	$upload_results['info'] = 'User reply successfully.';
      	$this->ajaxReturn($upload_results,'xml');
      }
      else {
        $upload_results = array();
      	$upload_results['code'] = 500;
      	$upload_results['info'] = 'Could not fetch your database server, please check your database server configure ...';
      	$this->ajaxReturn($upload_results,'xml');
      }
    }
  	public function remove() {
      if($_SERVER['REQUEST_METHOD']!="POST") {
      	$upload_results = array();
      	$upload_results['code'] = 405;
      	$upload_results['info'] = 'You need to request in POST mode ...';
      	$this->ajaxReturn($upload_results,'xml');
      }
      if($_POST['id'] == '' || $_POST['type'] == '') {
       	$upload_results = array();
      	$upload_results['code'] = 403;
      	$upload_results['info'] = 'Please make sure to provide required values ...';
      	$this->ajaxReturn($upload_results,'xml');
      }
      switch($_POST['type']) {
        case "photo":
          $id=$_POST['id'];
          $sql_handle=M('myalbum');
          $del_result=$sql_handle->where('id='.$id)->delete();
          if($del_result) {
          	$del_results = array();
      		$del_results['code'] = 200;
      		$del_results['info'] = 'Photo remove successfully.';
      		$this->ajaxReturn($del_results,'xml');
          }
          else {
          	$del_results = array();
      		$del_results['code'] = 500;
      		$del_results['info'] = 'Photo remove failed.';
      		$this->ajaxReturn($del_results,'xml');
          }
          break;
        case "comment":
          $id=$_POST['id'];
          $sql_handle=M('myalbum_comments');
          $del_result=$sql_handle->where('cid='.$id)->delete();
          if($del_result) {
          	$del_results = array();
      		$del_results['code'] = 200;
      		$del_results['info'] = 'Comment remove successfully.';
      		$this->ajaxReturn($del_results,'xml');
          }
          else {
          	$del_results = array();
      		$del_results['code'] = 500;
      		$del_results['info'] = 'Comment remove failed.';
      		$this->ajaxReturn($del_results,'xml');
          }
          break;
        default:
          $upload_results = array();
      	  $upload_results['code'] = 403;
      	  $upload_results['info'] = 'Please make sure to provide required values ...';
      	  $this->ajaxReturn($upload_results,'xml');
          break;
      }
    }
    public function getcmts() {
      if(!isset($_COOKIE['myalbum_uid']) || $_COOKIE['myalbum_uid'] == '' || !isset($_COOKIE['myalbum_token']) || $_COOKIE['myalbum_token'] == ''){
      	  $this->error('您没有登陆，正在跳转到登录页。',__ROOT__.'/admin.php?c=Login'); //尚未登录时跳回登录页面，防止URL输入恶意访问后台管理系统
	  }
      if($_SERVER['REQUEST_METHOD']!="POST") {
          $gcmt_results = array();
          $gcmt_results['code'] = 405;
          $gcmt_results['info'] = 'You need to request in POST mode ...';
          $this->ajaxReturn($gcmt_results,'xml');
      }
      if($_POST['act'] == '') {
        $gcmt_results = array();
        $gcmt_results['code'] = 403;
        $gcmt_results['info'] = 'Please make sure to provide required values ...';
        $this->ajaxReturn($gcmt_results,'xml');
      }
      switch($_POST['act']) {
         case "thumb":
           $ajax_response = array();
           $ajax_response['code'] = 403;
           $ajax_response['message'] = 'This is a option that is still in development, please try again later.';
           $this->ajaxReturn($ajax_response,'xml');
           break;
         case "full":
           $ajax_handle=D('myalbum_comments');
           $ajax_result=$ajax_handle->select();
           if ($ajax_result) {
            $this->ajaxReturn($ajax_result,'xml');
           }
           else {
             $ajax_response = array();
             $ajax_response['code'] = 500;
             $ajax_response['message'] = 'Could not fetch your database server, please check your database server configure ...';
             $this->ajaxReturn($ajax_response,'xml');
           }
           break;
         default:
          $ajax_response = array();
          $ajax_response['code'] = 403;
          $ajax_response['message'] = 'Your request is unavailable ...';
          $this->ajaxReturn($ajax_response,'xml');
          break;
        }
    }
}