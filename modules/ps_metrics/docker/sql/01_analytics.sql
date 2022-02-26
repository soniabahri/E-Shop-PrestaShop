-- -------------------------------------------------------------
-- TablePlus 4.1.2(382)
--
-- https://tableplus.com/
--
-- Database: analytics
-- Generation Time: 2021-10-12 10:43:33.8040
-- -------------------------------------------------------------

DROP SCHEMA IF EXISTS "analytics" CASCADE;

CREATE SCHEMA "analytics";

DROP TABLE IF EXISTS "analytics"."accounts";
-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Table Definition
CREATE TABLE "analytics"."accounts" (
    "uuid" uuid NOT NULL,
    "created_at" varchar(10),
    "updated_at" varchar(10),
    "shop_id" varchar(100),
    "shop_url" varchar(255),
    "plan" varchar(250),
    "email_account" varchar(100),
    "first_sync_asked_at" int8,
    "start_sync_at" int8,
    "last_sync_at" int8,
    PRIMARY KEY ("uuid")
);

DROP TABLE IF EXISTS "analytics"."google_accounts";
-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Table Definition
CREATE TABLE "analytics"."google_accounts" (
    "uuid" uuid NOT NULL,
    "created_at" varchar(10),
    "updated_at" varchar(10),
    "active" bool,
    "deleted" bool,
    "shop_id" varchar(100),
    "type_source" varchar(10),
    "access_token" varchar(250),
    "refresh_token" varchar(250),
    "google_account_id" varchar(100),
    "username" varchar(100),
    "webproperty_id" varchar(100),
    "webproperty_name" varchar(255),
    "view_id" varchar(100),
    "view_name" varchar(255),
    "timezone" varchar(50),
    PRIMARY KEY ("uuid")
);
