API en symfony créée par Thomas Le Scouarnec

Instalation : git clone git@github.com:tlescouarnec/symfApi.git puis composer install

Vous pouvez créer votre base de donnée à partir des fichiers situés dans le dossier sql.

#Liste des routes:

Pour les events:

    POST /event/create
    json exemple :
        {
            "name": "Event Name",
            "start_date": "2019-10-30 14:30",
            "end_date": "2019-11-01 15:30",
            "max_register": 10
        }

    PUT /event/edit/{eventid}
    json exemple : 
        {
            "name": "Event Name",
            "start_date": "2019-10-30 14:30",
            "end_date": "2019-11-01 15:30"
        }

    DELETE /event/delete/{eventId}

Pour la partie Register:

    POST /register/create
    json exemple :
        {
            "firstname": "John10",
            "lastname": "Doe10",
            "event_id": "1",
            "email": "johndoe10@test.local",
            "phone": "0600000010"
        }
