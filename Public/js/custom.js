/* Theme Name: The Project - Responsive Website Template
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version:1.2.0
 * Created:March 2015
 * License URI:http://support.wrapbootstrap.com/
 * File Description: Place here your custom scripts
 */



//////////////////////////////////////////////////////树形菜单js/////////////////////////////////////////////
$(function () {
  $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', '收起');


// 收缩  
  // var children = $('.tree li.parent_li > span').parent('li.parent_li').find(' > ul > li');
  // if (children.is(":visible")) {
  //   children.hide('fast');
  //   $('.tree li.parent_li > span').attr('title', '展开').find(' > i').addClass('glyphicon-plus-sign').removeClass('glyphicon-minus-sign');
  // } else {
  //   children.show('fast');
  //   $('.tree li.parent_li > span').attr('title', '收起').find(' > i').addClass('glyphicon-minus-sign').removeClass('glyphicon-plus-sign');
  // }


  $('.tree li.parent_li > span').on('click', function (e) {
    var children = $(this).parent('li.parent_li').find(' > ul > li');
    if (children.is(":visible")) {
      children.hide('fast');
      $(this).attr('title', '展开').find(' > i').addClass('glyphicon-plus-sign').removeClass('glyphicon-minus-sign');
    } else {
      children.show('fast');
      $(this).attr('title', '收起').find(' > i').addClass('glyphicon-minus-sign').removeClass('glyphicon-plus-sign');
    }
    e.stopPropagation();
  });

//收缩click方法
  // $(".tree li:has(ul) span").trigger("click");
});









///////////////////////////////////////////////EasyInsert/////////////////////////////////////////////////////
/**
 * EasyInsert 4.0
 * http://IlikejQuery.com/EasyInsert
 *
 * @Creator   wo_is神仙 <jsw0528@MrZhang.net>
 * @Depend    jQuery 1.4+
**/

;(function($){
  $.fn.extend({
    "easyinsert": function(o){
      o = $.extend({
        //触发器
        clicker: null,//根据class（或id）选择，默认.next()获取
        //父标签
        wrap: "li",
        name: "i-text",
        type: "text",
        value: "",
        maxlength: 20,
        class: "i-text",
        //新增上限值
        toplimit: 0,//0表示不限制
        //初始化值，二维数组
        initValue: null//用于修改某资料时显示已有的数据
      }, o || {});
      var oo = {
        remove: "<a href=\"#nogo\" class=\"remove\">移除</a>",
        error1: "参数配置错误，数组的长度不一致，请检查。",
        error2: "参数配置错误，每组初始化值都必须是数组，请检查。"
      }
      //容器
      var $container = $(this);
      var allowed = true;

      //把属性拼成数组（这步不知道是否可以优化？）
      var arrCfg = new Array(o.name, o.type, o.value, o.maxlength, o.class);
      //arr ==> [name, type, value, maxlength, className] 
      var arr = new Array();
      $.each(arrCfg, function(i, n){
        if ( $.isArray(n) ) {
          arr[i] = n;
        } else {
          arr[i] = new Array();
          if ( i === 0 ) {
            arr[0].push(n);
          }else{
            //补全各属性数组（根据name数组长度）
            $.each(arr[0], function() {
              arr[i].push(n);
            });
          }
        }
        //判断各属性数组的长度是否一致
        if ( arr[i].length !== arr[0].length ) {
          allowed = false;
          $container.text(oo.error1);
        }
      });

      if ( allowed ) {
        //获取触发器
        var $Clicker = !o.clicker ? $container.next() : $(o.clicker);
        $Clicker.bind("click", function() {
          //未添加前的组数
          var len = $container.children(o.wrap).length;
          //定义一个变量，判断是否已经达到上限
          var isMax = o.toplimit === 0 ? false : (len < o.toplimit ? false : true);
          if ( !isMax ) {//没有达到上限才允许添加
            var $Item = $("<"+ o.wrap +">").appendTo( $container );
            $.each(arr[0], function(i) {
              switch ( arr[1][i] ) {
                case "select"://下拉框
                  var option = "";
                  $.each(arr[2][i], function(i, n) {
                    option += "<option value='"+ n +"'>"+ i +"</option>";
                  });
                  $("<select>", {
                    name: arr[0][i],
                    class: arr[4][i]
                  }).append( option ).appendTo( $Item );
                  break;
                case "custom"://自定义内容，支持html
                  $Item.append( arr[2][i] );
                  break;
                default://默认是input
                  $("<input>", {//jQuery1.4新增方法
                    name: arr[0][i],
                    type: arr[1][i],
                    value: arr[2][i],
                    maxlength: arr[3][i],
                    class: arr[4][i]
                  }).appendTo( $Item );
              }
            });
            $Item = $container.children(o.wrap);
            //新组数
            len = $Item.length;
            if ( len > 1 ) {
              $Item.last().append(oo.remove);
              if ( len === 2 ) {//超过一组时，为第一组添加“移除”按钮
                $Item.first().append(oo.remove);
              }
            }
            $Item.find(".remove").click(function(){
              //移除本组
              $(this).parent().remove();
              //统计剩下的组数
              len = $container.children(o.wrap).length;
              if ( len === 1 ) {//只剩一个的时候，把“移除”按钮干掉
                $container.find(".remove").remove();
              }
              //取消“移除”按钮的默认动作
              return false;
            });
          }
          //取消触发器的默认动作
          return false;
        });
        //初始化
        if ( $.isArray(o.initValue) ) {//判断初始值是否是数组（必需的）
          $.each(o.initValue, function(i, n) {
            if ( !$.isArray(n) ) {
              $container.empty().text(oo.error2);
              return false;
            }else{
              if ( n.length !== arr[0].length ) {
                $container.empty().text(oo.error1);
                return false;
              }
            }
            var arrValue = new Array();
            //初始值替换默认值
            $.each(n, function(j, m) {
              arrValue[j] = arr[2][j]
              arr[2][j] = m;
            });
            $Clicker.click();
            //默认值替换初始值
            $.each(arrValue, function(j, m) {
              arr[2][j] = m;
            });
            //上面这种[移形换位法]不知道效率怎么样，我想不出别的更好的方法
          });
        }else{
          $Clicker.click();
        }
      }
    }
  });
})(jQuery);