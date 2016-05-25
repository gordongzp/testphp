/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2016-05-25 14:06:54                          */
/*==============================================================*/


drop table if exists xy_admin;

drop table if exists xy_attr;

drop table if exists xy_cate;

drop table if exists xy_config;

drop table if exists xy_dirtys;

drop table if exists xy_gdimg;

drop table if exists xy_goods;

drop table if exists xy_inorder;

drop table if exists xy_order;

drop table if exists xy_shop;

drop table if exists xy_uconfig;

drop table if exists xy_user;

/*==============================================================*/
/* Table: xy_admin                                              */
/*==============================================================*/
create table xy_admin
(
   id                   int(10) not null auto_increment,
   user_name            varchar(40) not null,
   user_pwd             varchar(32) not null,
   primary key (id)
);

alter table xy_admin comment '管理员账户';

/*==============================================================*/
/* Table: xy_attr                                               */
/*==============================================================*/
create table xy_attr
(
   attr_id              int(10) not null auto_increment,
   attr_name            varchar(40) not null,
   price                float(10) not null,
   goods_id             int(10),
   primary key (attr_id)
);

alter table xy_attr comment '对于不同的分公司而言，可以生成相应的产品列表，仅供改店用户查看';

/*==============================================================*/
/* Table: xy_cate                                               */
/*==============================================================*/
create table xy_cate
(
   cat_id               int(10) not null auto_increment,
   pid                  int(10) not null,
   name                 varchar(40) not null,
   primary key (cat_id)
);

alter table xy_cate comment '商品分类表';

/*==============================================================*/
/* Table: xy_config                                             */
/*==============================================================*/
create table xy_config
(
   con_id               int(10) not null,
   openshop_need_person_id int(1) not null,
   openshop_need_email  int(1) not null,
   primary key (con_id)
);

/*==============================================================*/
/* Table: xy_dirtys                                             */
/*==============================================================*/
create table xy_dirtys
(
   dir_id               int(10) not null auto_increment,
   inorder_id           int,
   dir_name             varchar(40) not null,
   dir_label            int(10) not null,
   primary key (dir_id)
);

/*==============================================================*/
/* Table: xy_gdimg                                              */
/*==============================================================*/
create table xy_gdimg
(
   gdimg_id             int(10) not null auto_increment,
   img_path             varchar(100) not null,
   thumb_path           varchar(100) not null,
   img_url              varchar(100) not null,
   flag                 int(1) not null,
   goods_id             int(10),
   primary key (gdimg_id)
);

/*==============================================================*/
/* Table: xy_goods                                              */
/*==============================================================*/
create table xy_goods
(
   goods_id             int(10) not null auto_increment,
   goods_name           varchar(40) not null,
   is_on_shelve         int(1) not null,
   goods_describe       text not null,
   cat_id               int(10),
   shop_id              int(10),
   primary key (goods_id)
);

/*==============================================================*/
/* Table: xy_inorder                                            */
/*==============================================================*/
create table xy_inorder
(
   inorder_id           int not null auto_increment,
   goods_id             int(10) not null comment '不作为外键，这里只用来查询goods的图片，如果有的话',
   goods_name           varchar(40) not null,
   goods_attr           varchar(40) not null,
   price                float(10) not null,
   order_id             int(10),
   primary key (inorder_id)
);

/*==============================================================*/
/* Table: xy_order                                              */
/*==============================================================*/
create table xy_order
(
   order_id             int(10) not null auto_increment,
   order_stage          int(1) not null,
   t1                   int(10) not null,
   t2                   int(10) not null,
   t3                   int(10) not null,
   t4                   int(10) not null,
   t5                   int(10) not null,
   deal_price           int(10) not null comment '成交价格',
   user_price           int(10) not null comment '用户支付的金额',
   shop_id              int(10) comment '订单是所属于商店的',
   id                   int(10),
   primary key (order_id)
);

/*==============================================================*/
/* Table: xy_shop                                               */
/*==============================================================*/
create table xy_shop
(
   shop_id              int(10) not null auto_increment,
   shop_name            varchar(40) not null,
   shop_tel             varchar(20) not null,
   shop_province        varchar(40) not null,
   shop_city            varchar(40) not null,
   shop_dis             varchar(40) not null,
   shop_address         text not null,
   shop_describe        text not null,
   id                   int(10) comment '商家与商店是一一对应的',
   primary key (shop_id)
);

/*==============================================================*/
/* Table: xy_uconfig                                            */
/*==============================================================*/
create table xy_uconfig
(
   uconfig_id           int(10) not null auto_increment,
   id                   int(10),
   primary key (uconfig_id)
);

/*==============================================================*/
/* Table: xy_user                                               */
/*==============================================================*/
create table xy_user
(
   id                   int(10) not null auto_increment,
   user_name            varchar(40) not null,
   user_pwd             varchar(32) not null,
   tel                  varchar(20) not null,
   email                varchar(40) not null,
   true_name            varchar(40) not null comment '真实姓名',
   person_id            varchar(20) not null comment '身份证号码',
   person_identify_stage int(1) not null comment '实名认证状态',
   shop_identify_stage  int(1) not null,
   reg_time             int(11) not null,
   update_time          int(11) not null,
   last_log_time        int(11) not null,
   reg_ip               varchar(15) not null,
   last_log_ip          varchar(15) not null,
   shop_id              int(10) comment '顾客所属的门店，在首次注册时记录',
   primary key (id)
);

alter table xy_user comment '会员信息';

alter table xy_attr add constraint FK_Reference_7 foreign key (goods_id)
      references xy_goods (goods_id) on delete restrict on update restrict;

alter table xy_dirtys add constraint FK_Reference_10 foreign key (inorder_id)
      references xy_inorder (inorder_id) on delete restrict on update restrict;

alter table xy_gdimg add constraint FK_Reference_9 foreign key (goods_id)
      references xy_goods (goods_id) on delete restrict on update restrict;

alter table xy_goods add constraint FK_Reference_3 foreign key (cat_id)
      references xy_cate (cat_id) on delete restrict on update restrict;

alter table xy_goods add constraint FK_Reference_5 foreign key (shop_id)
      references xy_shop (shop_id) on delete restrict on update restrict;

alter table xy_inorder add constraint FK_Reference_8 foreign key (order_id)
      references xy_order (order_id) on delete restrict on update restrict;

alter table xy_order add constraint FK_Reference_11 foreign key (id)
      references xy_user (id) on delete restrict on update restrict;

alter table xy_order add constraint FK_Reference_6 foreign key (shop_id)
      references xy_shop (shop_id) on delete restrict on update restrict;

alter table xy_shop add constraint FK_Reference_1 foreign key (id)
      references xy_user (id) on delete restrict on update restrict;

alter table xy_uconfig add constraint FK_Reference_12 foreign key (id)
      references xy_user (id) on delete restrict on update restrict;

alter table xy_user add constraint FK_Reference_4 foreign key (shop_id)
      references xy_shop (shop_id) on delete restrict on update restrict;

