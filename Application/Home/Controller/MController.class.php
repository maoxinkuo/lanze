<?php
// +----------------------------------------------------------------------
// | 74CMS [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://www.74cms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------
// | ModelName: 
// +----------------------------------------------------------------------
namespace Home\Controller;
use Common\Controller\FrontendController;
class MController extends FrontendController{
	public function index(){
		if(!I('get.org','','trim') && C('PLATFORM') == 'mobile' && $this->apply['Mobile']){
            redirect(build_mobile_url());
		}
        $type = I('get.type','android','trim');
        $android_download_url = C('qscms_android_download')?C('qscms_android_download'):'http://demo2.7yun.com/phone/apk/74cms.apk';
        $ios_download_url = C('qscms_ios_download')?C('qscms_ios_download'):'';
        $this->assign('android_download_url',$android_download_url);
        $this->assign('ios_download_url',$ios_download_url);
        $this->assign('type',$type);
        $this->display('M/'.$type);
    }
}
?>