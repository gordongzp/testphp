/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2016-05-15 16:22:05                          */
/*==============================================================*/


drop table if exists xy_admin;

drop table if exists xy_attr;

drop table if exists xy_cate;

drop table if exists xy_config;

drop table if exists xy_dirtys;

drop table if exists xy_goods;

drop table if exists xy_order;

drop table if exists xy_shop;

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
   attr_id              int(10) not null,
   attr_name            varchar(40) not null,
   price                int(10) not null,
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
   openshop_need_verify int(1) not null,
   primary key (con_id)
);

/*==============================================================*/
/* Table: xy_dirtys                                             */
/*==============================================================*/
create table xy_dirtys
(
   dir_id               int(10) not null,
   order_id             int(10),
   dir_name             varchar(40) not null,
   dir_label            int(10) not null,
   primary key (dir_id)
);

/*==============================================================*/
/* Table: xy_goods                                              */
/*==============================================================*/
create table xy_goods
(
   goods_id             int(10) not null auto_increment,
   goods_name           varchar(40) not null,
   cat_id               int(10),
   shop_id              int(10),
   primary key (goods_id)
);

/*==============================================================*/
/* Table: xy_order                                              */
/*==============================================================*/
create table xy_order
(
   order_id             int(10) not null auto_increment,
   begin_time           int(11) not null,
   shop_id              int(10) comment '订单是所属于商店的',
   primary key (order_id)
);

/*==============================================================*/
/* Table: xy_shop                                               */
/*==============================================================*/
create table xy_shop
(
   shop_id              int(10) not null,
   id                   int(10) comment '商家与商店是一一对应的',
   primary key (shop_id)
);

/*==============================================================*/
/* Table: xy_user                                               */
/*==============================================================*/
create table xy_user
(
   id                   int(10) not null auto_increment,
   shop_id              int(10) comment '顾客所属的门店，在首次注册时记录',
   user_name            varchar(40) not null,
   user_pwd             varchar(32) not null,
   tel                  varchar(20) not null,
   email                varchar(40) not null,
   true_name            varchar(40) not null comment '真实姓名',
   person_id            varchar(20) not null comment '身份证号码',
   person_identity_stage int(1) not null comment '实名认证状态',
   shop_identity_stage  int(1) not null,
   is_seller            int(1) not null,
   reg_time             int(11) not null,
   update_time          int(11) not null,
   last_log_time        int(11) not null,
   reg_ip               varchar(15) not null,
   last_log_ip          varchar(15) not null,
   primary key (id)
);

alter table xy_user comment '会员信息';

alter table xy_attr add constraint FK_Reference_7 foreign key (goods_id)
      references xy_goods (goods_id) on delete restrict on update restrict;

alter table xy_dirtys add constraint FK_Reference_8 foreign key (order_id)
      references xy_order (order_id) on delete restrict on update restrict;

alter table xy_goods add constraint FK_Reference_3 foreign key (cat_id)
      references xy_cate (cat_id) on delete restrict on update restrict;

alter table xy_goods add constraint FK_Reference_5 foreign key (shop_id)
      references xy_shop (shop_id) on delete restrict on update restrict;

alter table xy_order add constraint FK_Reference_6 foreign key (shop_id)
      references xy_shop (shop_id) on delete restrict on update restrict;

alter table xy_shop add constraint FK_Reference_1 foreign key (id)
      references xy_user (id) on delete restrict on update restrict;

alter table xy_user add constraint FK_Reference_4 foreign key (shop_id)
      references xy_shop (shop_id) on delete restrict on update restrict;

