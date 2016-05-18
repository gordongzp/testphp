/* Theme Name: The Project - Responsive Website Template
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version:1.2.0
 * Created:March 2015
 * License URI:http://support.wrapbootstrap.com/
 * File Description: Place here your custom scripts
 */



//树形菜单js
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


