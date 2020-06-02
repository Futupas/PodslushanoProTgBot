CREATE TABLE "orders" (
    "id" SERIAL, 
    "name" varchar(32) null DEFAULT null, 
    "description" varchar(256) null DEFAULT null,
    "price" int null DEFAULT null,
    "customer_id" int not null,
    "executor_id" int null DEFAULT null,
    "post_id" int null DEFAULT null);

CREATE TABLE "users" (
    "id" int,
    "step" int null default null,
    "current_order_fill" int null default null,
    "name" varchar(32) null default null,
    "univ" varchar(32) null default null,
    "rating_votes_quantity" int not null default 0,
    "rating" int not null default 0.0
)

CREATE TABLE "orders" (
    "id" SERIAL, 
    "name" varchar(32) null DEFAULT null, 
    "description" varchar(256) null DEFAULT null,
    "customer_id" int not null,
    "executor_id" int null DEFAULT null,
    "post_id" int null DEFAULT null,
    "price" varchar(16) null default null,
    "executor_done" boolean default false,
    "customer_done" boolean default false,
    "file_id" varchar(128) null default null,
    "executor_price" int null default null,
    "customer_price" int null default null);

CREATE TABLE "order_executors" (
    "executor_id" int not null, 
    "order_id" int not null);

    
CREATE TABLE "chat_messages" (
    "chat_id" int not null, 
    "destination_chat_id" int not null,
    "message_id" int not null,
    "message_text" varchar(512),
    "order_id" int not null);