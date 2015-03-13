<?php
/**
 * 常用工具类
 * author Lee.
 * Last modify $Date: 2012-8-23
 */
class Tool {
    /**
     * js 弹窗并且跳转
     * @param string $_info
     * @param string $_url
     * @return js
     */
    static public function alertLocation($_info, $_url) {
        echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
        exit();
    }

    /**
     * js 弹窗返回
     * @param string $_info
     * @return js
     */
    static public function alertBack($_info) {
        echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
        exit();
    }

    /**
     * 页面跳转
     * @param string $url
     * @return js
     */
    static public function headerUrl($url) {
        echo "<script type='text/javascript'>location.href='{$url}';</script>";
        exit();
    }

    /**
     * 弹窗关闭
     * @param string $_info
     * @return js
     */
    static public function alertClose($_info) {
        echo "<script type='text/javascript'>alert('$_info');close();</script>";
        exit();
    }

    /**
     * 弹窗
     * @param string $_info
     * @return js
     */
    static public function alert($_info) {
        echo "<script type='text/javascript'>alert('$_info');</script>";
        exit();
    }

    /**
     * 系统基本参数上传图片专用
     * @param string $_path
     * @return null
     */
    static public function sysUploadImg($_path) {
        echo '<script type="text/javascript">document.getElementById("logo").value="'.$_path.'";</script>';
        echo '<script type="text/javascript">document.getElementById("pic").src="'.$_path.'";</script>';
        echo '<script type="text/javascript">$("#loginpop1").hide();</script>';
        echo '<script type="text/javascript">$("#bgloginpop2").hide();</script>';
    }
    /**
     * 清理session
     */
    static public function clearSession() {
        if (session_start()) {
            session_destroy();
        }
    }

    /**
     * 验证是否为空
     * @param string $str
     * @param string $name
     * @return bool (true or false)
     */
    static function validateEmpty($str, $name) {
        if (empty($str)) {
            self::alertBack('警告：' .$name . '不能为空！');
        }
    }

    /**
     * 验证是否相同
     * @param string $str1
     * @param string $str2
     * @param string $alert
     * @return JS
     */
    static function validateAll($str1, $str2, $alert) {
        if ($str1 != $str2) self::alertBack('警告：' .$alert);
    }

    /**
     * 验证ID
     * @param Number $id
     * @return JS
     */
    static function validateId($id) {
        if (empty($id) || !is_numeric($id)) self::alertBack('警告：参数错误！');
    }

    /**
     * 格式化字符串
     * @param string $str
     * @return string
     */
    static public function formatStr($str) {
        $arr = array(' ', '	', '&', '@', '#', '%',  '\'', '"', '\\', '/', '.', ',', '$', '^', '*', '(', ')', '[', ']', '{', '}', '|', '~', '`', '?', '!', ';', ':', '-', '_', '+', '=');
        foreach ($arr as $v) {
            $str = str_replace($v, '', $str);
        }
        return $str;
    }

    /**
     * 格式化时间
     * @param int $time 时间戳
     * @return string
     */
    static public function formatDate($time='default') {
        $date = $time == 'default' ? date('Y-m-d H:i:s', time()) : date('Y-m-d H:i:s', $time);
        return $date;
    }

