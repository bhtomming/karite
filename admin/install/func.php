<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\8\5 0005
 * Time: 16:13
 */


/**
 * 获取数据大小单位
 * @param int $byte 字节
 * @return string
 */
function get_byte($byte) {
    if($byte < 1024) {
        return $byte.' Byte';
    }elseif($byte < 1048576) {
        return round($byte/1024, 2).' KB';
    }elseif($byte < 1073741824) {
        return round($byte/1048576, 2).' MB';
    }elseif($byte < 1099511627776) {
        return round($byte/1073741824, 2).' GB';
    }else{
        return round($byte/1099511627776, 2).' TB';
    }
}

// 检测文件或目录是否可写 (兼容 windows)
function _is_writable($file) {
    try{
        if(is_dir($file)) {
            $tmpfile = $file.'/_test.tmp';
            $n = @file_put_contents($tmpfile, 'test');
            if($n > 0) {
                unlink($tmpfile);
                return TRUE;
            }else{
                return FALSE;
            }
        }elseif(is_file($file)) {
            if(strpos(strtoupper(PHP_OS), 'WIN') !== FALSE) {
                $fp = @fopen($file, 'a'); // 写入方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
                @fclose($fp);
                return (bool)$fp;
            }else{
                return is_writable($file);
            }
        }
    }catch(Exception $e) {}
    return FALSE;
}

// 递归检测目录/文件是否写
function _dir_write($dir, $clear = FALSE) {
    static $ret = array();

    if($clear) $ret = array('yes'=>array(), 'no'=>array());

    if(!is_dir($dir) || _no_writable($dir) || !$dh = opendir($dir)) {
        $ret['no'][] = array($dir, substr(sprintf('%o', fileperms($dir)), -4));
    }else{
        $ret['yes'][] = array($dir, substr(sprintf('%o', fileperms($dir)), -4));

        while(($file = readdir($dh)) !== FALSE) {
            if($file!='.' && $file!='..') {
                $fileson = $dir.'/'.$file;
                if(is_dir($fileson)) {
                    _dir_write($fileson); // 递归检测
                }elseif(is_file($fileson)) {
                    if(_no_writable($fileson)) {
                        $ret['no'][] = array($fileson, substr(sprintf('%o', fileperms($fileson)), -4));
                    }else{
                        $ret['yes'][] = array($fileson, substr(sprintf('%o', fileperms($fileson)), -4));
                    }
                }
            }
        }
        closedir($dh);
    }

    return $ret;
}

// 不可写返回 TRUE
function _no_writable($dir) {
    if(_is_writable($dir)) {
        return FALSE;
    }else{
        function_exists('chmod') && chmod($file, 0777); // 尝试自动修复权限
        return !_is_writable($dir);
    }
}