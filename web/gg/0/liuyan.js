/*=============引入css样式和easyvalidator表单验证====================*/
document.write('<link href=\"\/gg\/0\/smallgbook.css\" rel=\"stylesheet\" type=\"text\/css\" \/>');
document.write('<script type=\"text\/javascript\" src=\"\/order\/easyvalidator\/jquery-1.8.3.min.js\"><\/script>');
document.write('<script type=\"text\/javascript\" src=\"\/order\/easyvalidator\/easy_validator.pack.js\"><\/script>');
document.write('<script type=\"text\/javascript\" src=\"\/order\/easyvalidator\/jquery.bgiframe.min.js\"><\/script>');
document.write('<script type=\"text\/javascript\" src=\"\/gg\/0\/ua-parser.js\"><\/script>');

var a,b;
//姓
var xing=Array("贾","赵","萧","梁","胡","谢","曹","袁","傅","彭","蒋","蔡","魏","薛","阎"," 潘","戴","夏","姜","姚","邹","熊","郝","秦","蒋","邵","侯","段","武","赖","龚","奥","夏侯","诸葛","上官","欧阳","尉迟","公孙","岳","墨","琴","涂","温","匡","余","余" ,"温","景","庄","王","燕","袁","景","马","伊","樊","朱","冯","雷","范","穆","麒","安"," 布","卜","白","拜","鲍","庹","崔","程","晨","迟","常","车","翟","窦","狄","费","范","郭"," 葛","恭","霍","孔","柯","骆","苗","孟","潘","乔","童","屠","邰","谭","巫","翁","徐","肖"," 萧","夏","张","李","赵","刘","杨");
var xin2=Array("小姐","先生");
a=Math.floor(Math.random()*104);
b=Math.floor(Math.random()*2);
	function clrTA(obj, str) {
	if (obj.value == str) {
		obj.value = "";
	}
	else
		obj.style.color="#000";
}
function inTA(obj, str, f) {
	if (f == true || (f == null && obj.value == "")) {
		obj.value = str;
	}
	else
		obj.style.color="#000";
}
function fRandomBy(under, over){ 
	switch(arguments.length){ 
		case 1: return parseInt(Math.random()*under+1); 
		case 2: return parseInt(Math.random()*(over-under+1) + under); 
		default: return 0; 
	}
}

/*
*获取cookie
*/
function getCookieVal(offset) {
 var endstr = document.cookie.indexOf(";", offset);
 if(endstr == -1) {
  endstr = document.cookie.length;
 }
 return document.cookie.substring(offset, endstr);
}
/*
*获取cookie
*/
function getCookie(name) {
 var arg = name + "=";
 var alen = arg.length;
 var clen = document.cookie.length;
 var i = 0;
 var j = 0;
 while(i < clen) {
  j = i + alen;
  if(document.cookie.substring(i, j) == arg){
   return getCookieVal(j);
  }
  i = document.cookie.indexOf(" ", i) + 1;
  if(i === 0){
   break;
  }
 }
 return '';
}


function UrlDecode(str){ 
  var ret=""; 
  for(var i=0;i<str.length;i++){ 
   var chr = str.charAt(i); 
    if(chr == "+"){ 
      ret+=" "; 
    }else if(chr=="%"){ 
     var asc = str.substring(i+1,i+3); 
     //alert(parseInt("0x"+asc)>0x7f);
     if(parseInt("0x"+asc)>0x7f){ 
      //alert(parseInt("0x"+asc+str.substring(i+4,i+6)));
      ret+=asc2str(parseInt("0x"+asc+str.substring(i+4,i+6))); 
      i+=5; 
     }else{ 
      ret+=asc2str(parseInt("0x"+asc)); 
      i+=2; 
     } 
    }else{ 
      ret+= chr; 
    } 
  } 
  return ret; 
}



function UrlEncode(str){ 
  var ret=""; 
  var strSpecial="!\"#$%&'()*+,/:;<=>?[]^`{|}~%"; 
  for(var i=0;i<str.length;i++){ 
   var chr = str.charAt(i); 
    var c=str2asc(chr); 
    tt += chr+":"+c+"n"; 
    if(parseInt("0x"+c) > 0x7f){ 
      ret+="%"+c.slice(0,2)+"%"+c.slice(-2); 
    }else{ 
      if(chr==" ") 
        ret+="+"; 
      else if(strSpecial.indexOf(chr)!=-1) 
        ret+="%"+c.toString(16); 
      else 
        ret+=chr; 
    } 
  } 
  return ret; 
}
/*=============控制开关的====================*/
document.writeln("<script type = \"text/javascript\" >");
document.writeln("$(function() {");
document.writeln(" ");
document.writeln("   $(\"#close_message\").click(function(){");
document.writeln("	   ");
document.writeln("	    $(\"#cssrain\").hide(500);   ");
document.writeln("	})	");
document.writeln("	");
document.writeln("	$(\".MessageBtn\").click(function(){");
document.writeln("		");
document.writeln("	   	$(\"#cssrain\").show(500); ");
document.writeln("		");
document.writeln("	})");
document.writeln("})");
document.writeln("</script>");