    /**
     * 获得真实IP地址
     * @return string
     */
    static public function realIp() {
        static $realip = NULL;
        if ($realip !== NULL) return $realip;
        if (isset($_SERVER)) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                foreach ($arr AS $ip) {
                    $ip = trim($ip);
                    if ($ip != 'unknown') {
                        $realip = $ip;
                        break;
                    }
                }
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                if (isset($_SERVER['REMOTE_ADDR'])) {
                    $realip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $realip = '0.0.0.0';
                }
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }
        preg_match('/[\d\.]{7,15}/', $realip, $onlineip);
        $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
        return $realip;
    }

    /**
     * 加载 Smarty 模板
     * @param string $html
     * @return null;
     */
    static public function display() {
        global $tpl;$html = null;
        $htmlArr = explode('/', $_SERVER[SCRIPT_NAME]);
        $html = str_ireplace('.php', '.html', $htmlArr[count($htmlArr)-1]);
        $dir = dirname($_SERVER[SCRIPT_NAME]);
        $firstStr = substr($dir, 0, 1);
        $endStr = substr($dir, strlen($dir)-1, 1);
        if ($firstStr == '/' || $firstStr == '\\') $dir = substr($dir, 1);
        if ($endStr != '/' || $endStr != '\\') $dir = $dir . '/';
        $tpl->display($dir.$html);
    }

    /**
     * 创建目录
     * @param string $dir
     */
    static public function createDir($dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0777);
        }
    }

    /**
     * 创建文件（默认为空）
     * @param unknown_type $filename
     */
    static public function createFile($filename) {
        if (!is_file($filename)) touch($filename);
    }

    /**
     * 正确获取变量
     * @param string $param
     * @param string $type
     * @return string
     */
    static public function getData($param, $type='post') {
        $type = strtolower($type);
        if ($type=='post') {
            return Tool::mysqlString(trim($_POST[$param]));
        } elseif ($type=='get') {
            return Tool::mysqlString(trim($_GET[$param]));
        }
    }

    /**
     * 删除文件
     * @param string $filename
     */
    static public function delFile($filename) {
        if (file_exists($filename)) unlink($filename);
    }

    /**
     * 删除目录
     * @param string $path
     */
    static public function delDir($path) {
        if (is_dir($path)) rmdir($path);
    }

    /**
     * 删除目录及地下的全部文件
     * @param string $dir
     * @return bool
     */
    static public function delDirOfAll($dir) {
        //先删除目录下的文件：
        if (is_dir($dir)) {
            $dh=opendir($dir);
            while (!!$file=readdir($dh)) {
                if($file!="." && $file!="..") {
                    $fullpath=$dir."/".$file;
                    if(!is_dir($fullpath)) {
                        unlink($fullpath);
                    } else {
                        self::delDirOfAll($fullpath);
                    }
                }
            }
            closedir($dh);
            //删除当前文件夹：
            if(rmdir($dir)) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * 验证登陆
     */
    static public function validateLogin() {
        if (empty($_SESSION['admin']['user'])) header('Location:/admin/');
    }

    /**
     * 给已经存在的图片添加水印
     * @param string $file_path
     * @return bool
     */
    static public function addMark($file_path) {
        if (file_exists($file_path) && file_exists(MARK)) {
            //求出上传图片的名称后缀
            $ext_name = strtolower(substr($file_path, strrpos($file_path, '.'), strlen($file_path)));
            //$new_name='jzy_' . time() . rand(1000,9999) . $ext_name ;
            $store_path = ROOT_PATH . UPDIR;
            //求上传图片高宽
            $imginfo = getimagesize($file_path);
            $width = $imginfo[0];
            $height = $imginfo[1];
            //添加图片水印
            switch($ext_name) {
                case '.gif':
                    $dst_im = imagecreatefromgif($file_path);
                    break;
                case '.jpg':
                    $dst_im = imagecreatefromjpeg($file_path);
                    break;
                case '.png':
                    $dst_im = imagecreatefrompng($file_path);
                    break;
            }
            $src_im = imagecreatefrompng(MARK);
            //求水印图片高宽
            $src_imginfo = getimagesize(MARK);
            $src_width = $src_imginfo[0];
            $src_height = $src_imginfo[1];
            //求出水印图片的实际生成位置
            $src_x = $width - $src_width - 10;
            $src_y = $height - $src_height - 10;
            //新建一个真彩色图像
            $nimage = imagecreatetruecolor($width, $height);
            //拷贝上传图片到真彩图像
            imagecopy($nimage, $dst_im, 0, 0, 0, 0, $width, $height);
            //按坐标位置拷贝水印图片到真彩图像上
            imagecopy($nimage, $src_im, $src_x, $src_y, 0, 0, $src_width, $src_height);
            //分情况输出生成后的水印图片
            switch($ext_name) {
                case '.gif':
                    imagegif($nimage, $file_path);
                    break;
                case '.jpg':
                    imagejpeg($nimage, $file_path);
                    break;
                case '.png':
                    imagepng($nimage, $file_path);
                    break;
            }
            //释放资源
            imagedestroy($dst_im);
            imagedestroy($src_im);
            unset($imginfo);
            unset($src_imginfo);
            //移动生成后的图片
            @move_uploaded_file($file_path, ROOT_PATH.UPDIR . $file_path);
        }
    }

    /**
     *  中文截取2，单字节截取模式
     * @access public
     * @param string $str  需要截取的字符串
     * @param int $slen  截取的长度
     * @param int $startdd  开始标记处
     * @return string
     */
    static public function cn_substr($str, $slen, $startdd=0){
        $cfg_soft_lang = PAGECHARSET;
        if($cfg_soft_lang=='utf-8') {
            return self::cn_substr_utf8($str, $slen, $startdd);
        }
        $restr = '';
        $c = '';
        $str_len = strlen($str);
        if($str_len < $startdd+1) {
            return '';
        }
        if($str_len < $startdd + $slen || $slen==0) {
            $slen = $str_len - $startdd;
        }
        $enddd = $startdd + $slen - 1;
        for($i=0;$i<$str_len;$i++) {
            if($startdd==0) {
                $restr .= $c;
            } elseif($i > $startdd) {
                $restr .= $c;
            }
            if(ord($str[$i])>0x80) {
                if($str_len>$i+1) {
                    $c = $str[$i].$str[$i+1];
                }
                $i++;
            } else {
                $c = $str[$i];
            }
            if($i >= $enddd) {
                if(strlen($restr)+strlen($c)>$slen) {
                    break;
                } else {
                    $restr .= $c;
                    break;
                }
            }
        }
        return $restr;
    }

    /**
     *  utf-8中文截取，单字节截取模式
     *
     * @access public
     * @param string $str 需要截取的字符串
     * @param int $slen 截取的长度
     * @param int $startdd 开始标记处
     * @return string
     */
    static public function cn_substr_utf8($str, $length, $start=0) {
        if(strlen($str) < $start+1) {
            return '';
        }
        preg_match_all("/./su", $str, $ar);
        $str = '';
        $tstr = '';
        //为了兼容mysql4.1以下版本,与数据库varchar一致,这里使用按字节截取
        for($i=0; isset($ar[0][$i]); $i++) {
            if(strlen($tstr) < $start) {
                $tstr .= $ar[0][$i];
            } else {
                if(strlen($str) < $length + strlen($ar[0][$i]) ) {
                    $str .= $ar[0][$i];
                } else {
                    break;
                }
            }
        }
        return $str;
    }

    /**
     * 删除图片，根据图片ID
     * @param int $image_id
     */
    static function delPicByImageId($image_id) {
        $db_name = PREFIX . 'images i';
        $m = new Model();
        $data = $m->getOne($db_name, "i.id={$image_id}", "i.path as p, i.big_img as b, i.small_img as s");
        foreach ($data as $v) {
            @self::delFile(ROOT_PATH . $v['p']);
            @self::delFile(ROOT_PATH . $v['b']);
            @self::delFile(ROOT_PATH . $v['s']);
        }
        $m->del(PREFIX . 'images', "id={$image_id}");
        unset($m);
    }

    /**
     * 图片等比例缩放
     * @param resource $im    新建图片资源(imagecreatefromjpeg/imagecreatefrompng/imagecreatefromgif)
     * @param int $maxwidth   生成图像宽
     * @param int $maxheight  生成图像高
     * @param string $name    生成图像名称
     * @param string $filetype文件类型(.jpg/.gif/.png)
     */
    static public function resizeImage($im, $maxwidth, $maxheight, $name, $filetype) {
        $pic_width = imagesx($im);
        $pic_height = imagesy($im);
        if(($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight)) {
            if($maxwidth && $pic_width>$maxwidth) {
                $widthratio = $maxwidth/$pic_width;
                $resizewidth_tag = true;
            }
            if($maxheight && $pic_height>$maxheight) {
                $heightratio = $maxheight/$pic_height;
                $resizeheight_tag = true;
            }
            if($resizewidth_tag && $resizeheight_tag) {
                if($widthratio<$heightratio)
                    $ratio = $widthratio;
                else
                    $ratio = $heightratio;
            }
            if($resizewidth_tag && !$resizeheight_tag)
                $ratio = $widthratio;
            if($resizeheight_tag && !$resizewidth_tag)
                $ratio = $heightratio;
            $newwidth = $pic_width * $ratio;
            $newheight = $pic_height * $ratio;
            if(function_exists("imagecopyresampled")) {
                $newim = imagecreatetruecolor($newwidth,$newheight);
                imagecopyresampled($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
            } else {
                $newim = imagecreate($newwidth,$newheight);
                imagecopyresized($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
            }
            $name = $name.$filetype;
            imagejpeg($newim,$name);
            imagedestroy($newim);
        } else {
            $name = $name.$filetype;
            imagejpeg($im,$name);
        }
    }

    /**
     * 下载文件
     * @param string $file_path 绝对路径
     */
    static public function downFile($file_path) {
        //判断文件是否存在
        $file_path = iconv('utf-8', 'gb2312', $file_path); //对可能出现的中文名称进行转码
        if (!file_exists($file_path)) {
            exit('文件不存在！');
        }
        $file_name = basename($file_path); //获取文件名称
        $file_size = filesize($file_path); //获取文件大小
        $fp = fopen($file_path, 'r'); //以只读的方式打开文件
        header("Content-type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: {$file_size}");
        header("Content-Disposition: attachment;filename={$file_name}");
        $buffer = 1024;
        $file_count = 0;
        //判断文件是否结束
        while (!feof($fp) && ($file_size-$file_count>0)) {
            $file_data = fread($fp, $buffer);
            $file_count += $buffer;
            echo $file_data;
        }
        fclose($fp); //关闭文件
    }
    /*
    * 唯一标识符
    */
    function create_unique() {
        $data = $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'] .time() . rand();
        return sha1($data);
    }
    /*
* 返回文件类型
* @param string $filename 文件路径
* @return array 返回数组，键值分别为：ext、type
*/
    function getFileType($filename) {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png',
            'bmp' => 'image/bmp',
            'tif|tiff' => 'image/tiff',
            'ico' => 'image/x-icon',
            'asf|asx|wax|wmv|wmx' => 'video/asf',
            'avi' => 'video/avi',
            'divx' => 'video/divx',
            'mov|qt' => 'video/quicktime',
            'mpeg|mpg|mpe|mp4' => 'video/mpeg',
            'txt|c|cc|h' => 'text/plain',
            'rtx' => 'text/richtext',
            'css' => 'text/css',
            'htm|html' => 'text/html',
            'mp3|m4a' => 'audio/mpeg',
            'ra|ram' => 'audio/x-realaudio',
            'wav' => 'audio/wav',
            'ogg' => 'audio/ogg',
            'mid|midi' => 'audio/midi',
            'wma' => 'audio/wma',
            'rtf' => 'application/rtf',
            'js' => 'application/javascript',
            'pdf' => 'application/pdf',
            'doc|docx' => 'application/msword',
            'pot|pps|ppt|pptx' => 'application/vnd.ms-powerpoint',
            'wri' => 'application/vnd.ms-write',
            'xla|xls|xlsx|xlt|xlw' => 'application/vnd.ms-excel',
            'mdb' => 'application/vnd.ms-access',
            'mpp' => 'application/vnd.ms-project',
            'swf' => 'application/x-shockwave-flash',
            'class' => 'application/java',
            'tar' => 'application/x-tar',
            'zip' => 'application/zip',
            'gz|gzip' => 'application/x-gzip',
            'exe' => 'application/x-msdownload',
            'odt' => 'application/vnd.oasis.opendocument.text',
            'odp' => 'application/vnd.oasis.opendocument.presentation',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
            'odg' => 'application/vnd.oasis.opendocument.graphics',
            'odc' => 'application/vnd.oasis.opendocument.chart',
            'odb' => 'application/vnd.oasis.opendocument.database',
            'odf' => 'application/vnd.oasis.opendocument.formula'
        );
        $type = false;
        $ext = false;
        foreach ( $mimes as $ext_preg => $mime_match ) {
            $ext_preg = '!\.(' . $ext_preg . ')$!i';
            if ( preg_match( $ext_preg, $filename, $ext_matches ) ) {
                $type = $mime_match;
                $ext = $ext_matches[1];
                break;
            }
        }
        return compact('ext','type');
    }
    /**
     * 下载远程 HTTP 图片
     * @param string $url 远程图片地址
     * @param string $filename 下载后的图片名称，默认为空
     * @param string $dir 保存图片目录
     */
    function downHttpImage($url, $filename="", $dir) {
        if($url=="") return false;
        if($filename=="") {
            $ext=strtolower(strrchr($url,"."));
            if($ext!=".gif" && $ext!=".jpg" && $ext!=".png" && $ext!=".bmp") {
                return false;
            } else {
                $filename=sha1(rand(1,100000)).$ext;
            }
        }
        ob_start();
        readfile($url);
        $img = ob_get_contents();
        ob_end_clean();
        $size = strlen($img);
        $filename = $dir . $filename;
        $fp2=@fopen($filename, "a");
        fwrite($fp2, $img);
        fclose($fp2);
        return $filename;
    }
    /**
     * 判断字符串中是否有中文
     * @param string $str
     * @return bool
     */
    function isChinese($str) {
        return preg_match("/[\x80-\xff]./", $str);
    }
    /**
     * 输出缩略图
     * @param string $filename 图片地址
     * @param int $width 图片宽度
     * @param int $height图片高度
     */
    function handleImg($filename,$width='500',$height='500'){
        $picext = end(explode('.',$filename));
        $picexts = array('jpg','png','gif','jpeg');
        if(in_array($picext,$picexts)) {
            if($picext=='jpg' || $picext=='jpeg') {
                header('Content-type: image/jpeg');
            } else {
                header('Content-type: image/'.$picext);
            }
            list($owidth, $oheight) = getimagesize($filename);
            $thumb = imagecreatetruecolor($width, $height);
            if($picext=='jpg' || $picext=='jpeg'){
                $source = imagecreatefromjpeg($filename);
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
                imagejpeg($thumb);
            } elseif ($picext=='gif') {
                $source = imagecreatefromgif($filename);
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
                imagegif($thumb);
            } elseif ($picext=='png'){
                $source = imagecreatefrompng($filename);
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
                imagepng($thumb);
            }
        } else {
            echo 'the file is not image!';
        }
    }
}
?>