create table civilitees
(
    id       int auto_increment
        primary key,
    civilite varchar(25) not null
)
    charset = utf8;

create table frequences
(
    id    int auto_increment
        primary key,
    title varchar(255) not null
)
    charset = utf8;

create table languages
(
    id     int auto_increment
        primary key,
    langue varchar(20) null
)
    charset = utf8;

create table locations
(
    id          int auto_increment
        primary key,
    address     varchar(255) not null,
    province    varchar(35)  not null,
    postal_code varchar(7)   not null
)
    charset = utf8;

create table modalities
(
    id    int auto_increment
        primary key,
    title varchar(255) not null
)
    charset = utf8;

create table positions
(
    id       int auto_increment
        primary key,
    name     varchar(60) not null,
    created  datetime    null,
    modified datetime    null
)
    charset = utf8;

create table employees
(
    id                       int auto_increment
        primary key,
    employee_number          int          not null,
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
)
    charset = utf8;

create table proofs
(
    id                 int auto_increment
        primary key,
    original_file_name varchar(255) not null,
    created        datetime     null
)
    charset = utf8;

create table reminders
(
    id    int auto_increment
        primary key,
    title varchar(255) not null
)
    charset = utf8;

create table formations
(
    id           int auto_increment
        primary key,
    titre        varchar(255) not null,
    categorie    varchar(255) not null,
    frequence_id int          not null,
    reminder_id  int          not null,
    modality_id  int          not null,
    duree        int(10)      not null,
    remarque     varchar(255) null,
    constraint formations_ibfk_1
        foreign key (frequence_id) references frequences (id)
            on update cascade on delete cascade,
    constraint formations_ibfk_2
        foreign key (reminder_id) references reminders (id)
            on update cascade on delete cascade,
    constraint formations_ibfk_3
        foreign key (modality_id) references modalities (id)
            on update cascade on delete cascade
)
    charset = utf8;

create index frequence_id
    on formations (frequence_id);

create index modality_id
    on formations (modality_id);

create index reminder_id
    on formations (reminder_id);

create table formations_employee
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
)
    charset = utf8;

create table formations_position
(
    id               int auto_increment
        primary key,
    position_id      int         not null,
    formation_id     int         not null,
    status_formation varchar(25) not null,
    constraint formation_id_position
        foreign key (formation_id) references formations (id)
            on update cascade on delete cascade,
    constraint position_id_position
        foreign key (position_id) references positions (id)
            on update cascade on delete cascade
)
    charset = utf8;

create index proof_id_position
    on formations_position (position_id);

create table users
(
    id          int auto_increment
        primary key,
    email       varchar(255)  not null,
    password    varchar(255)  not null,
    name        varchar(255)  not null,
    last_name   varchar(255)  not null,
    employee_id int           null,
    created     datetime      null,
    modified    datetime      null,
    role        int default 0 not null,
    constraint employee_id_management
        foreign key (employee_id) references employees (id)
            on update cascade on delete cascade
)
    charset = utf8;

alter table employees
    add constraint user_id
        foreign key (user_id) references users (id)
            on update cascade on delete cascade;