/*=================CSS+html==================*/
document.writeln("<div class=\'MessageBtn\'>");
document.writeln("<a href=\'javascript:void(0);\'><img src=\'/gg/0/play.jpg\' width=\'32\' height=\'115\'/></a>");
document.writeln("</div>");
document.writeln("<div id=\'cssrain\'><div class=\'close\'><a id=\'close_message\' href=\'javascript:void(0);\' style=\'color:#F00; text-decoration:none\'>×关闭</a></div>");
document.writeln("<div class=\'message\'>");
document.writeln("<div class=\'message2\'><div class=\'mse1\'><span><img src=\'/gg/0/fd_lb.gif\' /></span><p><font color=\'#0000FF\'><script>document.write(fRandomBy(1,60));</script></font>分钟前<font color=\'#FF0000\'><script>document.write(xing[a] + xin2[b]);</script></font>留了言,并获取了相关资料。如果你对此项目感兴趣,那么赶快留言吧!</p>");
document.writeln("</div>");
document.writeln("<div class=\'mse2\'>");
document.writeln("<iframe style=\"display:none;\" name=\"myFrame\" src=\"about:blank\"></iframe>");
document.writeln("<form name=\"input3\" method=\"post\" action=\"http://www.karite.com/words\" target=\"myFrame\">");
document.writeln("<input type=\"hidden\" name=\"zhuanyuan\" id=\"zhuanyuan\" value=\""+zhuanyuan+"\"/>");
document.writeln("<input type=\"hidden\" name=\"xiangmu\" id=\"xiangmu\"  value=\""+xiangmu+"\"/>");
document.writeln("<input type=\"hidden\" name=\"url\" id=\"url\" value=\"\" />");
document.writeln("<input type=\"hidden\" name=\"title\" id=\"title\" value=\"\" />");
document.writeln("<input type=\'hidden\' name=\'getbrowser\' id=\'getbrowser\'  value=\'getbrowser\'/>");
document.writeln("<input type=\'hidden\' name=\'getengine\' id=\'getengine\'  value=\'getengine\'/>");
document.writeln("<input type=\'hidden\' name=\'getos\' id=\'getos\'  value=\'getos\'/>");
document.writeln("<input type=\'hidden\' name=\'getdevice\' id=\'getdevice\'  value=\'getdevice\'/>");
document.writeln("<table width=\"220\" border=\"0\" style=\"margin-top:10px;font-size:12px;\" ><tr><td width=\"39\" height=\"25\">姓名：</td> <td height=\"25\" colspan=\"2\">");
document.writeln("<script type = \"text/javascript\" >");
document.writeln("    url = window.location.href;");
document.writeln("    document.getElementById(\"url\").value = url;");
document.writeln("    title = document.title;");
document.writeln("    document.getElementById(\"title\").value = title;");
document.writeln("var parser = new UAParser();");
document.writeln("document.getElementById(\'getbrowser\').value = parser.getBrowser().name+\' \'+parser.getBrowser().version;");
document.writeln("document.getElementById(\'getengine\').value = parser.getEngine().name+\' \'+parser.getEngine().version;");
document.writeln("document.getElementById(\'getos\').value = parser.getOS().name+\' \'+parser.getOS().version;");
document.writeln("if ((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i)))");
document.writeln("{ document.getElementById(\'getdevice\').value = \'WAP\';} ");
document.writeln("else { document.getElementById(\'getdevice\').value = \'PC\';}");
document.writeln("</script>");
document.writeln("");
document.writeln("<input name=\"name\" type=\"text\" size=\"15\" style=\"height:17px;width:130px;color:#7f7f7f;\" value=\"\" reg=\"[\\u4e00-\\u9fa5]\" tip=\"请输入正确姓名 用于寄送资料\"/>");
document.writeln("</td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("  <td height=\"25\">手机：</td>");
document.writeln("  <td height=\"25\" colspan=\"2\"><input name=\"tel\" type=\"text\" size=\"15\" style=\"height:17px;width:130px;color:#7f7f7f;\" value=\"\"  reg=\"^1[3|4|5|7|8][0-9]\\d{8}$\" tip=\"请输入正确号码 寄送资料前需要跟您电话核实\"/>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("<td height=\"25\">邮箱：</td>");
document.writeln("  <td height=\"25\" colspan=\"2\"><input name=\"email\" type=\"text\" size=\"15\" style=\"height:17px;width:130px;color:#7f7f7f;\" value=\"\"   tip=\"选填 如123456@qq.com\"/></td>");
document.writeln("</tr>");
document.writeln("<tr>");
document.writeln("  <td height=\"25\">地址：</td>");
document.writeln("  <td height=\"25\" colspan=\"2\"><input name=\"address\" type=\"text\" size=\"15\" style=\"height:17px;width:130px;color:#7f7f7f;\" value=\"\" reg=\"[\u4e00-\u9fa5]\" tip=\"请输入画册和资料的邮寄地址\"/></td>");
document.writeln("</tr>");
document.writeln("</table>");
document.writeln("<table width=\"220\" border=\"0\" cellspacing=\"0\" class=\"font12\" style=\"margin-top:10px;\">");
document.writeln("  <tr>");
document.writeln("    <td width=\"38\" valign=\"top\">留言：</td>");
document.writeln("    <td width=\"168\">");
document.writeln("    <label><textarea name=\"content\" cols=\"19\" rows=\"6\" class=\"kuang\" style=\"padding:5px; height:60px;\">有兴趣开一个店，请寄资料或给我打电话.</textarea></label>");
document.writeln("    </td>");
document.writeln("  </tr>");
document.writeln("  <tr>");
document.writeln("    <td height=\"50\">&nbsp;</td>");
document.writeln("<td height=\"50\" style=\"padding-left:20px;\"><input type=\"submit\" name=\"submit\" value=\" \" class=\"subbutton\" title=\"提交\" /></td>");
document.writeln("  </tr>");
document.writeln("</table>");
document.writeln("</form>");
document.writeln("</div>");
document.writeln("</div>");
document.writeln("</div>");
document.writeln("</div>");