-- noinspection SqlDialectInspectionForFile
create schema  formmaestro;

use formmaestro;

create table if not exists civilitees
(
    id       int auto_increment
        primary key,
    civilite varchar(25) not null
);

create table if not exists formations
(
    id           int auto_increment
        primary key,
    titre        varchar(255) not null,
    categorie    varchar(255) not null,
    frequence    varchar(255) not null,
    debut_rappel varchar(255) not null,
    modalite     varchar(255) not null,
    duree        int(10)      not null,
    remarque     varchar(255) null
);

create table if not exists languages
(
    id     int auto_increment
        primary key,
    langue varchar(20) null
);

create table if not exists locations
(
    id          int auto_increment
        primary key,
    address     varchar(255) not null,
    province    varchar(35)  not null,
    postal_code varchar(7)   not null
);

create table if not exists positions
(
    id       int auto_increment
        primary key,
    name     varchar(60) not null,
    created  datetime    null,
    modified datetime    null
);

create table if not exists employees
(
    id                       int auto_increment
        primary key,
    employee_number          varchar(10)  null,
    civilite_id              int          not null,
    name                     varchar(30)  not null,
    last_name                varchar(30)  not null,
    language_id              int          not null,
    cellphone                int(10)      null,
    user_id                  int          null,
    email                    varchar(255) not null,
    position_id              int          not null,
    location_id              int          not null,
    extra_infos              blob         null,
    formation_plan_last_sent datetime     null,
    active                   tinyint(1)   null,
    created                  datetime     null,
    modified                 datetime     null,
    constraint civilite_id
        foreign key (civilite_id) references civilitees (id)
            on update cascade on delete cascade,
    constraint language_id
        foreign key (language_id) references languages (id)
            on update cascade on delete cascade,
    constraint location_id
        foreign key (location_id) references locations (id)
            on update cascade on delete cascade,
    constraint position_id
        foreign key (position_id) references positions (id)
            on update cascade on delete cascade
);

create table if not exists proofs
(
    id                 int auto_increment
        primary key,
    original_file_name varchar(255) not null,
    upload_date        datetime     null
);

create table if not exists formations_employee
(
    id            int auto_increment
        primary key,
    employee_id   int  not null,
    formation_id  int  not null,
    date_executee date null,
    proof_id      int  null,
    constraint employee_id
        foreign key (employee_id) references employees (id)
            on update cascade on delete cascade,
    constraint formation_id
        foreign key (formation_id) references formations (id)
            on update cascade on delete cascade,
    constraint proof_id
        foreign key (proof_id) references proofs (id)
            on update cascade on delete cascade
);

create table if not exists formations_position
(
    id               int auto_increment
        primary key,
    position_id      int         not null,
    formation_id     int         not null,
    proof_id         int         null,
    status_formation varchar(25) not null,
    constraint formation_id_position
        foreign key (formation_id) references formations (id)
            on update cascade on delete cascade,
    constraint position_id_position
        foreign key (position_id) references positions (id)
            on update cascade on delete cascade,
    constraint proof_id_position
        foreign key (position_id) references proofs (id)
            on update cascade on delete cascade
);

create table if not exists users
(
    id          int auto_increment
        primary key,
    email       varchar(255) not null,
    password    varchar(255) not null,
    name        varchar(255) not null,
    last_name   varchar(255) not null,
    employee_id int          null,
    created     datetime     null,
    modified    datetime     null,
	role int default 0 not null,
    constraint employee_id_management
        foreign key (employee_id) references employees (id)
            on update cascade on delete cascade
);

alter table employees
    add constraint user_id
        foreign key (user_id) references users (id)
            on update cascade on delete cascade;

