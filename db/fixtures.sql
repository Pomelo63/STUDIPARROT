/* Insertion des billets */
insert into
    T_MEMBERS(
        MEMBER_NAME,
        MEMBER_SURNAME,
        MEMBER_PASSWORD,
        MEMBER_EMAIL,
        MEMBER_FUNCTION,
        MEMBER_PROFIL
    )
values
    (
        'Parrot',
        'Vincent',
        '$adminHashedPwd',
        'vparrot@parrot.com',
        'admin',
        'admin'
    );

insert into
    T_MEMBERS(
        MEMBER_NAME,
        MEMBER_SURNAME,
        MEMBER_PASSWORD,
        MEMBER_EMAIL,
        MEMBER_FUNCTION,
        MEMBER_PROFIL
    )
values
    (
        'Parrot',
        'Nadine',
        'drop',
        'nparrot@parrot.com',
        'admin',
        'admin'
    );

insert into
    T_MEMBERS(
        MEMBER_NAME,
        MEMBER_SURNAME,
        MEMBER_PASSWORD,
        MEMBER_EMAIL,
        MEMBER_FUNCTION,
        MEMBER_PROFIL
    )
values
    (
        'Alain',
        'George',
        'cuculoté',
        'galain@parrot.com',
        'admin',
        'employé'
    );

insert into
    T_PRESTATIONS(PRESTA_TYPE, PRESTA_NAME)
values
    ('Mécanique', 'Diagnostique électrique');

insert into
    T_PRESTATIONS(PRESTA_TYPE, PRESTA_NAME)
values
    ('Entretien', 'Montage pneumatique');

insert into
    T_PRESTATIONS(PRESTA_TYPE, PRESTA_NAME)
values
    ('Carrosserie', 'Peinture sur mesure');

insert into
    T_COMMENTS(
        COMMENTS_DATE,
        COMMENTS_AUTEUR,
        COMMENTS_CONTENU,
        COMMENTS_NOTE,
        COMMENTS_STATUS
    )
values
    (Now(), 'Kevin', 'Cool ce garage', 4, 'actif');

insert into
    T_COMMENTS(
        COMMENTS_DATE,
        COMMENTS_AUTEUR,
        COMMENTS_CONTENU,
        COMMENTS_NOTE,
        COMMENTS_STATUS
    )
values
    (Now(), 'toto', 'que des ploucs', 2, 'pending');

insert into
    T_COMMENTS(
        COMMENTS_DATE,
        COMMENTS_AUTEUR,
        COMMENTS_CONTENU,
        COMMENTS_NOTE,
        COMMENTS_STATUS
    )
values
    (Now(), 'monique', 'très gentil', 3, 'actif');

insert into
    T_INFORMATIONS(
        INFO_STREET,
        INFO_CP,
        INFO_CITY,
        INFO_EMAIL,
        INFO_PHONE,
        INFO_HOUR,
        INFO_NAME
    )
values
    (
        '3 Rue Pierre Poisson',
        31000,
        'TOULOUSE',
        'accueil@vparrot.com',
        '04.72.31.202.20',
        'Du lundi au vendredi de 8h45 à 12h et de 14h à 18h. Et le samedi de 8h45 à 12h.',
        'VPARROT'
    );

insert into
    T_CARSFORSALE(
        CARSFORSALE_DATE,
        CARSFORSALE_REF,
        CARSFORSALE_MAINIMAGE,
        CARSFORSALE_IMAGE,
        CARSFORSALE_TITLE,
        CARSFORSALE_PRICE,
        CARSFORSALE_YEAR,
        CARSFORSALE_ENERGY,
        CARSFORSALE_KILOMETER,
        CARSFORSALE_COLOR,
        CARSFORSALE_GEARSHIFT,
        CARSFORSALE_GSTATE,
        CARSFORSALE_INFORMATIONS
    )
values
    (
        Now(),
        'YZREF',
        'main.jpeg',
        'main.jpeg;juke.jpeg',
        'Nissan Juke 2L',
        '7650',
        '2015',
        'diesel',
        '120050',
        'rouge',
        'automatique',
        'très bon état',
        'radar de recul;attache remorque'
    );

insert into
    T_CARSFORSALE(
        CARSFORSALE_DATE,
        CARSFORSALE_REF,
        CARSFORSALE_MAINIMAGE,
        CARSFORSALE_IMAGE,
        CARSFORSALE_TITLE,
        CARSFORSALE_PRICE,
        CARSFORSALE_YEAR,
        CARSFORSALE_ENERGY,
        CARSFORSALE_KILOMETER,
        CARSFORSALE_COLOR,
        CARSFORSALE_GEARSHIFT,
        CARSFORSALE_GSTATE,
        CARSFORSALE_INFORMATIONS
    )
values
    (
        Now(),
        'YZREF3',
        'main.jpeg',
        'main.jpeg;juke.jpeg',
        'Nissan Juke 2L5',
        '12650',
        '2018',
        'diesel',
        '72000',
        'rouge',
        'automatique',
        'très bon état',
        'radar de recul;attache remorque'
    );

insert into
    T_CARSFORSALE(
        CARSFORSALE_DATE,
        CARSFORSALE_REF,
        CARSFORSALE_MAINIMAGE,
        CARSFORSALE_IMAGE,
        CARSFORSALE_TITLE,
        CARSFORSALE_PRICE,
        CARSFORSALE_YEAR,
        CARSFORSALE_ENERGY,
        CARSFORSALE_KILOMETER,
        CARSFORSALE_COLOR,
        CARSFORSALE_GEARSHIFT,
        CARSFORSALE_GSTATE,
        CARSFORSALE_INFORMATIONS
    )
values
    (
        Now(),
        'YZREF4',
        'main.jpeg',
        'main.jpeg;juke.jpeg',
        'Nissan Juke 2L',
        '7650',
        '2015',
        'diesel',
        '120050',
        'rouge',
        'automatique',
        'très bon état',
        'radar de recul;attache remorque'
    );

insert into
    T_CARSFORSALE(
        CARSFORSALE_DATE,
        CARSFORSALE_REF,
        CARSFORSALE_MAINIMAGE,
        CARSFORSALE_IMAGE,
        CARSFORSALE_TITLE,
        CARSFORSALE_PRICE,
        CARSFORSALE_YEAR,
        CARSFORSALE_ENERGY,
        CARSFORSALE_KILOMETER,
        CARSFORSALE_COLOR,
        CARSFORSALE_GEARSHIFT,
        CARSFORSALE_GSTATE,
        CARSFORSALE_INFORMATIONS
    )
values
    (
        Now(),
        'YZREF5',
        'main.jpeg',
        'main.jpeg;juke.jpeg',
        'Nissan Juke 2L5',
        '12650',
        '2018',
        'diesel',
        '72000',
        'rouge',
        'automatique',
        'très bon état',
        'radar de recul;attache remorque'
    );